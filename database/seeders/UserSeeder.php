<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Mohamed',
            'last_name' => 'Shublaq',
            'email' => 'user@one.com',
            'phone' => '01080141695',
            'password' => Hash::make('password')
        ]);
    }
}
