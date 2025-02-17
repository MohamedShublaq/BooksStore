<?php

namespace App\Models;

use App\Enums\AdminType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    public $translatable = ['name'];

    protected $casts = [
        'name' => 'array'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function authorization(){
        return $this->belongsTo(Authorization::class , 'role_id');
    }

    public function hasAccess($config_permission){
        $authorization = $this->authorization;
        foreach($authorization->permissions as $permission){
            if($config_permission == $permission ?? false){
                return true;
            }
        }
    }
}
