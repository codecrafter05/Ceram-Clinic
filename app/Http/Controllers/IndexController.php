<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\WhyChoose;
use App\Models\Service;
use App\Models\Team; 
use Illuminate\Http\Request;
use App\Models\About;

class IndexController extends Controller
{
    public function index()
    {
        $about = About::first();
        $setting = Setting::firstOrCreate([]);
        $locale  = session('locale', 'en');

        $whyLeft  = WhyChoose::where('position', 'left')->orderBy('sort_order')->get();
        $whyRight = WhyChoose::where('position', 'right')->orderBy('sort_order')->get();

        $services = Service::latest('id')->take(4)->get();

        $teamHome = Team::orderBy('sort_order')->orderBy('id')->take(4)->get();

        return view('index', compact(
            'setting',
            'locale',
            'whyLeft',
            'whyRight',
            'services',
            'teamHome',
            'about',
        ));

    }
}
