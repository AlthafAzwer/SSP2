@extends('layouts.app')

@section('content')
    <div class="p-6 bg-gray-100 min-h-screen">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6">My Orders</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($orders as $order)
                <div class="bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">
                            Order #{{ $order->id }}
                        </h3>
                        <span class="px-3 py-1 rounded-full text-sm font-medium 
                            @if($order->status == 'delivered') bg-green-100 text-green-800 
                            @elseif($order->status == 'shipped') bg-blue-100 text-blue-800 
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <p class="mt-2 text-gray-600">
                        <strong>Placed On:</strong> {{ $order->created_at->format('d M Y, h:i A') }}
                    </p>

                    <p class="mt-2 text-gray-600">
                        <strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}
                    </p>

                    <div class="mt-4">
                        <a href="{{ route('user.orders.show', $order->id) }}" 
                            class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
                            View Order
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
