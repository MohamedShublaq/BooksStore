<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use EloquentFilter\Filterable;

class Category extends Model
{
    use HasFactory, HasTranslations, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name',
        'discount_id'
    ];


    public $translatable = ['name'];


    protected $casts = ['name' => 'array'];


    public function discount(){
        return $this->belongsTo(Discount::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
