<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Notification;
use App\Models\StorageLocation;
use App\Models\HistoryActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'storageLocation')->get();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('category', 'storageLocation')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        $storageLocations = StorageLocation::all();
        return view('products.create', compact('categories', 'storageLocations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'storage_location_id' => 'required|exists:storage_locations,id',
            'sku' => 'required|max:100|unique:products,sku',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'storage_location_id' => $request->storage_location_id,
            'sku' => $request->sku,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        // Create history for adding product
        HistoryActivity::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'activity_type' => 'added',
            'quantity_change' => $product->stock,
            'description' => 'Product added to inventory',
        ]);

        Notification::create([
            'message' => 'Produk ' . $product->name . ' berhasil ditambahkan.'
        ]);

        // Check if the stock is below 50
        if ($product->stock < 50) {
            session()->flash('warning', 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!');
        }

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $storageLocations = StorageLocation::all();
        return view('products.edit', compact('product', 'categories', 'storageLocations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'storage_location_id' => 'required|exists:storage_locations,id',
            'sku' => 'required|max:100|unique:products,sku,' . $id,
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable',
        ]);

        $product = Product::findOrFail($id);
        $oldStock = $product->stock;

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'storage_location_id' => $request->storage_location_id,
            'sku' => $request->sku,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        $quantityChange = $request->stock - $oldStock;

        // Create history for updating product
        HistoryActivity::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'activity_type' => 'updated',
            'quantity_change' => $quantityChange,
            'description' => "Product updated. Old stock: $oldStock, New stock: {$request->stock}",
        ]);

        Notification::create([
            'message' => 'Produk ' . $product->name . ' berhasil diperbarui.'
        ]);

        // Check if the stock is below 50
        if ($product->stock < 50) {
            session()->flash('warning', 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!');
        }

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Create history for removing product
        HistoryActivity::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'activity_type' => 'removed',
            'quantity_change' => 0,
            'description' => 'Product removed from inventory',
        ]);

        Notification::create([
            'message' => 'Produk ' . $product->name . ' berhasil dihapus.'
        ]);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function adjustStockForm($id)
    {
        $product = Product::findOrFail($id);
        return view('products.adjust_stock', compact('product'));
    }

    public function adjustStock(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:stock_in,stock_out',
        ]);

        $product = Product::findOrFail($id);

        if ($request->type === 'stock_in') {
            $product->stock += $request->quantity;
        } elseif ($request->type === 'stock_out') {
            $product->stock -= $request->quantity;
        }

        $product->save();

        // Create history for stock adjustment
        HistoryActivity::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'activity_type' => $request->type,
            'quantity_change' => $request->quantity,
            'description' => ($request->type === 'stock_in' ? 'Menambah' : 'Mengurangi') . ' stok produk ' . $product->name . ' sebanyak ' . $request->quantity,
        ]);


        // Check if the stock is below 50 after adjustment
        if ($product->stock < 50) {
            session()->flash('warning', 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!');
        }

        return redirect()->route('products.index')->with('success', 'Stok produk berhasil diperbarui.');
    }
}
