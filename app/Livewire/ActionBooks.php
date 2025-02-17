<?php

namespace App\Livewire;

use App\Models\AddToCart;
use App\Models\AddToFavorite;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ActionBooks extends Component
{
    public $book;
    public $isInCart = false;
    public $isInWishlist = false;

    public function mount($book)
    {
        $this->book = $book;

        if (Auth::check()) {
            $this->isInCart = AddToCart::where('user_id', Auth::id())->where('book_id', $book->id)->exists();
            $this->isInWishlist = AddToFavorite::where('user_id', Auth::id())->where('book_id', $book->id)->exists();
        } else {
            $cart = session()->get('cart', []);
            $wishlist = session()->get('wishlist', []);

            $this->isInCart = in_array($book->id, $cart);
            $this->isInWishlist = in_array($book->id, $wishlist);
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

    public function addToWishlist()
    {
        if (Auth::check()) {
            AddToFavorite::create([
                'user_id' => Auth::id(),
                'book_id' => $this->book->id,
            ]);
        } else {
            $wishlist = session()->get('wishlist', []);
            if (!in_array($this->book->id, $wishlist)) {
                $wishlist[] = $this->book->id;
                session()->put('wishlist', $wishlist);
            }
        }

        $this->isInWishlist = true;
        $this->dispatch('wishListUpdated');
    }

    public function removeFromWishlist()
    {
        if (Auth::check()) {
            AddToFavorite::where('user_id', Auth::id())->where('book_id', $this->book->id)->delete();
        } else {
            $wishlist = session()->get('wishlist', []);
            if (($key = array_search($this->book->id, $wishlist)) !== false) {
                unset($wishlist[$key]);
                session()->put('wishlist', array_values($wishlist));
            }
        }

        $this->isInWishlist = false;
        $this->dispatch('wishListUpdated');
    }

    public function render()
    {
        return view('livewire.action-books');
    }
}
