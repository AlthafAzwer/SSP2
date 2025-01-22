<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold mb-6">Your Cart ({{ array_sum($cart) }} items)</h1>

    @if($products->isEmpty())
        <p class="text-gray-500">Your cart is empty.</p>
    @else
        <table class="table-auto w-full border-collapse border border-gray-300 mb-6">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="p-4">Item</th>
                    <th class="p-4">Price</th>
                    <th class="p-4">Quantity</th>
                    <th class="p-4">Total</th>
                    <th class="p-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr class="border-t border-gray-300">
                        <td class="p-4">{{ $product->name }}</td>
                        <td class="p-4">Rs {{ number_format($product->price, 2) }}</td>
                        <td class="p-4">
                            <button
                                class="px-2 py-1 bg-red-500 text-white rounded"
                                wire:click="decreaseQuantity({{ $product->id }})"
                            >-</button>
                            <span class="px-4">{{ $cart[$product->id] }}</span>
                            <button
                                class="px-2 py-1 bg-green-500 text-white rounded"
                                wire:click="increaseQuantity({{ $product->id }})"
                            >+</button>
                        </td>
                        <td class="p-4">Rs {{ number_format($product->price * $cart[$product->id], 2) }}</td>
                        <td class="p-4">
                            <button
                                class="px-4 py-2 bg-gray-500 text-white rounded"
                                wire:click="removeItem({{ $product->id }})"
                            >Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-end">
            <div class="text-right">
                <p class="text-lg font-bold">Subtotal: Rs {{ number_format($total, 2) }}</p>
                <!-- Checkout Button -->
                <a 
                    href="{{ route('checkout') }}" 
                    class="mt-4 px-4 py-2 bg-blue-500 text-white rounded inline-block text-center"
                >
                    Checkout
                </a>
            </div>
        </div>
    @endif
</div>
