<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminManageProducts extends Component
{
    use WithFileUploads;

    public $image, $category, $name, $description, $price, $productId;
    public $products;
    public $showModal = false; // Tracks the modal visibility
    public $isEditMode = false; // Tracks whether we are editing or adding a product

    public function mount()
    {
        $this->refreshProducts();
    }

    public function refreshProducts()
    {
        $this->products = Product::all();
    }

    public function toggleModal()
    {
        $this->resetForm();
        $this->isEditMode = false; // Default to Add mode
        $this->showModal = !$this->showModal;
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);

        // Populate form fields with product data
        $this->productId = $product->id;
        $this->category = $product->category;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;

        $this->isEditMode = true; // Switch to Edit mode
        $this->showModal = true; // Open the modal
    }

    public function addProduct()
    {
        $this->validate([
            'image' => 'required|image|max:2048',
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $imagePath = $this->image->store('products', 'public');

        Product::create([
            'image' => $imagePath,
            'category' => $this->category,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'is_active' => true,
        ]);

        $this->resetForm();
        $this->refreshProducts();
        $this->showModal = false; // Close the modal
        session()->flash('message', 'Product added successfully!');
    }

    public function updateProduct()
    {
        $this->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($this->productId);

        if ($this->image) {
            $imagePath = $this->image->store('products', 'public');
            $product->update(['image' => $imagePath]);
        }

        $product->update([
            'category' => $this->category,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        $this->resetForm();
        $this->refreshProducts();
        $this->showModal = false; // Close the modal
        session()->flash('message', 'Product updated successfully!');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        $this->refreshProducts();
        session()->flash('message', 'Product deleted successfully!');
    }

    private function resetForm()
    {
        $this->reset(['image', 'category', 'name', 'description', 'price', 'productId']);
        $this->resetErrorBag(); // Clear validation errors
    }

    public function render()
    {
        return view('livewire.admin-manage-products');
    }
}
