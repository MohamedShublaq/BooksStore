<?php

namespace Database\Seeders;

use App\Models\Authorization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [];
        foreach(config('authorizations.Permissions') as $permission=>$value ){
            $permissions[] = $permission;
        }
        Authorization::create([
            'role'=>[
                'ar'=>'مدير',
                'en'=>'Manger',
            ],
            'permissions' => json_encode($permissions),
        ]);
    }
}
