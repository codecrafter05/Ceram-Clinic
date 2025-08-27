<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Setting;
use App\Models\SeoSetting;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        $setting = Setting::firstOrCreate([]);
        $seo = SeoSetting::first();
        $locale = session('locale', 'en');

        return view('about', compact('about', 'setting', 'locale', 'seo'));
    }
}
