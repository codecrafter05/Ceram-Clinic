<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Setting;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        $setting = Setting::firstOrCreate([]);
        $locale = session('locale', 'en');

        return view('gallery', compact('setting', 'locale', 'galleries'));
    }
}
