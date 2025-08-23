<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $setting = \App\Models\Setting::firstOrCreate([]);
        $locale = session('locale', 'en');
        
        return view('blog', compact('setting', 'locale'));
    }
}
