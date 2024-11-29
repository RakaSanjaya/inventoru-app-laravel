<?php

namespace App\Http\Controllers;

use App\Models\StorageLocation; // Model for storage locations
use Illuminate\Http\Request;

class ProductLocationController extends Controller
{
    /**
     * Display a listing of the storage locations.
     */
    public function index()
    {
        $locations = StorageLocation::all();
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new storage location.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created storage location.
     */
    public function store(Request $request)
    {
        // Validasi: Pastikan nama lokasi penyimpanan unik
        $request->validate([
            'name' => 'required|max:255|unique:storage_locations,name', // Validasi unique pada nama
            'description' => 'nullable',
        ]);

        // Simpan lokasi penyimpanan
        StorageLocation::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('locations.index')->with('success', 'Storage location created successfully.');
    }


    /**
     * Show the form for editing an existing storage location.
     */
    public function edit($id)
    {
        $location = StorageLocation::findOrFail($id);
        return view('locations.edit', compact('location'));
    }

    /**
     * Update the storage location.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        $location = StorageLocation::findOrFail($id);
        $location->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('locations.index')->with('success', 'Storage location updated successfully.');
    }

    /**
     * Delete the specified storage location.
     */
    public function destroy($id)
    {
        $location = StorageLocation::findOrFail($id);
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Storage location deleted successfully.');
    }
}
