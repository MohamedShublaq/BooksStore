<?php

namespace App\Observers;

use App\Enums\BookInteractionType;
use App\Models\AddRate;

class RateObserver
{
    public function created(AddRate $addRate): void
    {
        $addRate->interaction_type = BookInteractionType::Rate;
    }
}
