<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    // Display a listing of the packages
    public function index()
    {
        $packages = Package::all();
        return view('packages.index', compact('packages'));
    }

    // Show the form for creating a new package
    public function create()
    {
        return view('packages.create');
    }

    // Store a newly created package in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Name' => 'required|string|max:100',
            'Description' => 'required|string',
        ]);

        Package::create($validatedData);

        return redirect()->route('packages.index')->with('success', 'Package created successfully.');
    }

    // Display the specified package
    public function show(Package $package)
    {
        return view('packages.show', compact('package'));
    }

    // Show the form for editing the specified package
    public function edit(Package $package)
    {
        return view('packages.edit', compact('package'));
    }

    // Update the specified package in storage
    public function update(Request $request, Package $package)
    {
        $validatedData = $request->validate([
            'Name' => 'required|string|max:100',
            'Description' => 'required|string',
        ]);

        $package->update($validatedData);

        return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
    }

    // Remove the specified package from storage
    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->route('packages.index')->with('success', 'Package deleted successfully.');
    }
}
