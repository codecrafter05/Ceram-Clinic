<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_title_en',
        'hero_title_ar',
        'hero_description_en',
        'hero_description_ar',
        'hero_image',
        'video_title_en',
        'video_title_ar',
        'video_subtitle_en',
        'video_subtitle_ar',
        'video_url',
        'video_background_image',
    ];

    /**
     * Get hero title based on current locale
     */
    public function getHeroTitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"hero_title_{$locale}"} ?? $this->hero_title_en;
    }

    /**
     * Get hero description based on current locale
     */
    public function getHeroDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"hero_description_{$locale}"} ?? $this->hero_description_en;
    }

    /**
     * Get video title based on current locale
     */
    public function getVideoTitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"video_title_{$locale}"} ?? $this->video_title_en;
    }

    /**
     * Get video subtitle based on current locale
     */
    public function getVideoSubtitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"video_subtitle_{$locale}"} ?? $this->video_subtitle_en;
    }

    /**
     * Get hero image URL
     */
    public function getHeroImageUrlAttribute()
    {
        return $this->hero_image ? asset('storage/' . $this->hero_image) : null;
    }

    /**
     * Get video background image URL
     */
    public function getVideoBackgroundImageUrlAttribute()
    {
        return $this->video_background_image ? asset('storage/' . $this->video_background_image) : null;
    }
}
