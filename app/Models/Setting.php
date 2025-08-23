<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_logo',
        'site_icon',
        'contact_number',
        'contact_email',
        'location_text_en',
        'location_text_ar',
        'location_url',
        'social_media',
        'copyright_en',
        'copyright_ar',
    ];

    protected $casts = [
        'social_media' => 'array',
    ];

    /**
     * Get text based on current language
     */
    public function getText($fieldName, $locale = null)
    {
        if (!$locale) {
            $locale = session('locale', 'en');
        }
        
        $arField = $fieldName . '_ar';
        $enField = $fieldName . '_en';
        
        if ($locale === 'ar' && !empty($this->$arField)) {
            return $this->$arField;
        }
        
        return $this->$enField ?? $this->$arField ?? '';
    }
}