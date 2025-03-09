<?php

namespace App\Livewire;

use Livewire\Component;

class BookQuantity extends Component
{
    public int $quantity = 1;
    public $book;
    public $discountedPrice = null;
    protected $listeners = ['effectOnQuantityLogic' => 'applyDiscount'];

    public function applyDiscount($bookId, $discountedPrice)
    {
        if ($this->book->id == $bookId) {
            $this->discountedPrice = $discountedPrice;
            $this->updateTotal();
        }
    }

    public function increment()
    {
        $this->quantity++;
        $this->updateTotal();
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->updateTotal();
        }
    }

    public function updateTotal()
    {
        if ($this->discountedPrice !== null) {
            $price = $this->discountedPrice;
        } elseif ($this->book->discountable_type == 'App\Models\FlashSale' && \Carbon\Carbon::now() >= $this->book->discountable->date) {
            $discountAmount = ($this->book->price * $this->book->discountable->percentage) / 100;
            $price = $this->book->price - $discountAmount;
        }
          else {
            $price = $this->book->price;
        }
        $this->dispatch('totalUpdated', $this->book->id, $this->quantity, $price);
    }

    public function render()
    {
        return view('livewire.book-quantity');
    }
}
