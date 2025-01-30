@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <!-- Retrieve 3 random products in the Blade, so we have $featuredProducts -->
    @php
        $featuredProducts = \App\Models\Product::inRandomOrder()->take(3)->get();
    @endphp

    <!-- Hero / Banner Section -->
    <section class="relative h-[500px] flex items-center justify-center shadow-md">
    <img
        class="absolute inset-0 h-full w-full object-cover"
        src="{{ asset('images/heroes.jpg') }}"
        alt="GroceriFy Banner"
    />
    <!-- Dark Overlay -->
    

    <!-- Centered Hero Text -->

</section>



<!-- Browse by Category -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h2 class="text-3xl font-bold text-center mb-8">Browse by Category</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <!-- Vegetables -->
        <a href="{{ route('products', ['category' => 'Vegetable']) }}"
           class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
            <img src="{{ asset('images/vege.jpg') }}" alt="Vegetables"
                class="w-full h-48 object-cover group-hover:scale-110 transition duration-300">
            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-60 text-white text-center py-3 text-lg font-semibold">
                Vegetables
            </div>
        </a>

        <!-- Fruits -->
        <a href="{{ route('products', ['category' => 'Fruit']) }}"
           class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
            <img src="{{ asset('images/fruits.jpg') }}" alt="Fruits"
                class="w-full h-48 object-cover group-hover:scale-110 transition duration-300">
            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-60 text-white text-center py-3 text-lg font-semibold">
                Fruits
            </div>
        </a>

        <!-- Dairy -->
        <a href="{{ route('products', ['category' => 'Bakery']) }}"
           class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
            <img src="{{ asset('images/bake.jpg') }}" alt="Bakery"
                class="w-full h-48 object-cover group-hover:scale-110 transition duration-300">
            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-60 text-white text-center py-3 text-lg font-semibold">
                Bakery
            </div>
        </a>

        <!-- Meat -->
        <a href="{{ route('products', ['category' => 'Meat']) }}"
           class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
            <img src="{{ asset('images/meat.jpg') }}" alt="Meat"
                class="w-full h-48 object-cover group-hover:scale-110 transition duration-300">
            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-60 text-white text-center py-3 text-lg font-semibold">
                Meat
            </div>
        </a>

        <!-- Snacks -->
        <a href="{{ route('products', ['category' => 'Snacks']) }}"
           class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
            <img src="{{ asset('images/snack.jpg') }}" alt="Snacks"
                class="w-full h-48 object-cover group-hover:scale-110 transition duration-300">
            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-60 text-white text-center py-3 text-lg font-semibold">
                Snacks
            </div>
        </a>

        <!-- Beverages -->
        <a href="{{ route('products', ['category' => 'Beverages']) }}"
           class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-2">
            <img src="{{ asset('images/beverage.jpg') }}" alt="Beverages"
                class="w-full h-48 object-cover group-hover:scale-110 transition duration-300">
            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-60 text-white text-center py-3 text-lg font-semibold">
                Beverages
            </div>
        </a>
    </div>
</section>




   <!-- Featured Products Section -->
<section class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Featured Products Heading -->
        <h2 class="text-3xl font-bold text-center mb-8 transition duration-300 hover:text-blue-600 hover:scale-105">
            Featured Products
        </h2>

        <!-- Display 3 random products -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($featuredProducts as $product)
                <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1 p-5 flex flex-col">
                    <!-- Product Image -->
                    <div class="relative overflow-hidden rounded-lg">
                        <img src="{{ Storage::url($product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-56 object-cover rounded-lg transition-transform duration-300 transform hover:scale-105">
                    </div>

                    <!-- Product Info -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $product->category }}</p>
                        <p class="mt-2 text-sm text-gray-600">{{ Str::limit($product->description, 100) }}</p> <!-- Product Description -->
                        <p class="mt-3 font-bold text-green-700">Rs. {{ number_format($product->price, 2) }}</p>
                    </div>

                    <!-- View Product Link -->
                    <a href="{{ route('products') }}" 
                       class="mt-4 text-blue-600 hover:text-blue-800 text-sm font-medium underline">
                        View Product
                    </a>
                </div>
            @endforeach
        </div>




            <!-- Button to See All Products -->
            <div class="text-center mt-8">
                <a
                    href="{{ route('products') }}"
                    class="inline-block bg-blue-600 text-white px-5 py-3 rounded hover:bg-blue-700 transition"
                >
                    Shop All Products
                </a>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Left Side: Image -->
            <div class="relative">
                <img src="{{ asset('images/storyboy.jpg') }}" alt="Our Story" class="w-full h-auto rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
            </div>

            <!-- Right Side: Story Content -->
            <div>
                <h2 class="text-4xl font-bold text-gray-800 mb-6">
                    Our Story
                </h2>
                <p class="text-gray-700 leading-relaxed mb-4 text-lg">
                    We started <span class="font-semibold text-green-600">GroceryMan</span> with a simple mission: to deliver fresh, high-quality produce
                    and grocery items right to your doorstep. Our family-run business has been sourcing
                    from local farms for over a decade, ensuring only the best ingredients make it to your table.
                </p>
                <p class="text-gray-700 leading-relaxed text-lg">
                    From <span class="font-semibold text-green-600">organic vegetables and fruits</span> to <span class="font-semibold text-green-600">dairy and beyond</span>, we're committed to offering
                    a wide selection of items to meet all your daily needs. We believe in sustainability,
                    supporting local farmers, and bringing you the freshest groceries possible.
                </p>
                <p class="text-lg mt-6 text-gray-800 font-semibold italic">
                    Join us on this journey to better living! 🍃
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
