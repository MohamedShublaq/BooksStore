<?php

namespace App\Observers;

use App\Enums\BookInteractionType;
use App\Models\AddToFavorite;

class WishlistObserver
{
    public function creating(AddToFavorite $addToFavorite): void
    {
        $addToFavorite->interaction_type = BookInteractionType::Wishlist;
    }
}
