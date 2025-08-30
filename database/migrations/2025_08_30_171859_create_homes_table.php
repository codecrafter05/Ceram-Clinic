<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            
            // Hero Section
            $table->string('hero_title_en')->nullable();
            $table->string('hero_title_ar')->nullable();
            $table->text('hero_description_en')->nullable();
            $table->text('hero_description_ar')->nullable();
            $table->string('hero_image')->nullable();
            
            // Video Section
            $table->string('video_title_en')->nullable();
            $table->string('video_title_ar')->nullable();
            $table->string('video_subtitle_en')->nullable();
            $table->string('video_subtitle_ar')->nullable();
            $table->string('video_url')->nullable();
            $table->string('video_background_image')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
