<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    // Display all branches
    public function index()
    {
        $branches = Branch::all();
        return view('branches.index', compact('branches'));
    }

    // Show form to create a new branch
    public function create()
    {
        return view('branches.create');
    }

    // Store new branch in database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:20',
            'logo' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/branches'), $filename);
            $data['logo'] = $filename;
        }

        Branch::create($data);

        return redirect()->route('branches.index')->with('success', 'Branch created successfully.');
    }

    // Show single branch (optional)
    public function show(Branch $branch)
    {
        return view('branches.show', compact('branch'));
    }

    // Show edit form
    public function edit(Branch $branch)
    {
        return view('branches.edit', compact('branch'));
    }

    // Update branch
    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:20',
            'logo' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/branches'), $filename);
            $data['logo'] = $filename;
        }

        $branch->update($data);

        return redirect()->route('branches.index')->with('success', 'Branch updated successfully.');
    }

    // Delete branch
    public function destroy(Branch $branch)
    {
        if ($branch->logo && file_exists(public_path('uploads/branches/'.$branch->logo))) {
            unlink(public_path('uploads/branches/'.$branch->logo));
        }
        $branch->delete();

        return redirect()->route('branches.index')->with('success', 'Branch deleted successfully.');
    }
}
