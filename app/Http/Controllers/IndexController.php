<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\WhyChoose;
use App\Models\Service; 
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $setting = Setting::firstOrCreate([]);
        $locale  = session('locale', 'en');

        $whyLeft  = WhyChoose::where('position', 'left')->orderBy('sort_order')->get();
        $whyRight = WhyChoose::where('position', 'right')->orderBy('sort_order')->get();

        $services = Service::latest('id')->take(4)->get();

        return view('index', compact(
            'setting',
            'locale',
            'whyLeft',
            'whyRight',
            'services'
        ));
    }
}
