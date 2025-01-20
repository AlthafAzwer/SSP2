<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;

class ManageProducts extends Component
{
    use WithFileUploads;

    public $image, $category, $name, $description, $price;

    public function render()
    {
        return view('livewire.manage-products', [
            'products' => Product::all(),
        ]);
    }

    public function addProduct()
    {
        $this->validate([
            'image' => 'required|image|max:1024',
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

        session()->flash('success', 'Product added successfully!');
        $this->reset(['image', 'category', 'name', 'description', 'price']);
    }
}
