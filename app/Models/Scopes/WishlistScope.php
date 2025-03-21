<?php

namespace App\Models\Scopes;

use App\Enums\BookInteractionType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class WishlistScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('interaction_type', BookInteractionType::Wishlist);
    }
}
