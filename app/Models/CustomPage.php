<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CustomPage extends Model
{
    protected $fillable = [
        'page_name_en','page_name_ar',
        'title_en','title_ar',
        'slug',
        'description_en','description_ar',
    ];


    protected static function booted(): void
    {
        // يتأكد من تعبئة الـ slug عند الإنشاء والتحديث
        static::saving(function (CustomPage $page) {
            if (empty($page->slug)) {
                $base = $page->page_name_en ?: $page->title_en ?: Str::random(8);
                $slug = Str::slug($base) ?: Str::slug(Str::random(8));

                // تأكيد التفرد
                $original = $slug;
                $i = 2;
                while (self::where('slug', $slug)->where('id', '!=', $page->id)->exists()) {
                    $slug = "{$original}-{$i}";
                    $i++;
                }

                $page->slug = $slug;
            }
        });
    }

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
