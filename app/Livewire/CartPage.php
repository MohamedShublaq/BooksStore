<?php

namespace App\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartPage extends Component
{
    public $books;

    protected $listeners = ['cartUpdated' => 'updateCartPage'];

    public function updateCartPage()
    {
        if (Auth::check()) {
            $this->books = Book::with('author')->whereHas('carts', function ($q) {
                $q->where('user_id', Auth::id());
            })->get();
        } else {
            $booksIds = session()->get('cart', []);
            $this->books = Book::with('author')->whereIn('id', $booksIds)->get();
        }
    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}
