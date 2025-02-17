<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => [
                'en' => 'Super Admin',
                'ar' => 'المدير',
            ],
            'email' => 'admin@1.com',
            'password' => 'password',
            'role_id' => '1',
        ]);
    }
}
