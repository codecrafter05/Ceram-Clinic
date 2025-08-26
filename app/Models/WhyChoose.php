<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class WhyChoose extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar', 'title_en',
        'description_ar', 'description_en',
        'icon', 'position', 'sort_order',
    ];

    protected $appends = ['icon_url'];

    public function getText($fieldName, $locale = null)
    {
        $locale ??= session('locale', 'en');
        $ar = $fieldName . '_ar';
        $en = $fieldName . '_en';
        if ($locale === 'ar' && !empty($this->$ar)) {
            return $this->$ar;
        }
        return $this->$en ?? $this->$ar ?? '';
    }

    public function getIconUrlAttribute()
    {
        return $this->icon ? Storage::url($this->icon) : asset('images/icon-why-us-1.svg');
    }
}
