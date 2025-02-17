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
        $this->totalPrice = $this->book->price;
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
