@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="grid grid-cols-3 gap-4">
    <!-- Example Dashboard Widgets -->
    <div class="p-6 bg-white shadow-md rounded-md">
        <h2 class="text-xl font-bold mb-4">Total Revenue</h2>
        <p class="text-green-600 text-2xl">$203k</p>
    </div>
    <div class="p-6 bg-white shadow-md rounded-md">
        <h2 class="text-xl font-bold mb-4">Average Transaction</h2>
        <p class="text-blue-600 text-2xl">3.4k</p>
    </div>
    <div class="p-6 bg-white shadow-md rounded-md">
        <h2 class="text-xl font-bold mb-4">Average Footfall</h2>
        <p class="text-yellow-600 text-2xl">683</p>
    </div>
</div>
@endsection
