<?php

namespace App\Models;

use App\Models\Scopes\CartScope;
use App\Observers\CartObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([CartScope::class])]
#[ObservedBy([CartObserver::class])]
class AddToCart extends Model
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
