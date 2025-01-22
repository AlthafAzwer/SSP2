@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold mb-6">Checkout</h1>
    <form method="POST" action="{{ route('checkout.placeOrder') }}">
        @csrf
        <!-- Personal Information -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-4">1. Your Basic Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="first_name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" name="last_name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
        </div>

        <!-- Billing Address -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-4">2. Billing Address</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Street</label>
                    <input type="text" name="street" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" name="city" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Country</label>
                    <input type="text" name="country" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">ZIP Code</label>
                    <input type="text" name="zip" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>
        </div>

        <!-- Payment Information -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-4">3. Payment Information</h2>
            <div>
                <label class="flex items-center space-x-3">
                    <input type="radio" name="payment_method" value="cash" required class="text-blue-600 focus:ring-blue-500">
                    <span>Cash on Delivery</span>
                </label>
                <label class="flex items-center space-x-3 mt-2">
                    <input type="radio" name="payment_method" value="card" required class="text-blue-600 focus:ring-blue-500">
                    <span>Pay with Card</span>
                </label>
            </div>
            <div id="card-details" class="hidden mt-4">
                <label class="block text-sm font-medium text-gray-700">Credit Card Number</label>
                <input type="text" name="card_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Expiry Month</label>
                        <input type="text" name="card_expiry_month" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Expiry Year</label>
                        <input type="text" name="card_expiry_year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">CVV</label>
                    <input type="text" name="card_cvv" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="px-4 py-2 bg-green-500 text-white font-semibold rounded-md shadow hover:bg-green-600">
                Place Order
            </button>
        </div>
    </form>
</div>

<script>
    document.querySelectorAll('input[name="payment_method"]').forEach(input => {
        input.addEventListener('change', function() {
            const cardDetails = document.getElementById('card-details');
            if (this.value === 'card') {
                cardDetails.classList.remove('hidden');
            } else {
                cardDetails.classList.add('hidden');
            }
        });
    });
</script>
@endsection
