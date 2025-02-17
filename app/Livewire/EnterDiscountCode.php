<?php

namespace App\Livewire;

use App\Models\Discount;
use Livewire\Component;

class EnterDiscountCode extends Component
{
    public $books;
    public $code = '';
    public $appliedDiscounts = [];

    public function applyDiscount()
    {
        foreach ($this->books as $book) {
            if ($book->discountable_type == Discount::class) {
                if ($this->code == $book->discountable->code) {
                    if (!isset($this->appliedDiscounts[$book->id])) {
                        $discountAmount = ($book->discountable->percentage * $book->price) / 100;
                        $this->appliedDiscounts[$book->id] = $discountAmount;
                        $this->dispatch('bookPriceAfterDiscount', $book->id, $discountAmount);
                    }
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.enter-discount-code');
    }
}
