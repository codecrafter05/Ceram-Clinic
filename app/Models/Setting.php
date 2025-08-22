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
        'copyright',
    ];

    protected $casts = [
        'social_media' => 'array',
    ];
}
