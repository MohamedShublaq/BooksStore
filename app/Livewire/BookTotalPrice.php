<?php

namespace App\Livewire;

use Livewire\Component;

class BookTotalPrice extends Component
{
    public $book;
    public $totalPrice;
    protected $listeners = ['totalUpdated' => 'updateTotal'];

    public function mount()
    {
        if ($this->book->discountable_type == 'App\Models\FlashSale') {
            $discountAmount = ($this->book->price * $this->book->discountable->percentage) / 100;
            $this->totalPrice = $this->book->price - $discountAmount;
        }
        else {
            $this->totalPrice = $this->book->price;
        }
    }

    public function updateTotal($bookId, $newTotalPrice)
    {
        if ($this->book->id === $bookId) {
            $this->totalPrice = $newTotalPrice;
        }
    }

    public function render()
    {
        return view('livewire.book-total-price');
    }
}
