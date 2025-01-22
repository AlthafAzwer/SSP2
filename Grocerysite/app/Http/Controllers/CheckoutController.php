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
        // Validate the form input
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

        // Get the cart data from the session
        $cart = session()->get('cart', []);

        // Save the order to the database
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
            'status' => 'pending', // Default order status
            'cart' => json_encode($cart), // Save cart as JSON
        ]);

        // Clear the cart from the session
        session()->forget('cart');

        // Redirect the user with a success message
        return redirect()->route('home')->with('success', 'Your order has been placed successfully!');
    }
}
