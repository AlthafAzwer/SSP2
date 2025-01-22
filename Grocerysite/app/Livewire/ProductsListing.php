<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductsListing extends Component
{
    public $products = [];

    // Category filter
    public $selectedCategory = 'all';

    // Search term
    public $searchTerm = '';

    // The cart stored in memory: [ productId => quantity ]
    public $cart = [];

    /**
     * Runs when the component is first mounted (page load).
     */
    public function mount()
    {
        $this->refreshProducts();

        // Load cart from the session if it exists,
        // otherwise default to empty array.
        $storedCart = session()->get('cart', []);
        $this->cart = $storedCart;
    }

    /**
     * Helper to store the cart in session.
     */
    private function storeCartInSession()
    {
        session()->put('cart', $this->cart);
    }

    /**
     * A computed property to get the total number
     * of items in the cart. Livewire 3 allows calling it
     * with $this->cartCount or in the Blade as {{ $this->cartCount }}.
     */
    public function getCartCountProperty()
    {
        return array_sum($this->cart);
    }

    /**
     * Fetch products from DB with optional filters.
     */
    public function refreshProducts()
    {
        $query = Product::query();

        if ($this->selectedCategory !== 'all') {
            $query->where('category', $this->selectedCategory);
        }

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
            // In Livewire 3, use redirect()->to(...)
            // Or return redirect()->route('login');
            return redirect()->route('register');
        }
    }

    /**
     * Add product to cart or increment if it exists.
     * Then store cart in session and dispatch 'cartUpdated'.
     */
    public function addToCart($productId)
    {
        // Check auth
        if ($response = $this->ensureIsLoggedIn()) {
            return $response; // redirect to login
        }

        if (!isset($this->cart[$productId])) {
            $this->cart[$productId] = 0;
        }

        $this->cart[$productId]++;
        $this->storeCartInSession();

        // Livewire 3 uses dispatch instead of emit
        $this->dispatch('cartUpdated', $this->getCartCountProperty());
    }

    /**
     * Increase quantity by 1
     */
    public function increaseQuantity($productId)
    {
        // Check auth
        if ($response = $this->ensureIsLoggedIn()) {
            return $response; // redirect to login
        }

        if (isset($this->cart[$productId])) {
            $this->cart[$productId]++;
            $this->storeCartInSession();
            $this->dispatch('cartUpdated', $this->getCartCountProperty());
        }
    }

    /**
     * Decrease quantity but never below 1
     */
    public function decreaseQuantity($productId)
    {
        // Check auth
        if ($response = $this->ensureIsLoggedIn()) {
            return $response; // redirect to login
        }

        if (isset($this->cart[$productId]) && $this->cart[$productId] > 1) {
            $this->cart[$productId]--;
            $this->storeCartInSession();
            $this->dispatch('cartUpdated', $this->getCartCountProperty());
        }
    }

    /**
     * Remove the product from the cart entirely,
     * reverting it back to "Add" in the UI.
     */
    public function removeFromCart($productId)
    {
        // Check auth
        if ($response = $this->ensureIsLoggedIn()) {
            return $response; // redirect to login
        }

        if (isset($this->cart[$productId])) {
            unset($this->cart[$productId]);
            $this->storeCartInSession();
        }

        $this->dispatch('cartUpdated', $this->getCartCountProperty());
    }

    public function render()
    {
        return view('livewire.products-listing');
    }
}
