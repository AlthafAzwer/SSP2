<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    /**
     * Display the checkout page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('checkout');
    }

    /**
     * Handle the submission of the checkout form and place the order.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function placeOrder(Request $request)
    {
        
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'street' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip' => 'required',
            'payment_method' => 'required',
            'card_number' => 'nullable|required_if:payment_method,card',
            'card_expiry_month' => 'nullable|required_if:payment_method,card',
            'card_expiry_year' => 'nullable|required_if:payment_method,card',
            'card_cvv' => 'nullable|required_if:payment_method,card',
        ]);

        
        $cart = session()->get('cart', []);

        
        Order::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'street' => $validated['street'],
            'city' => $validated['city'],
            'country' => $validated['country'],
            'zip' => $validated['zip'],
            'payment_method' => $validated['payment_method'],
            'status' => 'pending', 
            'cart' => json_encode($cart), 
        ]);

        
        session()->forget('cart');

        
        return redirect()->route('user.orders')->with('success', 'Your order has been placed successfully!');

    }
}
