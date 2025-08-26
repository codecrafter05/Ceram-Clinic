<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar', 'name_en',
        'position_ar', 'position_en',
        'photo',
        'social_links',
        'sort_order',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];

    protected $appends = ['photo_url'];

    public function getPhotoUrlAttribute(): string
    {
        return $this->photo ? Storage::url($this->photo) : asset('images/team-1.jpg');
    }

    /**
     * جلب نص حسب اللغة: getText('name') / getText('position')
     */
    public function getText(string $field, ?string $locale = null): string
    {
        $locale ??= session('locale', 'en');
        $ar = $field . '_ar';
        $en = $field . '_en';

        if ($locale === 'ar' && !empty($this->$ar)) {
            return $this->$ar;
        }

        return $this->$en
            ?? $this->$field
            ?? $this->$ar
            ?? '';
    }
}
