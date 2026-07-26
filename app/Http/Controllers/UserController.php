<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $search = $request->input('search');

    $users = User::with('department')
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('users.index', compact('users', 'search'));
}

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $departments = Department::all();

    return view('users.create', compact('departments'));
}
    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'role' => 'required',
        'department_id' => 'nullable|exists:departments,id',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
        'department_id' => $request->department_id,
    ]);

    return redirect()->route('users.index')
                     ->with('success', 'User Added Successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit(string $id)
{
    $user = User::findOrFail($id);
    $departments = Department::all();

    return view('users.edit', compact('user', 'departments'));
}

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, string $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'required',
        'department_id' => 'nullable|exists:departments,id',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'department_id' => $request->department_id,
    ]);

    return redirect()->route('users.index')
                     ->with('success', 'User Updated Successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $user = User::findOrFail($id);

    $user->delete();

    return redirect()->route('users.index')
                     ->with('success', 'User Deleted Successfully.');
}
}