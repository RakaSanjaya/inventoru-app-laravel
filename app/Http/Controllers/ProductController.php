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
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
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
            'category' => 'required',
            'storage_location' => 'required',
            'sku' => 'required|max:100|unique:products,sku',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable',
        ]);

        $product = Product::create($request->all());

        HistoryActivity::create([
            'actor' => Auth::user()->name,
            'name_product' => $product->name,
            'activity_type' => 'added',
            'quantity_change' => $product->stock,
            'description' => 'Product added to inventory',
        ]);

        Notification::create([
            'message' => 'Produk ' . $product->name . ' berhasil ditambahkan.'
        ]);

        if ($product->stock < 50) {
            session()->flash('warning', 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!');
            Notification::create([
                'message' => 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!',
            ]);
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
            'category' => 'required',
            'storage_location' => 'required',
            'sku' => 'required|max:100|unique:products,sku,' . $id,
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable',
        ]);

        $product = Product::findOrFail($id);
        $oldStock = $product->stock;
        $nameChanged = $product->name !== $request->name;
        $oldName = $product->name;

        $product->update($request->all());

        $quantityChange = $request->stock - $oldStock;
        $activityDescription = "Product updated. ";

        if ($nameChanged) {
            $activityDescription .= "Name changed from '$oldName' to '{$request->name}'. ";
        }
        if ($request->category !== $product->category) {
            $activityDescription .= "Category changed. ";
        }
        if ($request->storage_location !== $product->storage_location) {
            $activityDescription .= "Storage location changed. ";
        }
        if ($request->sku !== $product->sku) {
            $activityDescription .= "SKU changed. ";
        }
        if ($quantityChange !== 0) {
            $activityDescription .= "Stock changed by $quantityChange units (Old stock: $oldStock, New stock: {$request->stock}). ";
        }
        if ($request->price !== $product->price) {
            $activityDescription .= "Price changed. ";
        }

        HistoryActivity::create([
            'actor' => Auth::user()->name,
            'name_product' => $product->name,
            'activity_type' => 'updated',
            'quantity_change' => $quantityChange,
            'description' => $activityDescription,
        ]);

        Notification::create([
            'message' => 'Produk ' . $product->name . ' berhasil diperbarui.'
        ]);

        if ($product->stock < 50) {
            session()->flash('warning', 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!');
            Notification::create([
                'message' => 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!',
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        HistoryActivity::create([
            'actor' => Auth::user()->name,
            'name_product' => $product->name,
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

        $product->stock += $request->type === 'stock_in' ? $request->quantity : -$request->quantity;
        $product->save();

        HistoryActivity::create([
            'actor' => Auth::user()->name,
            'name_product' => $product->name,
            'activity_type' => $request->type,
            'quantity_change' => $request->quantity,
            'description' => ($request->type === 'stock_in' ? 'Menambah' : 'Mengurangi') . ' stok produk ' . $product->name . ' sebanyak ' . $request->quantity,
        ]);

        if ($product->stock < 50) {
            session()->flash('warning', 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!');
            Notification::create([
                'message' => 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!',
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Stok produk berhasil diperbarui.');
    }
}
