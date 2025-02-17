<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::latest()->get(); // Fetch all orders, latest first
        return view('admin.orders.index', compact('orders'));
    }


    public function show($id)
    {
        $order = Order::findOrFail($id);
        
        
        $cartItems = json_decode($order->cart, true);
        
        
        $products = Product::whereIn('id', array_keys($cartItems))->get()->keyBy('id');
    
        return view('admin.orders.show', compact('order', 'cartItems', 'products'));
    }
    


    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return back()->with('success', 'Order status updated successfully!');
    }

 
    public function userOrders()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to view your orders.');
        }

        $orders = Order::where('email', Auth::user()->email)->latest()->get();
        return view('user.orders.index', compact('orders'));
    }




     public function userOrderDetails($id)
     {
         $order = Order::where('id', $id)
                       ->where('email', Auth::user()->email)
                       ->firstOrFail();
     
         
         $cartItems = json_decode($order->cart, true);
     
         
         $products = Product::whereIn('id', array_keys($cartItems))->get()->keyBy('id');
     
         return view('user.orders.show', compact('order', 'cartItems', 'products'));
     }
     
     
     public function deleteOrder($id)
     {
         $order = Order::findOrFail($id);
         $order->delete();
 
         return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully!');
     }
     



    
}
