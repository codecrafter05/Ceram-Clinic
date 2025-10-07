<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\CustomPage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share setting globally with all views
        View::composer('*', function ($view) {
            $setting = Setting::firstOrCreate([]);
            $customPage = CustomPage::query()
                ->select('id','slug','page_name_en','page_name_ar')
                ->orderBy('page_name_en')
                ->get();
            View::share(compact('setting', 'customPage'));
        });
    }
}
