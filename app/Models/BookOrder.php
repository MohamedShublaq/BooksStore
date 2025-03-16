<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookOrder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'book_id',
        'order_id',
        'original_price',
        'price_after_discount',
        'applied_discount',
        'quantity'
    ];

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
