<?php

namespace App\Livewire;

use Livewire\Component;

class CheckOutFromWishlist extends Component
{
    public $books;
    public $totalPrice;
    public $bookPrices = [];

    protected $listeners =
    [
        'totalUpdated' => 'updateTotal',
        'bookRemoved' => 'removeBook'
    ];

    public function mount()
    {
        foreach ($this->books as $book) {
            $this->bookPrices[$book->id] = $book->price;
        }

        $this->totalPrice = array_sum($this->bookPrices);
    }

    public function updateTotal($bookId, $newTotalPrice)
    {
        $this->bookPrices[$bookId] = $newTotalPrice;
        $this->totalPrice = array_sum($this->bookPrices);
    }

    public function removeBook($bookId)
    {
        unset($this->bookPrices[$bookId]);
        $this->totalPrice = array_sum($this->bookPrices);
        $this->books = $this->books->reject(fn ($book) => $book->id === $bookId);
    }

    public function render()
    {
        return view('livewire.check-out-from-wishlist');
    }
}
