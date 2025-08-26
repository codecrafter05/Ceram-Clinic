<?php
// app/Models/FAQCategory.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'sort_order'];

    public function faqs()
    {
        // ✅ حدّدنا المفتاح الأجنبي صراحة
        return $this->hasMany(FAQ::class, 'faq_category_id')
                    ->orderBy('sort_order')
                    ->orderBy('id');
    }

    public function getText(string $field, ?string $locale = null): string
    {
        $locale ??= session('locale', 'en');
        $ar = $field . '_ar';
        $en = $field . '_en';
        if ($locale === 'ar' && !empty($this->$ar)) return $this->$ar;
        return $this->$en ?? $this->$ar ?? '';
    }
}
