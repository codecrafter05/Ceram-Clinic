<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\FAQCategory;

class FAQPageController extends Controller
{
    public function index()
    {
        $setting = Setting::firstOrCreate([]);
        $locale  = session('locale', 'en');

        // الكاتيجري مع الأسئلة الفعّالة مرتبة
        $categories = FAQCategory::with(['faqs' => function($q){
                $q->active()->orderBy('sort_order')->orderBy('id');
            }])
            ->orderBy('sort_order')->orderBy('id')
            ->get();

        return view('faqs', compact('setting','locale','categories'));
    }
}
