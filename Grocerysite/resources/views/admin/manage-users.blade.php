@extends('layouts.admin')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Manage Users</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-md mb-4 shadow-md">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
        <thead class="bg-gray-200 text-gray-700">
                <tr class="text-left text-sm font-semibold uppercase tracking-wide">
                    <th class="px-6 py-4">ID</th>
                    <th class="px-6 py-4">Name</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Created At</th>
                    <th class="px-6 py-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-t border-gray-300 hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 text-gray-700 font-medium">{{ $user->id }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $user->created_at->format('d-m-Y H:i') }}</td>

                        <!-- Delete Button -->
                        <td class="px-6 py-4 text-center">
                            <form action="{{ route('admin.admin.delete-user', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline font-medium">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
