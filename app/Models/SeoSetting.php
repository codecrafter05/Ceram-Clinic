<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
        protected $fillable = [
        // Home
        'title_home','image_home','key_home','description_home',
        // About
        'title_about','image_about','key_about','description_about',
        // Contact
        'title_contact','image_contact','key_contact','description_contact',
        // Team
        'title_team','image_team','key_team','description_team',
        // Service
        'title_service','image_service','key_service','description_service',
    ];
}
