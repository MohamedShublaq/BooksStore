<?php

namespace App\Livewire;

use App\Models\AddToFavorite;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RemoveBookFromWishlistPage extends Component
{
    public $book;

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
        //For WishListCounter Component
        $this->dispatch('wishListUpdated');
        //For CheckOutFromWishlist Component
        $this->dispatch('bookRemoved', $this->book->id);
    }

    public function render()
    {
        return view('livewire.remove-book-from-wishlist-page');
    }
}
