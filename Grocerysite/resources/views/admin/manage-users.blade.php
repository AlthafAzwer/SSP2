@extends('layouts.admin')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Manage Users</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4 shadow-md">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-sm">ID</th>
                    <th class="px-4 py-3 text-left font-semibold text-sm">Name</th>
                    <th class="px-4 py-3 text-left font-semibold text-sm">Email</th>
                    <th class="px-4 py-3 text-left font-semibold text-sm">Created At</th>
                    <th class="px-4 py-3 text-center font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-t border-gray-300 hover:bg-gray-50 transition duration-200">
                        <td class="px-4 py-3 text-sm font-medium text-gray-700">{{ $user->id }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $user->name }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $user->email }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $user->created_at->format('d-m-Y H:i') }}</td>
                        <td class="px-4 py-3 text-center">
                            <form action="{{ route('admin.admin.delete-user', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 text-white text-sm font-medium rounded hover:bg-red-600 focus:outline-none transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 4a2 2 0 00-2 2v1h12V6a2 2 0 00-2-2H6zM4 8v8a2 2 0 002 2h8a2 2 0 002-2V8H4zm4 2a1 1 0 112 0v4a1 1 0 11-2 0V10zm4 0a1 1 0 112 0v4a1 1 0 11-2 0V10z" clip-rule="evenodd" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-3 text-center text-gray-500">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
