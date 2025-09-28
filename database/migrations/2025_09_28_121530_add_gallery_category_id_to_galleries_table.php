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
        Schema::table('galleries', function (Blueprint $table) {
            $table->foreignId('gallery_category_id')->nullable()->constrained()->onDelete('set null');
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('type')->default('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropForeign(['gallery_category_id']);
            $table->dropColumn(['gallery_category_id', 'title_en', 'title_ar', 'type']);
        });
    }
};
