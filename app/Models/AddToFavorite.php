<?php

namespace App\Models;

use App\Models\Scopes\WishlistScope;
use App\Observers\WishlistObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([WishlistScope::class])]
#[ObservedBy([WishlistObserver::class])]
class AddToFavorite extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'book_id',
        'user_id',
        'interaction_type'
    ];

    protected $table = 'book_interactions';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
