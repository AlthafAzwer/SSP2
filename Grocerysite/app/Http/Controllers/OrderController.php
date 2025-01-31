<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Show all orders to the admin.
     */
    public function index()
    {
        $orders = Order::latest()->get(); // Fetch all orders, latest first
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show details of a specific order.
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        
        // Decode the cart
        $cartItems = json_decode($order->cart, true);
        
        // Get product details
        $products = Product::whereIn('id', array_keys($cartItems))->get()->keyBy('id');
    
        return view('admin.orders.show', compact('order', 'cartItems', 'products'));
    }
    

    /**
     * Update the order status (Admin functionality).
     */
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return back()->with('success', 'Order status updated successfully!');
    }

    /**
     * Show the user's order history.
     */
    public function userOrders()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to view your orders.');
        }

        $orders = Order::where('email', Auth::user()->email)->latest()->get();
        return view('user.orders.index', compact('orders'));
    }

    /**
     * Show a user's specific order details.
     */


     public function userOrderDetails($id)
     {
         $order = Order::where('id', $id)
                       ->where('email', Auth::user()->email)
                       ->firstOrFail();
     
         // Decode the cart
         $cartItems = json_decode($order->cart, true);
     
         // Get product details
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
