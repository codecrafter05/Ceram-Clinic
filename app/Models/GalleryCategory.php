<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'sort_order',
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

    /**
     * Get galleries for this category
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
