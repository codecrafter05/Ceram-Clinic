<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('f_a_q_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faq_category_id')->constrained('f_a_q_categories')->cascadeOnDelete();
            $table->string('question_ar')->nullable();
            $table->string('question_en');
            $table->text('answer_ar')->nullable();
            $table->text('answer_en')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('f_a_q_s');
    }
};
