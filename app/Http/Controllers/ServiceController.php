<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // صفحة كل الخدمات
    public function index()
    {
        $setting = \App\Models\Setting::firstOrCreate([]);
        $locale = session('locale', 'en');
        
        return view('service', compact('setting', 'locale'));
    }

    // صفحة تفاصيل خدمة معينة
    public function single()
    {
        $setting = \App\Models\Setting::firstOrCreate([]);
        $locale = session('locale', 'en');
        
        return view('service-single', compact('setting', 'locale'));
    }
}
