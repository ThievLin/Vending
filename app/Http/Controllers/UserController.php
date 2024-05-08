<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('contents/user', compact('data'));
    }

    protected function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Create the user
        User::create([
            'name' => $data['name'],
            'role' => $data['role'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Redirect the user after registration
        return redirect()->back()->with('success', 'user data has been saved successfully.');
    }

    protected function display()
    {
        $data = User::all();
        return view('contents/create/create_user', compact('data'));
    }
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('contents/update/edit_roleuser', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validate incoming request if needed
        $request->validate([
            // Add validation rules if required
        ]);

        // Find the user based on the provided ID
        $user = User::findOrFail($id);
        // Update the per_dash value based on the checkbox status
        $user->per_dash = $request->has('per_dash') ? 1 : 0;
        $user->per_ven = $request->has('per_ven') ? 1 : 0;
        $user->per_pro = $request->has('per_pro') ? 1 : 0;
        $user->per_in = $request->has('per_in') ? 1 : 0;
        $user->per_inv = $request->has('per_inv') ? 1 : 0;
        $user->per_rep = $request->has('per_rep') ? 1 : 0;
        $user->per_user = $request->has('per_user') ? 1 : 0;

        // Save the updated user
        $user->save();

        // Redirect back or to any other route
        return redirect()->back()->with('success', 'User updated successfully.');
    }
}
