@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-r from-gray-100 to-gray-200 p-6">

    <div class="max-w-5xl w-full bg-white shadow-lg rounded-lg p-8 backdrop-blur-md transition-all transform hover:scale-102">
        <h2 class="text-4xl font-bold text-gray-800 text-center mb-6">Contact Us</h2>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4 text-center shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Contact Info -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Get in Touch</h3>
                    <div class="space-y-4 text-lg text-gray-700">
                        <p><strong>📞 Phone:</strong> +94 76 744 0651</p>
                        <p><strong>📧 Email:</strong> <a href="mailto:support@grocerify.com" class="text-blue-600 hover:underline">support@grocerify.com</a></p>
                        <p><strong>📍 Location:</strong> Colombo 15, Sri Lanka</p>
                        <p><strong>🕒 Working Hours:</strong> Mon - Sat, 9 AM - 6 PM</p>
                    </div>
                </div>

                <!-- Bigger Logo Positioned Below -->
                <div class="mt-8 flex justify-center">
                    <img src="{{ asset('images/logofinal.png') }}" alt="GroceriFy Logo" class="w-98 h-auto">
                </div>
            </div>

            <!-- Contact Form -->
            <form action="{{ route('contact.submit') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" name="first_name" required class="w-full mt-1 p-3 border rounded-md focus:ring focus:ring-blue-300">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" name="last_name" required class="w-full mt-1 p-3 border rounded-md focus:ring focus:ring-blue-300">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" required class="w-full mt-1 p-3 border rounded-md focus:ring focus:ring-blue-300">
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="phone" required class="w-full mt-1 p-3 border rounded-md focus:ring focus:ring-blue-300">
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea name="message" required class="w-full mt-1 p-3 border rounded-md h-36 resize-none focus:ring focus:ring-blue-300"></textarea>
                </div>

                <button type="submit" class="w-full mt-6 bg-blue-600 text-white py-3 rounded-lg text-lg font-semibold shadow-md hover:bg-blue-700 transform transition hover:scale-103">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
