<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AuthorizationSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(DiscountSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
