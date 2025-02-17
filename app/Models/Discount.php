<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use EloquentFilter\Filterable;

class Discount extends Model
{
    use HasFactory, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'code',
        'quantity',
        'percentage',
        'expiry_date',
        'is_active'
    ];

    public function books()
    {
        return $this->morphMany(Book::class, 'discountable');
    }
}
