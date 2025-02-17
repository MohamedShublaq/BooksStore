<?php

namespace App\Livewire;

use App\Models\AddToCart;
use App\Models\AddToFavorite;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MoveBooksFromWishlistToCart extends Component
{
    public $books;

    public function moveToCart()
    {
        if (Auth::check()) {
            foreach($this->books as $book) {
                AddToFavorite::where('user_id', Auth::id())->where('book_id', $book->id)->delete();
                $isBookExistsInCart = AddToCart::where('user_id', Auth::id())->where('book_id', $book->id)->exists();
                if(!$isBookExistsInCart) {
                    AddToCart::create([
                        'user_id' => Auth::id(),
                        'book_id' => $book->id,
                    ]);
                }
            }
        } else {
            foreach($this->books as $book) {
                $wishlist = session()->get('wishlist', []);
                if (($key = array_search($book->id, $wishlist)) !== false) {
                    unset($wishlist[$key]);
                    session()->put('wishlist', array_values($wishlist));
                }
                $cart = session()->get('cart', []);
                if (!in_array($book->id, $cart)) {
                    $cart[] = $book->id;
                    Session()->put('cart', $cart);
                }
            }
        }
        $this->dispatch('wishListUpdated');
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.move-books-from-wishlist-to-cart');
    }
}
