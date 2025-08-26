<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\About;

class IndexController extends Controller
{
    public function index()
    {
        $about = About::first();
        $setting = Setting::firstOrCreate([]);
        $locale = session('locale', 'en');

        return view('index', compact('setting', 'locale', 'about'));
    }
}
