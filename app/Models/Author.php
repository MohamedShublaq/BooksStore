<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use EloquentFilter\Filterable;

class Author extends Model
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

    public function books(){
        return $this->belongsToMany(Book::class, 'author_books');
    }

    public function authorBooks()
    {
        return $this->hasMany(AuthorBook::class);
    }
}
