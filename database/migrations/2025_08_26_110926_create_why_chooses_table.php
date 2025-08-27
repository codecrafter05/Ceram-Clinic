<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('why_chooses', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->string('icon')->nullable(); // مسار الأيقونة (storage)
            $table->enum('position', ['left', 'right'])->default('left'); // العمود يسار/يمين
            $table->unsignedInteger('sort_order')->default(0); // لترتيب العناصر داخل كل عمود
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('why_chooses');
    }
};
