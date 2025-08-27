<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Team;
use App\Models\SeoSetting;

class TeamController extends Controller
{
    public function index()
    {
        $setting = Setting::firstOrCreate([]);
        $seo = SeoSetting::first();
        $locale  = session('locale', 'en');

        $team = Team::orderBy('sort_order')->orderBy('id')->get();

        return view('team', compact('setting', 'locale', 'team'));
    }
}
