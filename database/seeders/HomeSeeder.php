<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Home;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Home::create([
            'hero_title_en' => 'Welcome to <span>Ceram Clinic</span> for Excellent Dental Care',
            'hero_title_ar' => 'مرحباً بكم في <span>عيادة سيرام</span> للاسنان الرائعة',
            'hero_description_en' => 'Ceram Clinic is your ideal destination for dental care. We provide the best medical services with the latest technologies and highest quality standards.',
            'hero_description_ar' => 'عيادة سيرام هي وجهتك المثالية للعناية بصحة أسنانك. نقدم أفضل الخدمات الطبية بأحدث التقنيات وأعلى معايير الجودة.',
            'video_title_en' => 'visit clinic',
            'video_title_ar' => 'زيارة العيادة',
            'video_subtitle_en' => 'Comprehensive Dental Care For All Ages',
            'video_subtitle_ar' => 'رعاية شاملة للأسنان لجميع الأعمار',
            'video_url' => 'https://www.youtube.com/watch?v=Y-x0efG1seA',
        ]);
    }
}
