<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomPage;

class CustomPageController extends Controller
{
    // صفحة قائمة الصفحات (اختياري): ترجع مجموعة
    public function index()
    {
        $customPages = CustomPage::orderBy('page_name_en')->paginate(12); // Collection
        return view('custom', compact('customPages'));              // استخدم بليد خاص بالقائمة
    }

    // صفحة صفحة واحدة بالـ slug: ترجع Model واحد
    public function show(string $slug)
    {
        $customPage = CustomPage::where('slug', $slug)->firstOrFail();    // Model
        return view('custom', compact('customPage'));                     // بليد صفحة واحدة
    }
}