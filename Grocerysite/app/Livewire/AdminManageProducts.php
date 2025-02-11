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
    public $showModal = false; 
    public $isEditMode = false; 
    public $searchTerm = ''; 

    public function mount()
    {
        $this->refreshProducts();
    }

    public function refreshProducts()
    {
        $query = Product::query();

        
        if (!empty($this->searchTerm)) {
            $query->where('name', 'like', '%' . $this->searchTerm . '%');
        }

        $this->products = $query->get();
    }

    public function updatedSearchTerm()
    {
        $this->refreshProducts();
    }

    public function toggleModal()
    {
        $this->resetForm();
        $this->isEditMode = false;
        $this->showModal = !$this->showModal;
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);

        
        $this->productId = $product->id;
        $this->category = $product->category;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;

        $this->isEditMode = true;
        $this->showModal = true;
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
        $this->showModal = false;
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
        $this->showModal = false;
        session()->flash('message', 'Product updated successfully!');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        $this->refreshProducts();
        session()->flash('message', 'Product deleted successfully!');
    }

    public function toggleProductAvailability($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['is_active' => !$product->is_active]);

        $this->refreshProducts();
        session()->flash('message', 'Product availability status updated successfully!');
    }

    private function resetForm()
    {
        $this->reset(['image', 'category', 'name', 'description', 'price', 'productId']);
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.admin-manage-products');
    }
}
