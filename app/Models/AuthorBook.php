<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'book_id',
        'author_id'
    ];

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
}