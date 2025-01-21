<div class="p-6 bg-gray-100 min-h-screen relative">
    <div>
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Manage Products</h2>

        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4 shadow-md animate-fade-in-down">
                {{ session('message') }}
            </div>
        @endif

        <!-- Floating Action Button -->
        <button
            wire:click="toggleModal"
            class="fixed bottom-6 right-6 bg-blue-600 text-white w-16 h-16 rounded-full shadow-lg flex items-center justify-center text-2xl font-bold hover:bg-blue-700 focus:outline-none transform hover:scale-110 transition-transform duration-300"
        >
            +
        </button>

        <!-- Add/Edit Product Modal -->
        @if ($showModal)
            <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-20 animate-fade-in">
                <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">
                        {{ $isEditMode ? 'Edit Product' : 'Add Product' }}
                    </h3>
                    <form wire:submit.prevent="{{ $isEditMode ? 'updateProduct' : 'addProduct' }}" class="space-y-4">
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                            <input
                                type="file"
                                id="image"
                                wire:model="image"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            />
                            @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <input
                                type="text"
                                id="category"
                                wire:model="category"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            />
                            @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input
                                type="text"
                                id="name"
                                wire:model="name"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            />
                            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea
                                id="description"
                                wire:model="description"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            ></textarea>
                            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <input
                                type="number"
                                id="price"
                                wire:model="price"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            />
                            @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button
                                type="button"
                                wire:click="toggleModal"
                                class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 transition-all"
                            >
                                Cancel
                            </button>
                            <button
                                type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-all"
                            >
                                {{ $isEditMode ? 'Update Product' : 'Add Product' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        <!-- Product Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
            @foreach ($products as $product)
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-transform hover:scale-105 duration-300 relative animate-fade-in"
                >
                    <img
                        src="{{ Storage::url($product->image) }}"
                        alt="Product Image"
                        class="w-full h-48 object-cover"
                    />
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-800">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $product->category }}</p>
                        <p class="mt-2 text-gray-600">{{ $product->description }}</p>
                        <p class="mt-4 text-xl font-bold text-gray-800">${{ number_format($product->price, 2) }}</p>
                        <p class="mt-2">
                            <span
                                class="px-2 py-1 rounded text-sm {{ $product->is_active ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700' }}"
                            >
                                {{ $product->is_active ? 'Available' : 'Out of Stock' }}
                            </span>
                        </p>
                    </div>
                    <div class="p-4 border-t flex justify-between">
                        <button
                            class="text-blue-600 hover:underline focus:outline-none flex items-center gap-2"
                            wire:click="editProduct({{ $product->id }})"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828zM4 12v3a1 1 0 001 1h3l7.293-7.293-4-4L4 12z" />
                            </svg>
                            Edit
                        </button>
                        <button
                            class="text-red-600 hover:underline focus:outline-none flex items-center gap-2"
                            wire:click="deleteProduct({{ $product->id }})"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 4a2 2 0 00-2 2v1h12V6a2 2 0 00-2-2H6zm3 6a1 1 0 10-2 0v5a1 1 0 102 0V10zm5-1a1 1 0 00-2 0v5a1 1 0 002 0V9z" clip-rule="evenodd" />
                            </svg>
                            Delete
                        </button>
                        <button
                            class="text-yellow-600 hover:underline focus:outline-none flex items-center gap-2"
                            wire:click="toggleProductAvailability({{ $product->id }})"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm4-8a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            {{ $product->is_active ? 'Mark Out of Stock' : 'Mark Available' }}
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
