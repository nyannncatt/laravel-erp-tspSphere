<?php

namespace App\Http\Controllers;

use App\Models\ParentsInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class parentsinfocontroller extends Controller
{
    // Display all parents
    public function index()
    {
        $parents = ParentsInfo::all();
        return view('admin.parentsinfo.index', compact('parents'));
    }

    // Show form to create a new parent
    public function create()
    {
        return view('admin.parentsinfo.create');
    }

    // Store a newly created parent in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:parents_info',
            'phone' => 'required|string',
            'dob' => 'required|date',
            'address' => 'required|string',
            'occupation' => 'required|string',
            'photo' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        ParentsInfo::create($data);

        return redirect()->route('parentsinfo.index')->with('success', 'Parent info added successfully!');
    }

    // Show form to edit an existing parent
    public function edit(ParentsInfo $parent)
    {
        return view('admin.parentsinfo.edit', compact('parent'));
    }

    // Update the parent in the database
    public function update(Request $request, ParentsInfo $parent)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:parents_info,email,' . $parent->id,
            'phone' => 'required|string',
            'dob' => 'required|date',
            'address' => 'required|string',
            'occupation' => 'required|string',
            'photo' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            if ($parent->photo) {
                Storage::delete('public/' . $parent->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $parent->update($data);

        return redirect()->route('parents.index')->with('success', 'Parent info updated successfully!');
    }

    // Delete the parent
    public function destroy(ParentsInfo $parent)
    {
        if ($parent->photo) {
            Storage::delete('public/' . $parent->photo);
        }

        $parent->delete();

        return redirect()->route('parents.index')->with('success', 'Parent info deleted successfully!');
    }
}
