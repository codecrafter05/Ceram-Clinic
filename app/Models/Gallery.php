<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'image',
        'title_en',
        'title_ar',
        'gallery_category_id',
        'type',
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
     * Get the category that owns the gallery
     */
    public function category()
    {
        return $this->belongsTo(GalleryCategory::class, 'gallery_category_id');
    }
}
