@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-gray-100 to-gray-200 p-6">
    <div class="max-w-3xl w-full bg-white bg-opacity-80 shadow-2xl rounded-2xl p-8 backdrop-blur-md transition-all transform hover:scale-105">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Order Details</h2>

        <div class="space-y-3 text-gray-700">
            <p class="text-lg"><strong>Order ID:</strong> <span class="text-gray-900">{{ $order->id }}</span></p>
            <p class="text-lg"><strong>Status:</strong> 
                <span class="px-3 py-1 rounded-full text-white text-sm 
                    {{ $order->status === 'delivered' ? 'bg-green-500' : ($order->status === 'shipped' ? 'bg-yellow-500' : 'bg-red-500') }}">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
            <p class="text-lg"><strong>Payment Method:</strong> <span class="text-gray-900">{{ ucfirst($order->payment_method) }}</span></p>
            <p class="text-lg"><strong>Date:</strong> <span class="text-gray-900">{{ $order->created_at->format('d M, Y H:i A') }}</span></p>
        </div>

        <h3 class="text-2xl font-semibold text-gray-800 mt-6 mb-4 border-b pb-2">Order Items</h3>
        <ul class="space-y-3">
            @foreach ($cartItems as $productId => $quantity)
                <li class="bg-white p-4 rounded-lg shadow-md flex justify-between items-center border-l-4 border-blue-500">
                    <span class="font-semibold text-lg text-gray-900">{{ $products[$productId]->name ?? 'Unknown Product' }}</span>
                    <span class="text-gray-700 font-medium bg-gray-200 px-4 py-2 rounded-lg">{{ $quantity }}</span>
                </li>
            @endforeach
        </ul>

        <div class="flex justify-center mt-6">
            <a href="{{ route('user.orders') }}" 
               class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg text-lg font-semibold shadow-md hover:bg-blue-700 transform transition hover:scale-105">
                Back to Orders
            </a>
        </div>
    </div>
</div>
@endsection
