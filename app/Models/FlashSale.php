<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use EloquentFilter\Filterable;

class FlashSale extends Model
{
    use HasFactory, HasTranslations, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name',
        'description',
        'date',
        'time',
        'percentage',
        'is_active'
    ];


    public $translatable = ['name','description'];


    protected $casts = ['name' => 'array' , 'description' => 'array'];

    public function books()
    {
        return $this->morphMany(Book::class, 'discountable');
    }
}
