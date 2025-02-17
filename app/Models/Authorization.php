<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Authorization extends Model
{
    use HasTranslations;
    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'role',
        'permissions'
    ];


    public $translatable = ['role'];


    protected $casts = ['role' => 'array'];


    public function getpermissionsAttribute($permissions){
        return json_decode($permissions);
    }

    public function admins(){
        return $this->hasMany(Admin::class , 'role_id');
    }
}
