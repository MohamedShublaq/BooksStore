<?php

namespace App\Livewire;

use App\Models\AddToCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RemoveBookFromCartPage extends Component
{
    public $book;

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
        //For CartCounter Component
        $this->dispatch('cartUpdated');
        //For CheckOutFromCart Component
        $this->dispatch('bookRemoved', $this->book->id);
    }

    public function render()
    {
        return view('livewire.remove-book-from-cart-page');
    }
}
