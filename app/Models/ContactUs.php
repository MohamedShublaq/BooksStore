<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class ContactUs extends Model
{
    use HasFactory, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name',
        'email',
        'message'
    ];
}
