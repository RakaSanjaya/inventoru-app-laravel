<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255', // Nama kategori harus unik
            'description' => 'nullable', // Deskripsi opsional
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id . '|max:255',
            'description' => 'nullable',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Hapus semua produk terkait
        $category->products()->delete();

        // Hapus kategori
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category and related products deleted successfully.');
    }
}
