@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8 transition-transform transform hover:scale-[1.02] duration-200">
    <h2 class="text-3xl font-extrabold text-gray-900 mb-6 border-b pb-3">Order Details</h2>

    <!-- Order Information -->
    <div class="bg-gray-50 p-6 rounded-lg shadow-sm border">
        <p class="text-lg font-semibold text-gray-800"><strong>Order ID:</strong> #{{ $order->id }}</p>
        <p class="text-lg"><strong>Customer:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
        <p class="text-lg"><strong>Email:</strong> 
            <a href="mailto:{{ $order->email }}" class="text-blue-600 hover:underline">{{ $order->email }}</a>
        </p>
        <p class="text-lg"><strong>Phone:</strong> {{ $order->phone }}</p>
        <p class="text-lg"><strong>Address:</strong> {{ $order->street }}, {{ $order->city }}, {{ $order->country }} - {{ $order->zip }}</p>
        <p class="text-lg"><strong>Payment Method:</strong> 
            <span class="px-3 py-1 rounded-full bg-blue-200 text-blue-800">{{ ucfirst($order->payment_method) }}</span>
        </p>
        <p class="text-lg"><strong>Date:</strong> {{ $order->created_at->format('d M, Y H:i A') }}</p>
    </div>

    <!-- Order Items -->
    <h3 class="text-2xl font-semibold text-gray-900 mt-6 border-b pb-3">Order Items</h3>
    <ul class="space-y-3 mt-3">
        @foreach ($cartItems as $productId => $quantity)
            <li class="bg-white p-4 rounded-lg shadow-md flex justify-between items-center border-l-4 border-blue-500 hover:bg-gray-100 transition-all duration-200">
                <span class="text-lg font-medium text-gray-900">{{ $products[$productId]->name ?? 'Unknown Product' }}</span>
                <span class="text-gray-700 font-semibold">Quantity: {{ $quantity }}</span>
            </li>
        @endforeach
    </ul>

    <!-- Update Order Status -->
    <h3 class="text-2xl font-bold mt-6 text-gray-900 border-b pb-3">Update Order Status</h3>
    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="mt-4 flex items-center space-x-4">
        @csrf
        <select name="status" class="border p-3 rounded-lg shadow-sm text-gray-700 focus:ring focus:ring-blue-300">
            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
            <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
        </select>
        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 shadow-md transform hover:scale-105 transition-all duration-200">
            Update
        </button>
    </form>

    <!-- Back Button -->
    <div class="flex justify-center mt-6">
        <a href="{{ route('admin.orders.index') }}" 
           class="inline-block bg-gray-700 text-white px-6 py-3 rounded-lg font-medium shadow-md hover:bg-gray-800 transform transition-all duration-200 hover:scale-105">
            Back to Orders
        </a>
    </div>
</div>
@endsection
