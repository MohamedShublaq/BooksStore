<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use EloquentFilter\Filterable;

class ShippingArea extends Model
{
    use HasFactory, HasTranslations, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name',
        'fee'
    ];


    public $translatable = ['name'];


    protected $casts = ['name' => 'array'];
}
