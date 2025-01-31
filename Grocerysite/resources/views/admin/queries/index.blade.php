@extends('layouts.admin')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Manage Queries</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-md mb-4 shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <table class="w-full border border-gray-200 rounded-lg">
        <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-6 py-4 text-left">Name</th>
                    <th class="px-6 py-4 text-left">Email</th>
                    <th class="px-6 py-4 text-left">Phone</th>
                    <th class="px-6 py-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($queries as $query)
                    <tr class="border-t border-gray-300 hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 text-gray-700">{{ $query->first_name }} {{ $query->last_name }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $query->email }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $query->phone ?? 'N/A' }}</td>

                        <!-- Actions -->
                        <td class="px-6 py-4 text-center flex justify-center space-x-4">
                            <a href="{{ route('admin.admin.queries.show', $query->id) }}" class="text-blue-600 font-medium hover:underline">View</a>
                            
                            <form action="{{ route('admin.admin.queries.delete', $query->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this query?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 font-medium hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">No queries found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
