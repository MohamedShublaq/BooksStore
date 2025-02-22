<?php

namespace App\Livewire;

use Livewire\Component;

class CheckOutFromCart extends Component
{
    public $books;
    public $subTotal;
    public $bookPrices = [];

    protected $listeners =
    [
        'totalUpdated' => 'updateTotal',
        'bookRemoved' => 'removeBook'
    ];

    public function mount()
    {
        foreach ($this->books as $book) {
            if ($book->discountable_type == 'App\Models\FlashSale') {
                $discountAmount = ($book->price * $book->discountable->percentage) / 100;
                $price = $book->price - $discountAmount;
                $this->bookPrices[$book->id] = $price;
            }
            else {
                $this->bookPrices[$book->id] = $book->price;
            }
        }
        $this->subTotal = array_sum($this->bookPrices);
    }

    public function updateTotal($bookId, $newTotalPrice)
    {
        $this->bookPrices[$bookId] = $newTotalPrice;
        $this->subTotal = array_sum($this->bookPrices);
    }

    public function removeBook($bookId)
    {
        unset($this->bookPrices[$bookId]);
        $this->subTotal = array_sum($this->bookPrices);
        $this->books = $this->books->reject(fn ($book) => $book->id === $bookId);
    }

    public function render()
    {
        return view('livewire.check-out-from-cart');
    }
}
