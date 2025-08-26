<?php

// app/Models/FAQ.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $fillable = [
        'faq_category_id',
        'question_ar', 'question_en',
        'answer_ar', 'answer_en',
        'is_active', 'sort_order',
    ];

    public function category()
    {
        // ✅ مفتاح أجنبي صريح متوافق مع المايجريشن
        return $this->belongsTo(FAQCategory::class, 'faq_category_id');
    }

    public function scopeActive($q) { return $q->where('is_active', true); }

    public function getText(string $field, ?string $locale = null): string
    {
        $locale ??= session('locale', 'en');
        $ar = $field . '_ar';
        $en = $field . '_en';
        if ($locale === 'ar' && !empty($this->$ar)) return $this->$ar;
        return $this->$en ?? $this->$ar ?? '';
    }
}
