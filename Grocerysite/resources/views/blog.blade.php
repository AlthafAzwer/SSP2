@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
    <h2 class="text-4xl font-extrabold text-gray-800 text-center mb-8">Testimonies from Social Media</h2>

    <div class="max-w-6xl mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Instagram Review -->
        <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center transform transition hover:scale-105">
            <img src="{{ asset('images/story.jpg') }}" alt="User Profile" class="w-16 h-16 rounded-full shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mt-3">Althaf Azwer</h3>
            <div class="flex mt-1">
                <span class="text-yellow-500 text-lg">★★★★★</span>
            </div>
            <p class="text-gray-600 text-center mt-3">"Absolutely love GroceriFy! Their service is top-notch and always reliable. Highly recommended!"</p>
            <div class="flex items-center space-x-2 mt-4">
                <img src="{{ asset('images/instagram.png') }}" alt="Instagram" class="w-6 h-6">
                <span class="text-gray-500 text-sm">Instagram</span>
            </div>
        </div>

        <!-- Facebook Review 1 -->
        <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center transform transition hover:scale-105">
            <img src="{{ asset('images/josh.jpeg') }}" alt="User Profile" class="w-16 h-16 rounded-full shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mt-3">Josh</h3>
            <div class="flex mt-1">
                <span class="text-yellow-500 text-lg">★★★★☆</span>
            </div>
            <p class="text-gray-600 text-center mt-3">"GroceriFy made my grocery shopping so much easier. Great customer support too!"</p>
            <div class="flex items-center space-x-2 mt-4">
                <img src="{{ asset('images/facebook.png') }}" alt="Facebook" class="w-6 h-6">
                <span class="text-gray-500 text-sm">Facebook</span>
            </div>
        </div>

        <!-- Twitter Review 1 -->
        <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center transform transition hover:scale-105">
            <img src="{{ asset('images/joseph.jpg') }}" alt="User Profile" class="w-16 h-16 rounded-full shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mt-3">Joseph</h3>
            <div class="flex mt-1">
                <span class="text-yellow-500 text-lg">★★★★★</span>
            </div>
            <p class="text-gray-600 text-center mt-3">"Best online grocery store I've ever used. Everything is fresh and delivered on time!"</p>
            <div class="flex items-center space-x-2 mt-4">
                <img src="{{ asset('images/twitter.png') }}" alt="Twitter" class="w-6 h-6">
                <span class="text-gray-500 text-sm">Twitter</span>
            </div>
        </div>

        <!-- Instagram Review 2 -->
        <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center transform transition hover:scale-105">
            <img src="{{ asset('images/jake.jpg') }}" alt="User Profile" class="w-16 h-16 rounded-full shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mt-3">David Brown</h3>
            <div class="flex mt-1">
                <span class="text-yellow-500 text-lg">★★★★★</span>
            </div>
            <p class="text-gray-600 text-center mt-3">"The variety of products is amazing. I never have to worry about running out of groceries!"</p>
            <div class="flex items-center space-x-2 mt-4">
                <img src="{{ asset('images/instagram.png') }}" alt="Instagram" class="w-6 h-6">
                <span class="text-gray-500 text-sm">Instagram</span>
            </div>
        </div>

        <!-- Facebook Review 2 -->
        <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center transform transition hover:scale-105">
            <img src="{{ asset('images/emily.jpg') }}" alt="User Profile" class="w-16 h-16 rounded-full shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mt-3">Emily Scott</h3>
            <div class="flex mt-1">
                <span class="text-yellow-500 text-lg">★★★★☆</span>
            </div>
            <p class="text-gray-600 text-center mt-3">"Fast delivery and excellent quality products. Customer service is very responsive!"</p>
            <div class="flex items-center space-x-2 mt-4">
                <img src="{{ asset('images/facebook.png') }}" alt="Facebook" class="w-6 h-6">
                <span class="text-gray-500 text-sm">Facebook</span>
            </div>
        </div>

        <!-- Twitter Review 2 -->
        <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center transform transition hover:scale-105">
            <img src="{{ asset('images/alina.jpg') }}" alt="User Profile" class="w-16 h-16 rounded-full shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mt-3">Elina Anderson</h3>
            <div class="flex mt-1">
                <span class="text-yellow-500 text-lg">★★★★★</span>
            </div>
            <p class="text-gray-600 text-center mt-3">"Superb online store! I always find everything I need in one place with easy checkout."</p>
            <div class="flex items-center space-x-2 mt-4">
                <img src="{{ asset('images/twitter.png') }}" alt="Twitter" class="w-6 h-6">
                <span class="text-gray-500 text-sm">Twitter</span>
            </div>
        </div>
    </div>
</div>
@endsection
