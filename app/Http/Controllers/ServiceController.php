<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // صفحة كل الخدمات
    public function index()
    {
        return view('service');
    }

    // صفحة تفاصيل خدمة معينة
    public function single()
    {
        return view('service-single');
    }
}
