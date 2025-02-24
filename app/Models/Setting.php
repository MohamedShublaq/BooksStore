<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'email',
        'phone',
        'address',
        'tax_percentage',
        'facebook',
        'instagram',
        'youtube',
        'x'
    ];
}
