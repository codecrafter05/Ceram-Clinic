<?php

namespace App\Helpers;

class LanguageHelper
{
    /**
     * Get text based on current language
     */
    public static function getText($enText, $arText, $locale = null)
    {
        if (!$locale) {
            $locale = session('locale', 'en');
        }
        
        return $locale === 'ar' ? $arText : $enText;
    }
    
    /**
     * Get setting text based on current language
     */
    public static function getSettingText($setting, $fieldName, $locale = null)
    {
        if (!$locale) {
            $locale = session('locale', 'en');
        }
        
        $arField = $fieldName . '_ar';
        $enField = $fieldName . '_en';
        
        if ($locale === 'ar' && !empty($setting->$arField)) {
            return $setting->$arField;
        }
        
        return $setting->$enField ?? $setting->$arField ?? '';
    }
}
