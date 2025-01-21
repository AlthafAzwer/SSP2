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
        <h2 class="text-3xl font-bold text-center mb-8">
            Browse by Category
        </h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
            <!-- Example Category Card -->
            <a
                href="{{ route('products', ['category' => 'Vegetable']) }}"
                class="flex flex-col items-center bg-white p-6 rounded-lg shadow hover:shadow-lg transition"
            >
                <img
                    src="{{ asset('images/vege.jpg') }}"
                    alt="Vegetables"
                    class="h-16 w-16 object-contain mb-3"
                />
                <p class="text-lg font-semibold text-gray-700">Vegetables</p>
            </a>

            <a
                href="{{ route('products', ['category' => 'Fruit']) }}"
                class="flex flex-col items-center bg-white p-6 rounded-lg shadow hover:shadow-lg transition"
            >
                <img
                    src="{{ asset('images/fruits.jpg') }}"
                    alt="Fruits"
                    class="h-16 w-16 object-contain mb-3"
                />
                <p class="text-lg font-semibold text-gray-700">Fruits</p>
            </a>

            <a
                href="{{ route('products', ['category' => 'Dairy']) }}"
                class="flex flex-col items-center bg-white p-6 rounded-lg shadow hover:shadow-lg transition"
            >
                <img
                    src="{{ asset('images/bake.jpg') }}"
                    alt="Dairy"
                    class="h-16 w-16 object-contain mb-3"
                />
                <p class="text-lg font-semibold text-gray-700">Dairy</p>
            </a>

            <a
                href="{{ route('products', ['category' => 'Snacks']) }}"
                class="flex flex-col items-center bg-white p-6 rounded-lg shadow hover:shadow-lg transition"
            >
                <img
                    src="{{ asset('images/snack.jpg') }}"
                    alt="Snacks"
                    class="h-16 w-16 object-contain mb-3"
                />
                <p class="text-lg font-semibold text-gray-700">Snacks</p>
            </a>
        </div>
    </section>

    <!-- Featured Products (3 Items) -->
    <section class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-6">Featured Products</h2>

            <!-- Display 3 random products -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($featuredProducts as $product)
                    <div class="bg-white rounded shadow p-4 flex flex-col hover:shadow-md transition">
                        <img
                            src="{{ Storage::url($product->image) }}"
                            alt="{{ $product->name }}"
                            class="w-full h-48 object-cover rounded"
                        />
                        <h3 class="mt-4 text-lg font-semibold text-gray-800">
                            {{ $product->name }}
                        </h3>
                        <p class="text-sm text-gray-500">
                            {{ $product->category }}
                        </p>
                        <p class="mt-2 font-bold text-green-700">
                            Rs. {{ number_format($product->price, 2) }}
                        </p>
                        <a
                            href="{{ route('products') }}"
                            class="mt-auto text-blue-600 hover:text-blue-800 text-sm font-medium underline"
                        >
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
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-4">Our Story</h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                We started GroceryMan with a simple mission: to deliver fresh, high-quality produce
                and grocery items right to your doorstep. Our family-run business has been sourcing
                from local farms for over a decade, ensuring only the best ingredients make it to
                your table.
            </p>
            <p class="text-gray-700 leading-relaxed">
                From organic vegetables and fruits to dairy and beyond, we're committed to offering
                a wide selection of items to meet all your daily needs. We believe in sustainability,
                supporting local farmers, and bringing you the freshest groceries possible. Join us
                on this journey to better living!
            </p>
        </div>
    </section>
@endsection
