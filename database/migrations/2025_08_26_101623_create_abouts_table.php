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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            // Hero About
            $table->string('about_img1')->nullable();
            $table->string('about_img2')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('subTitle_en')->nullable();
            $table->string('subTitle_ar')->nullable();
            $table->json('goals')->nullable(); // [{text_en, text_ar}, ...]

            // FAQ Section
            $table->string('faq_img')->nullable();
            $table->string('faq_title_en')->nullable();
            $table->string('faq_title_ar')->nullable();
            $table->string('faq_subTitle_en')->nullable();
            $table->string('faq_subTitle_ar')->nullable();
            $table->json('faq')->nullable();   // [{question_en, question_ar, answer_en, answer_ar}, ...]

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
