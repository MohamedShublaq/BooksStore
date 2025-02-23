<?php

namespace App\Livewire;

use App\Models\AddToCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToCartFromFlashSaleSection extends Component
{
    public $book;
    public $isInCart = false;

    public function mount($book)
    {
        $this->book = $book;

        if (Auth::check()) {
            $this->isInCart = AddToCart::where('user_id', Auth::id())->where('book_id', $book->id)->exists();
        } else {
            $cart = session()->get('cart', []);

            $this->isInCart = in_array($book->id, $cart);
        }
    }

    public function addToCart()
    {
        if (Auth::check()) {
            AddToCart::create([
                'user_id' => Auth::id(),
                'book_id' => $this->book->id,
            ]);
        } else {
            $cart = session()->get('cart', []);
            if (!in_array($this->book->id, $cart)) {
                $cart[] = $this->book->id;
                session()->put('cart', $cart);
            }
        }

        $this->isInCart = true;
        $this->dispatch('cartUpdated');
    }

    public function removeFromCart()
    {
        if (Auth::check()) {
            AddToCart::where('user_id', Auth::id())->where('book_id', $this->book->id)->delete();
        } else {
            $cart = session()->get('cart', []);
            if (($key = array_search($this->book->id, $cart)) !== false) {
                unset($cart[$key]);
                session()->put('cart', array_values($cart));
            }
        }

        $this->isInCart = false;
        $this->dispatch('cartUpdated');
    }
    public function render()
    {
        return view('livewire.add-to-cart-from-flash-sale-section');
    }
}
