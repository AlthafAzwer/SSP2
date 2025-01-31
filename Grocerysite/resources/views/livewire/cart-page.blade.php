<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Page Title -->
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Your Cart ({{ array_sum($cart) }} items)</h1>

    @if($products->isEmpty())
        <!-- Empty Cart Message -->
        <p class="text-gray-500 text-lg text-center py-8">Your cart is empty.</p>
    @else
        <!-- Cart Table -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 text-left text-lg">
                        <th class="p-4">Item</th>
                        <th class="p-4 text-center">Price</th>
                        <th class="p-4 text-center">Quantity</th>
                        <th class="p-4 text-center">Total</th>
                        <th class="p-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr class="border-t border-gray-300 hover:bg-gray-50 transition duration-200">
                            <td class="p-4 text-gray-800 font-medium">{{ $product->name }}</td>
                            <td class="p-4 text-center text-gray-700">Rs {{ number_format($product->price, 2) }}</td>
                            <td class="p-4 text-center flex items-center justify-center space-x-3">
                                <!-- Decrease Quantity -->
                                <button
                                    class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded transition duration-300"
                                    wire:click="decreaseQuantity({{ $product->id }})"
                                >
                                    -
                                </button>
                                <span class="px-4 text-lg text-gray-900">{{ $cart[$product->id] }}</span>
                                <!-- Increase Quantity -->
                                <button
                                    class="px-2 py-1 bg-green-500 hover:bg-green-600 text-white rounded transition duration-300"
                                    wire:click="increaseQuantity({{ $product->id }})"
                                >
                                    +
                                </button>
                            </td>
                            <td class="p-4 text-center text-gray-700">
                                Rs {{ number_format($product->price * $cart[$product->id], 2) }}
                            </td>
                            <td class="p-4 text-center">
                                <!-- Remove Button -->
                                <button
                                    class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded transition duration-300"
                                    wire:click="removeItem({{ $product->id }})"
                                >
                                    Remove
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Subtotal & Checkout Section -->
        <div class="flex justify-end mt-6">
            <div class="text-right">
                <p class="text-xl font-bold text-gray-800">Subtotal: Rs {{ number_format($total, 2) }}</p>
                <!-- Checkout Button -->
                <a 
                    href="{{ route('checkout') }}" 
                    class="mt-4 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-lg font-semibold rounded-lg inline-block transition duration-300 shadow-md"
                >
                    Checkout
                </a>
            </div>
        </div>
    @endif
</div>
