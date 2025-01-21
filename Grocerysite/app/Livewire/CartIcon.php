<?php

namespace App\Livewire;

use Livewire\Component;

class CartIcon extends Component
{
    public $cartCount = 0;

    // Listen for 'cartUpdated' dispatched from ProductsListing
    protected $listeners = ['cartUpdated' => 'updateCartCount'];

    public function mount()
    {
        // Load from session so it's correct on page load
        $storedCart = session()->get('cart', []);
        $this->cartCount = array_sum($storedCart);
    }

    // Called whenever 'cartUpdated' is dispatched
    public function updateCartCount($newCount)
    {
        $this->cartCount = $newCount;
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
