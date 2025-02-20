<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            ['name' => ['en' => 'English', 'ar' => 'الإنجليزية']],
            ['name' => ['en' => 'Arabic', 'ar' => 'العربية']],
            ['name' => ['en' => 'French', 'ar' => 'الفرنسية']],
            ['name' => ['en' => 'Spanish', 'ar' => 'الإسبانية']],
            ['name' => ['en' => 'German', 'ar' => 'الألمانية']],
            ['name' => ['en' => 'Russian', 'ar' => 'الروسية']],
            ['name' => ['en' => 'Chinese', 'ar' => 'الصينية']],
            ['name' => ['en' => 'Hindi', 'ar' => 'الهندية']],
            ['name' => ['en' => 'Portuguese', 'ar' => 'البرتغالية']],
            ['name' => ['en' => 'Italian', 'ar' => 'الإيطالية']],
            ['name' => ['en' => 'Japanese', 'ar' => 'اليابانية']],
            ['name' => ['en' => 'Turkish', 'ar' => 'التركية']],
        ];

        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
