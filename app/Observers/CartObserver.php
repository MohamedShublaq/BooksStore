<?php

namespace App\Observers;

use App\Enums\BookInteractionType;
use App\Models\AddToCart;

class CartObserver
{
    public function creating(AddToCart $addToCart): void
    {
        $addToCart->interaction_type = BookInteractionType::Cart;
    }
}
