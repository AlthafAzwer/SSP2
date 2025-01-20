@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <h1 class="text-2xl font-semibold mb-4">Welcome to the Admin Dashboard</h1>
    

    
    <!-- Logout Button -->
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" 
            class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            Logout
        </button>
    </form>
</div>
@endsection
