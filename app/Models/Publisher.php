<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory, HasTranslations, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name'
    ];


    public $translatable = ['name'];


    protected $casts = ['name' => 'array'];


    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
