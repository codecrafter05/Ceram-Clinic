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
        Schema::create('seo_settings', function (Blueprint $table) {
            $table->id();
            // Home Page
            $table->string('title_home')->nullable();
            $table->string('image_home')->nullable();
            $table->text('key_home')->nullable();
            $table->text('description_home')->nullable();

            // About Page
            $table->string('title_about')->nullable();
            $table->string('image_about')->nullable();
            $table->text('key_about')->nullable();
            $table->text('description_about')->nullable();

            // Contact Page
            $table->string('title_contact')->nullable();
            $table->string('image_contact')->nullable();
            $table->text('key_contact')->nullable();
            $table->text('description_contact')->nullable();

            // Team Page
            $table->string('title_team')->nullable();
            $table->string('image_team')->nullable();
            $table->text('key_team')->nullable();
            $table->text('description_team')->nullable();

            // Service Page
            $table->string('title_service')->nullable();
            $table->string('image_service')->nullable();
            $table->text('key_service')->nullable();
            $table->text('description_service')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_settings');
    }
};
