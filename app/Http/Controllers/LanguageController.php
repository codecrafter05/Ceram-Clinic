<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLanguage(Request $request)
    {
        $language = $request->input('language', 'en');
        
        // حفظ اللغة في الجلسة
        Session::put('locale', $language);
        
        return response()->json([
            'success' => true,
            'language' => $language,
            'direction' => $language === 'ar' ? 'rtl' : 'ltr'
        ]);
    }
    
    public function getCurrentLanguage()
    {
        $language = Session::get('locale', 'en');
        
        return response()->json([
            'language' => $language,
            'direction' => $language === 'ar' ? 'rtl' : 'ltr'
        ]);
    }
}
