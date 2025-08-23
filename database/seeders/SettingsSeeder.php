<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        Setting::firstOrCreate([], [
            // Copyright
            'copyright_en' => 'Copyright © 2024 Ceram Clinic. All Rights Reserved.',
            'copyright_ar' => 'حقوق النشر © 2024 عيادة سيرام. جميع الحقوق محفوظة.',
            
            // Contact Info
            'contact_number' => '+973 1234 5678',
            'contact_email' => 'info@ceramclinic.com',
            'location_text_en' => 'Manama, Bahrain',
            'location_text_ar' => 'المنامة، البحرين',
            'location_url' => 'https://maps.google.com/?q=Manama,Bahrain',
            
            // Social Media
            'social_media' => [
                [
                    'platform' => 'facebook',
                    'url' => 'https://facebook.com/ceramclinic',
                    'icon' => 'fa-facebook-f'
                ],
                [
                    'platform' => 'instagram',
                    'url' => 'https://instagram.com/ceramclinic',
                    'icon' => 'fa-instagram'
                ],
                [
                    'platform' => 'twitter',
                    'url' => 'https://twitter.com/ceramclinic',
                    'icon' => 'fa-twitter'
                ],
                [
                    'platform' => 'youtube',
                    'url' => 'https://youtube.com/ceramclinic',
                    'icon' => 'fa-youtube'
                ]
            ],
        ]);
    }
}
