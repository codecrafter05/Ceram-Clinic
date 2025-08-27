<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\FAQPageController;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// الخدمات
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/service-single', [ServiceController::class, 'single'])->name('service.single');

Route::get('/team', [TeamController::class, 'index'])->name('team.index');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/page/{slug}', [CustomPageController::class, 'show']);
Route::get('/page', [CustomPageController::class, 'index']);

// Language Routes
Route::post('/switch-language', [App\Http\Controllers\LanguageController::class, 'switchLanguage'])->name('switch.language');
Route::get('/current-language', [App\Http\Controllers\LanguageController::class, 'getCurrentLanguage'])->name('current.language');
Route::get('/faqs', [FAQPageController::class, 'index'])->name('faqs.index');
