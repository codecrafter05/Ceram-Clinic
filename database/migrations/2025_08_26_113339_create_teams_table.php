<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();

            // الاسم (AR/EN)
            $table->string('name_ar')->nullable();
            $table->string('name_en');

            // المنصب/الوظيفة (AR/EN)
            $table->string('position_ar')->nullable();
            $table->string('position_en')->nullable();

            // صورة الدكتور (مسار داخل storage)
            $table->string('photo')->nullable();

            $table->json('social_links')->nullable();

            $table->unsignedInteger('sort_order')->default(0)->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
