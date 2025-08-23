<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $setting = \App\Models\Setting::firstOrCreate([]);
        $locale = session('locale', 'en');
        
        return view('team', compact('setting', 'locale'));
    }
}
