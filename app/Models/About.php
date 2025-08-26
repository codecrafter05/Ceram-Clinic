<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';

    protected $fillable = [
        // Hero About
        'about_img1',
        'about_img2',
        'title_en',
        'title_ar',
        'subTitle_en',
        'subTitle_ar',
        'goals',

        // FAQ
        'faq_img',
        'faq_title_en',
        'faq_title_ar',
        'faq_subTitle_en',
        'faq_subTitle_ar',
        'faq',
    ];

    protected $casts = [
        'goals' => 'array',
        'faq'   => 'array',
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