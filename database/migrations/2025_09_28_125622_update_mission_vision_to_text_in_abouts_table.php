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
        Schema::table('abouts', function (Blueprint $table) {
            // Drop old JSON columns
            $table->dropColumn(['mission', 'vision']);
            
            // Add new text columns
            $table->text('mission_en')->nullable();
            $table->text('mission_ar')->nullable();
            $table->text('vision_en')->nullable();
            $table->text('vision_ar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            // Drop new text columns
            $table->dropColumn(['mission_en', 'mission_ar', 'vision_en', 'vision_ar']);
            
            // Add back old JSON columns
            $table->json('mission')->nullable();
            $table->json('vision')->nullable();
        });
    }
};
