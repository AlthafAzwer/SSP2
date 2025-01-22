<?php

namespace App\Livewire;

use Livewire\Component;

class CartPage extends Component
{
    public $cart = [];
    public $total = 0;

    public function mount()
    {
        // Load the cart from the session or set it as empty
        $this->cart = session()->get('cart', []);
        $this->updateTotal();
    }

    public function updateTotal()
    {
        $this->total = 0;
        foreach ($this->cart as $productId => $quantity) {
            $product = \App\Models\Product::find($productId);
            if ($product) {
                $this->total += $product->price * $quantity;
            }
        }
    }

    public function increaseQuantity($productId)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]++;
            session()->put('cart', $this->cart);
            $this->updateTotal();
        }
    }

    public function decreaseQuantity($productId)
    {
        if (isset($this->cart[$productId]) && $this->cart[$productId] > 1) {
            $this->cart[$productId]--;
            session()->put('cart', $this->cart);
            $this->updateTotal();
        }
    }

    public function removeItem($productId)
    {
        if (isset($this->cart[$productId])) {
            unset($this->cart[$productId]);
            session()->put('cart', $this->cart);
            $this->updateTotal();
        }
    }

    public function render()
    {
        $products = \App\Models\Product::whereIn('id', array_keys($this->cart))->get();

        return view('livewire.cart-page', compact('products'));
    }
}
