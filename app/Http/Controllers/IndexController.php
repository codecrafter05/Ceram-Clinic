<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $setting = Setting::firstOrCreate([]);

        return view('index', compact('setting'));
    }
}
