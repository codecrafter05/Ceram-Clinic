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
        $setting = \App\Models\Setting::firstOrCreate([]);
        $customPage = null; // لا يوجد صفحة محددة في القائمة
        return view('custom', compact('customPages', 'customPage', 'setting'));   // استخدم بليد خاص بالقائمة
    }

    // صفحة صفحة واحدة بالـ slug: ترجع Model واحد
    public function show(string $slug)
    {
        $customPage = CustomPage::where('slug', $slug)->firstOrFail();    // Model
        $setting = \App\Models\Setting::firstOrCreate([]);
        
        // التأكد من أن $customPage هو Model وليس Collection
        if (!$customPage instanceof CustomPage) {
            abort(404);
        }
        
        // التأكد من أن $customPage ليس null
        if (!$customPage) {
            abort(404);
        }
        
        return view('custom', compact('customPage', 'setting'));          // بليد صفحة واحدة
    }
}