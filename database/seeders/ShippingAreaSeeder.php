<?php

namespace Database\Seeders;

use App\Models\ShippingArea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shippingAreas = [
            ['en' => 'Cairo', 'ar' => 'القاهرة'],
            ['en' => 'Giza', 'ar' => 'الجيزة'],
            ['en' => 'Alexandria', 'ar' => 'الإسكندرية'],
            ['en' => 'Dakahlia', 'ar' => 'الدقهلية'],
            ['en' => 'Red Sea', 'ar' => 'البحر الأحمر'],
            ['en' => 'Beheira', 'ar' => 'البحيرة'],
            ['en' => 'Fayoum', 'ar' => 'الفيوم'],
            ['en' => 'Gharbia', 'ar' => 'الغربية'],
            ['en' => 'Ismailia', 'ar' => 'الإسماعيلية'],
            ['en' => 'Menoufia', 'ar' => 'المنوفية'],
            ['en' => 'Minya', 'ar' => 'المنيا'],
            ['en' => 'Qalyubia', 'ar' => 'القليوبية'],
            ['en' => 'New Valley', 'ar' => 'الوادي الجديد'],
            ['en' => 'Suez', 'ar' => 'السويس'],
            ['en' => 'Aswan', 'ar' => 'أسوان'],
            ['en' => 'Assiut', 'ar' => 'أسيوط'],
            ['en' => 'Beni Suef', 'ar' => 'بني سويف'],
            ['en' => 'Port Said', 'ar' => 'بورسعيد'],
            ['en' => 'Damietta', 'ar' => 'دمياط'],
            ['en' => 'Sharkia', 'ar' => 'الشرقية'],
            ['en' => 'South Sinai', 'ar' => 'جنوب سيناء'],
            ['en' => 'Kafr El Sheikh', 'ar' => 'كفر الشيخ'],
            ['en' => 'Matrouh', 'ar' => 'مطروح'],
            ['en' => 'Luxor', 'ar' => 'الأقصر'],
            ['en' => 'Qena', 'ar' => 'قنا'],
            ['en' => 'North Sinai', 'ar' => 'شمال سيناء'],
            ['en' => 'Sohag', 'ar' => 'سوهاج'],
        ];

        foreach ($shippingAreas as $area) {
            ShippingArea::create([
                'name' => $area,
                'fee' => rand(50, 200)
            ]);
        }
    }
}
