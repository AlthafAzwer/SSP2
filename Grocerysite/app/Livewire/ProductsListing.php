<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductsListing extends Component
{
    use WithPagination;

    public $selectedCategory;
    public $searchTerm = '';
    public $cart = [];

    protected $paginationTheme = 'tailwind';

    public function mount()
    {
        $this->selectedCategory = request()->query('category', 'all');
        $this->cart = session()->get('cart', []);
    }

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function updatingSelectedCategory()
    {
        $this->resetPage();
    }

    public function refreshProducts()
    {
        $this->resetPage();
    }

    public function getProductsProperty()
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

        return $query->paginate(6);
    }

    private function ensureIsLoggedIn()
    {
        if (!\Illuminate\Support\Facades\Auth::check()) {
            return redirect()->route('register');
        }
    }

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

    public function getCartCountProperty()
    {
        return array_sum($this->cart);
    }

    public function render()
    {
        return view('livewire.products-listing', [
            'products' => $this->products,
        ]);
    }
}
