<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $setting = \App\Models\Setting::firstOrCreate([]);
        $locale = session('locale', 'en');
        
        return view('gallery', compact('setting', 'locale'));
    }
}
