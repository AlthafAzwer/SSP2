<div>
    <h1 class="text-2xl font-bold mb-4">Manage Products</h1>

    <!-- Add Product Form -->
    <form wire:submit.prevent="addProduct" class="mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" wire:model="image" class="mt-1 block w-full">
                @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <input type="text" id="category" wire:model="category" class="mt-1 block w-full">
                @error('category') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" wire:model="name" class="mt-1 block w-full">
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" wire:model="description" class="mt-1 block w-full"></textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" id="price" wire:model="price" class="mt-1 block w-full">
                @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-md">
            Add Product
        </button>
    </form>

    <!-- Display Products -->
    <h2 class="text-lg font-bold mb-4">Product List</h2>
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Image</th>
                <th class="px-4 py-2 border">Category</th>
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="px-4 py-2 border"><img src="{{ asset('storage/' . $product->image) }}" class="h-12"></td>
                    <td class="px-4 py-2 border">{{ $product->category }}</td>
                    <td class="px-4 py-2 border">{{ $product->name }}</td>
                    <td class="px-4 py-2 border">${{ $product->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
