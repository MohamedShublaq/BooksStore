<?php

namespace App\Livewire;

use Livewire\Component;

class BookPrice extends Component
{
    public $book;
    public $discountedPrice = null;
    public $flashSalePrice = null;
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
        if ($this->book->discountable_type == 'App\Models\FlashSale' && \Carbon\Carbon::now() >= $this->book->discountable->date) {
            $discountAmount = ($this->book->price * $this->book->discountable->percentage) / 100;
            $this->flashSalePrice = $this->book->price - $discountAmount;
        }
        return view('livewire.book-price');
    }
}
