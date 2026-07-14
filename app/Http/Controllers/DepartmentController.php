<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $departments = Department::all();

    return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'name' => 'required',
        'code' => 'required|unique:departments',
        'description' => 'nullable',
    ]);

    Department::create([
        'name' => $request->name,
        'code' => $request->code,
        'description' => $request->description,
        'status' => true,
    ]);

    return redirect()->route('departments.index')
                     ->with('success', 'Department Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
{
    return view('departments.edit', compact('department'));
}
    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Department $department)
{
    $request->validate([
        'name' => 'required',
        'code' => 'required',
        'description' => 'nullable',
    ]);

    $department->update([
        'name' => $request->name,
        'code' => $request->code,
        'description' => $request->description,
    ]);

    return redirect()->route('departments.index')
                     ->with('success','Department Updated Successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
  public function destroy(Department $department)
{
    $department->delete();

    return redirect()->route('departments.index')
                     ->with('success','Department Deleted Successfully.');
}
}
