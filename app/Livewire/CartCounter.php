<?php

namespace App\Livewire;

use App\Models\AddToCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCounter extends Component
{
    public $cartCount = 0;

    protected $listeners = ['cartUpdated' => 'updateCartCount'];

    public function mount()
    {
        if (Auth::check()) {
            $this->cartCount = AddToCart::where('user_id', Auth::id())->count();
        } else {
            $this->cartCount = count(session()->get('cart', []));
        }
    }

    public function updateCartCount()
    {
        if (Auth::check()) {
            $this->cartCount = AddToCart::where('user_id', Auth::id())->count();
        } else {
            $this->cartCount = count(session()->get('cart', []));
        }
    }

    public function render()
    {
        return view('livewire.cart-counter');
    }
}
