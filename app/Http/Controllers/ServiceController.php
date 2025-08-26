<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\WhyChoose;

class ServiceController extends Controller
{
    // صفحة كل الخدمات
    public function index()
    {
        $setting  = Setting::firstOrCreate([]);
        $locale   = session('locale', 'en');
        $whyLeft  = WhyChoose::where('position', 'left')->orderBy('sort_order')->get();
        $whyRight = WhyChoose::where('position', 'right')->orderBy('sort_order')->get();
        
        // اجلب كل الخدمات (تقدر تبدّل إلى paginate لو حبيت)
        $services = Service::query()
            ->latest('id')
            ->get();

        return view('service', compact('setting', 'locale', 'services', 'whyLeft', 'whyRight'));
        }

    // صفحة تفاصيل خدمة معينة (Route Model Binding)
    public function single(Service $service)
    {
        $setting = Setting::firstOrCreate([]);
        $locale  = session('locale', 'en');

        return view('service-single', [
            'setting' => $setting,
            'locale'  => $locale,
            'service' => $service,
        ]);
    }
}
