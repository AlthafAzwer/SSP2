<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Query;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(), 
            'totalOrders' => Order::count(), 
            'totalProducts' => Product::count(), 
            'totalQueries' => Query::count() 
        ]);
    }
    public function manage()
    {
        return view('admin.manage-products');
    }

    public function manageUsers()
    {
        $users = User::all(); 
        return view('admin.manage-users', compact('users'));
    }

    public function deleteUser($id)
    {
        
        $user = User::findOrFail($id);
        $user->delete();
    
       
        return redirect()->route('admin.admin.manage-users')->with('message', 'User deleted successfully!');
    }
    

}
