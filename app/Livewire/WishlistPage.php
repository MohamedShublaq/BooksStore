<?php

namespace App\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistPage extends Component
{
    public $books;

    protected $listeners = ['wishListUpdated' => 'updateWishlistPage'];

    public function updateWishlistPage()
    {
        if (Auth::check()) {
            $this->books = Book::with('author')->whereHas('favorites', function ($q) {
                $q->where('user_id', Auth::id());
            })->get();
        } else {
            $booksIds = session()->get('wishlist', []);
            $this->books = Book::with('author')->whereIn('id', $booksIds)->get();
        }
    }

    public function render()
    {
        return view('livewire.wishlist-page');
    }
}
