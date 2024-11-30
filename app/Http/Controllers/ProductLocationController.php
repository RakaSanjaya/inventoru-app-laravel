<?php

namespace App\Http\Controllers;

use App\Models\StorageLocation;
use Illuminate\Http\Request;

class ProductLocationController extends Controller
{
    public function index()
    {
        $locations = StorageLocation::all();
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:storage_locations,name',
            'description' => 'nullable',
        ]);

        StorageLocation::create($request->only('name', 'description'));

        return redirect()->route('locations.index')->with('success', 'Storage location created successfully.');
    }

    public function edit($id)
    {
        $location = StorageLocation::findOrFail($id);
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        $location = StorageLocation::findOrFail($id);
        $location->update($request->only('name', 'description'));

        return redirect()->route('locations.index')->with('success', 'Storage location updated successfully.');
    }

    public function destroy($id)
    {
        $location = StorageLocation::findOrFail($id);
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Storage location deleted successfully.');
    }
}
