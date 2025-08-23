<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $setting = \App\Models\Setting::firstOrCreate([]);
        $locale = session('locale', 'en');
        
        return view('about', compact('setting', 'locale'));
    }
}
