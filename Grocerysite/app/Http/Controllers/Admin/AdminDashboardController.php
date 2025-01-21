<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function manage()
    {
        return view('admin.manage-products');
    }

    public function manageUsers()
    {
        $users = User::all(); // Fetch all users
        return view('admin.manage-users', compact('users'));
    }

    public function deleteUser($id)
    {
        // Find the user by ID and delete
        $user = User::findOrFail($id);
        $user->delete();
    
        // Redirect back to the manage users page with a success message
        return redirect()->route('admin.admin.manage-users')->with('message', 'User deleted successfully!');
    }
    

}
