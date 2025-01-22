
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- FILTERS & SEARCH -->
    <div class="flex flex-col sm:flex-row gap-4 mb-8">
        <!-- Category Filter -->
        <div class="flex flex-col">
            <label for="category" class="text-sm font-semibold mb-1 text-gray-700">
                Category
            </label>
            <div class="relative">
                <select
                    id="category"
                    wire:model="selectedCategory"
                    class="border border-gray-300 rounded-md px-3 py-2
                           text-gray-700 focus:outline-none focus:ring-2
                           focus:ring-blue-500 focus:border-blue-500
                           transition-colors w-full sm:w-48"
                >
                    <option value="all">All</option>
                    <option value="Vegetable">Vegetable</option>
                    <option value="Fruit">Fruit</option>
                    <option value="Bakery">Bakery</option>
                </select>
            </div>
            <button
                type="button"
                class="mt-2 inline-flex items-center px-4 py-2
                       bg-blue-600 text-white text-sm font-medium
                       rounded-md hover:bg-blue-700 focus:outline-none
                       focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                       transition-colors"
                wire:click="refreshProducts"
            >
                Apply
            </button>
        </div>

        <!-- Search Box -->
        <div class="flex-1">
            <label for="search" class="text-sm font-semibold mb-1 text-gray-700">
                Search
            </label>
            <div class="relative">
                <input
                    type="text"
                    id="search"
                    wire:model.defer="searchTerm"
                    placeholder="Search products..."
                    class="border border-gray-300 rounded-md px-3 py-2
                           pr-10 text-gray-700 focus:outline-none
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                           transition-colors w-full"
                />
                <!-- Magnifying glass icon inside the input -->
                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <button
                        type="button"
                        class="text-gray-500 hover:text-blue-600 transition-colors"
                        wire:click="refreshProducts"
                    >
                        <!-- Heroicons: Magnifying Glass -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M11 5a7 7 0 017 7c0 1.31-.38 2.53-1.03 3.56l4.24 4.24a1 1 0 11-1.41 1.41l-4.24-4.24A6.96 6.96 0 0111 19a7 7 0 110-14z"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- PRODUCT LIST -->
    <div
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3
               gap-6 place-items-start"
    >
        @forelse($products as $product)
            <div
                class="bg-white rounded-lg shadow-md p-4
                       transform transition-transform duration-300
                       hover:scale-105 hover:shadow-xl flex flex-col"
            >
                <!-- Image Section -->
                <div class="h-48 w-full overflow-hidden rounded-md">
                    <img
                        src="{{ Storage::url($product->image) }}"
                        alt="{{ $product->name }}"
                        class="h-full w-full object-cover"
                    />
                </div>

                <!-- Info Section -->
                <div class="mt-4 flex flex-col flex-1">
                    <h2 class="text-lg font-bold text-gray-800">
                        {{ $product->name }}
                    </h2>
                    <p class="text-xs text-gray-500 mt-1">
                        {{ $product->category }}
                    </p>
                    <p class="text-sm text-gray-600 mt-2 flex-grow">
                        {{ $product->description }}
                    </p>
                    <p class="mt-2 text-xl font-semibold text-gray-800">
                        Rs {{ number_format($product->price, 2) }}
                    </p>

                    <!-- Stock / Cart Controls -->
                    @if($product->is_active)
                        @if(isset($cart[$product->id]))
                            <!-- If in cart, show +/- and Remove -->
                            <div class="flex items-center space-x-2 mt-4">
                                <button
                                    wire:click="decreaseQuantity({{ $product->id }})"
                                    class="bg-red-500 text-white px-3 py-1
                                           rounded hover:bg-red-600
                                           focus:outline-none transition-colors"
                                >
                                    -
                                </button>
                                <span class="font-bold text-gray-700">
                                    {{ $cart[$product->id] }}
                                </span>
                                <button
                                    wire:click="increaseQuantity({{ $product->id }})"
                                    class="bg-green-500 text-white px-3 py-1
                                           rounded hover:bg-green-600
                                           focus:outline-none transition-colors"
                                >
                                    +
                                </button>
                                <button
                                    wire:click="removeFromCart({{ $product->id }})"
                                    class="bg-gray-400 text-white px-3 py-1
                                           rounded hover:bg-gray-500
                                           focus:outline-none transition-colors"
                                >
                                    Remove
                                </button>
                            </div>
                        @else
                            <!-- If not in cart, show 'Add' -->
                            <button
                                wire:click="addToCart({{ $product->id }})"
                                class="mt-4 bg-green-500 text-white px-4 py-2
                                       rounded hover:bg-green-600 focus:outline-none
                                       transition-colors"
                            >
                                ADD
                            </button>
                        @endif
                    @else
                        <span class="mt-4 text-red-600 font-bold">
                            Out of Stock
                        </span>
                    @endif
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">
                No products found.
            </p>
        @endforelse
    </div>
</div>

