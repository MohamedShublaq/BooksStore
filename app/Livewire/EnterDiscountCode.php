<?php

namespace App\Livewire;

use App\Models\Discount;
use Livewire\Component;

class EnterDiscountCode extends Component
{
    public $books;
    public $code = '';
    public $successMessage = '';
    public $warningMessage = '';
    public $errorMessage = '';
    public $appliedDiscounts = [];
    public $foundValidCode = false;
    public $alreadyApplied = false;


    public function applyDiscount()
    {
        foreach ($this->books as $book) {
            if ($book->discountable_type == Discount::class && $this->code == $book->discountable->code) {

                $this->foundValidCode = true;

                if (!isset($this->appliedDiscounts[$book->id])) {
                    // Apply discount
                    $discountAmount = ($book->discountable->percentage * $book->price) / 100;
                    $this->appliedDiscounts[$book->id] = $discountAmount;
                    $this->dispatch('bookPriceAfterDiscount', $book->id, $discountAmount);
                } else {
                    $this->alreadyApplied = true;
                }
            }
        }

        if ($this->foundValidCode) {
            if ($this->alreadyApplied) {
                $this->warningMessage = "This discount was already applied!";
                $this->dispatch('showWarningMessage');
            } else {
                $this->successMessage = "Discount applied successfully!";
                $this->dispatch('showSuccessMessage');
            }
        } else {
            $this->errorMessage = "Invalid discount code!";
            $this->dispatch('showErrorMessage');
        }
        $this->code = '';
    }

    public function render()
    {
        return view('livewire.enter-discount-code');
    }
}
