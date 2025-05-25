<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
class PackageController extends Controller
{
     public function index()
    {
        $packages = Package::with('category')->latest()->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.packages.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'title' => 'required',
        'description' => 'nullable|string',
        'location' => 'required',
        'price' => 'required|numeric',
        'duration_days' => 'required|integer',
        'available_from' => 'nullable|date',
        'available_to' => 'nullable|date',
        'image' => 'nullable|image|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('packages', 'public');
        $data['image'] = $image;
    }

    Package::create($data);

    return redirect()->route('admin.packages.index')->with('success', 'Package created successfully.');
}
public function edit($id)
{
    $package = Package::findOrFail($id);
    $categories = Category::all();
    return view('admin.packages.edit', compact('package', 'categories'));
}

public function update(Request $request, $id)
{
    $package = Package::findOrFail($id);

    $validated = $request->validate([
        'category_id'     => 'required|exists:categories,id',
        'title'           => 'required|string|max:255',
        'description'     => 'nullable|string',
        'location'        => 'required|string|max:255',
        'price'           => 'required|numeric|min:0',
        'duration_days'   => 'required|integer|min:1',
        'available_from'  => 'nullable|date',
        'available_to'    => 'nullable|date|after_or_equal:available_from',
        'image'           => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($package->image && \Storage::disk('public')->exists($package->image)) {
            \Storage::disk('public')->delete($package->image);
        }

        $validated['image'] = $request->file('image')->store('packages', 'public');
    }

    $package->update($validated);

    return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
}    

   public function destroy($id)
{
    $package = Package::findOrFail($id);

    // Delete image from storage if exists
    if ($package->image && Storage::disk('public')->exists($package->image)) {
        Storage::disk('public')->delete($package->image);
    }

    // Delete the package
    $package->delete();

    return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully.');
}
}
