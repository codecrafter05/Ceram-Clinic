<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $setting = Setting::firstOrCreate([]);
        $locale = session('locale', 'en');
        
        return view('contact', compact('setting', 'locale'));
    }
}
