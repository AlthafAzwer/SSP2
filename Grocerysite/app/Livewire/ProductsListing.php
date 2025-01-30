<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductsListing extends Component
{
    public $products = [];
    public $selectedCategory;
    public $searchTerm = '';
    public $cart = [];

    /**
     * Runs when the component is first mounted (page load).
     */
    public function mount()
    {
        // Capture category from the URL, default to 'all'
        $this->selectedCategory = request()->query('category', 'all');

        $this->refreshProducts();

        // Load cart from session if exists
        $this->cart = session()->get('cart', []);
    }

    /**
     * Fetch products from DB with optional filters.
     */
    public function refreshProducts()
    {
        $query = Product::query();

        // Apply category filter if it's not 'all'
        if ($this->selectedCategory !== 'all') {
            $query->where('category', $this->selectedCategory);
        }

        // Apply search filter
        if (!empty($this->searchTerm)) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
            });
        }

        $this->products = $query->get();
    }

    /**
     * If $selectedCategory changes, re-fetch products.
     */
    public function updatedSelectedCategory()
    {
        $this->refreshProducts();
    }

    /**
     * If $searchTerm changes, re-fetch products.
     */
    public function updatedSearchTerm()
    {
        $this->refreshProducts();
    }

    /**
     * Enforce user login before changing the cart.
     */
    private function ensureIsLoggedIn()
    {
        if (!\Illuminate\Support\Facades\Auth::check()) {
            return redirect()->route('register');
        }
    }

    /**
     * Add product to cart or increment if it exists.
     */
    public function addToCart($productId)
    {
        if ($response = $this->ensureIsLoggedIn()) {
            return $response;
        }

        if (!isset($this->cart[$productId])) {
            $this->cart[$productId] = 0;
        }

        $this->cart[$productId]++;
        session()->put('cart', $this->cart);

        $this->dispatch('cartUpdated', $this->getCartCountProperty());
    }

    /**
     * Increase quantity by 1
     */
    public function increaseQuantity($productId)
    {
        if ($response = $this->ensureIsLoggedIn()) {
            return $response;
        }

        if (isset($this->cart[$productId])) {
            $this->cart[$productId]++;
            session()->put('cart', $this->cart);
            $this->dispatch('cartUpdated', $this->getCartCountProperty());
        }
    }

    /**
     * Decrease quantity but never below 1
     */
    public function decreaseQuantity($productId)
    {
        if ($response = $this->ensureIsLoggedIn()) {
            return $response;
        }

        if (isset($this->cart[$productId]) && $this->cart[$productId] > 1) {
            $this->cart[$productId]--;
            session()->put('cart', $this->cart);
            $this->dispatch('cartUpdated', $this->getCartCountProperty());
        }
    }

    /**
     * Remove the product from the cart entirely.
     */
    public function removeFromCart($productId)
    {
        if ($response = $this->ensureIsLoggedIn()) {
            return $response;
        }

        if (isset($this->cart[$productId])) {
            unset($this->cart[$productId]);
            session()->put('cart', $this->cart);
        }

        $this->dispatch('cartUpdated', $this->getCartCountProperty());
    }

    /**
     * Get the total number of items in the cart.
     */
    public function getCartCountProperty()
    {
        return array_sum($this->cart);
    }

    public function render()
    {
        return view('livewire.products-listing');
    }
}
