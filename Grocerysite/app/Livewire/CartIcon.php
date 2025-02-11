<?php

namespace App\Livewire;

use Livewire\Component;

class CartIcon extends Component
{
    public $cartCount = 0;

    
    protected $listeners = ['cartUpdated' => 'updateCartCount'];

    public function mount()
    {
        
        $storedCart = session()->get('cart', []);
        $this->cartCount = array_sum($storedCart);
    }

    
    public function updateCartCount($newCount)
    {
        $this->cartCount = $newCount;
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
