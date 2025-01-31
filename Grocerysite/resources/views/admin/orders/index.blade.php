@extends('layouts.admin')

@section('content')
    <div class="p-6 bg-gray-100 min-h-screen">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Manage Orders</h2>

        @if (session()->has('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Orders Table -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="w-full border-collapse">
                <thead class="bg-gray-200 text-gray-700">
                    <tr class="text-left">
                        <th class="px-6 py-3">Order ID</th>
                        <th class="px-6 py-3">Customer</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-b hover:bg-gray-100 transition">
                            <td class="px-6 py-4 font-semibold">{{ $order->id }}</td>
                            <td class="px-6 py-4">{{ $order->first_name }} {{ $order->last_name }}</td>
                            <td class="px-6 py-4">{{ $order->email }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-sm text-white 
                                    {{ $order->status === 'pending' ? 'bg-yellow-500' : ($order->status === 'shipped' ? 'bg-blue-500' : 'bg-green-500') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 flex items-center space-x-4">
                                <a href="{{ route('admin.orders.show', $order->id) }}" 
                                   class="text-blue-600 hover:underline font-medium">
                                    View
                                </a>
                                <form action="{{ route('admin.admin.orders.delete', $order->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this order?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline font-medium">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
