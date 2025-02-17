<?php

namespace App\Livewire;

use Livewire\Component;

class BookPrice extends Component
{
    public $book;
    public $discountedPrice = null;
    protected $listeners =['bookPriceAfterDiscount' => 'bookPriceAfterDiscount'];

    public function bookPriceAfterDiscount($bookId, $discountAmount)
    {
        if ($this->book->id == $bookId) {
            $this->discountedPrice = $this->book->price - $discountAmount;
            $this->dispatch('effectOnQuantityLogic', $this->book->id, $this->discountedPrice);
        }
    }

    public function render()
    {
        return view('livewire.book-price');
    }
}
