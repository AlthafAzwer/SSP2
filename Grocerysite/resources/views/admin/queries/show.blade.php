@extends('layouts.admin')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="max-w-3xl w-full bg-white shadow-xl rounded-lg p-6">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Query Details</h2>

        <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 shadow-sm">
            <p class="text-gray-500 text-sm">Submitted on: <strong class="text-gray-900">{{ $query->created_at->format('d M, Y H:i A') }}</strong></p>
            
            <div class="mt-4 p-4 bg-gray-100 border-l-4 border-blue-500 text-gray-800 text-lg font-semibold rounded-lg shadow-md">
                {{ $query->message }}
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.admin.queries.index') }}" 
                class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-blue-700 transition-all">
                Back to Queries
            </a>
        </div>
    </div>
</div>
@endsection
