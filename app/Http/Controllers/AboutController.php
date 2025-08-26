<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Setting;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        $setting = Setting::firstOrCreate([]);
        $locale = session('locale', 'en');

        return view('about', compact('about', 'setting', 'locale'));
    }
}
