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
