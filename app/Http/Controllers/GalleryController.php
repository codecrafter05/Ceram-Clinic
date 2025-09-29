<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\GalleryCategory;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('category')->get();
        $setting = Setting::firstOrCreate([]);
        $locale = session('locale', 'en');

        // Gallery categories
        $categories = GalleryCategory::orderBy('sort_order')->orderBy('id')->get();

        return view('gallery', compact('setting', 'locale', 'galleries', 'categories'));
    }
}
