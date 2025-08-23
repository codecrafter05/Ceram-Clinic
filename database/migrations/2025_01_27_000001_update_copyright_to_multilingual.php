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
        Schema::table('settings', function (Blueprint $table) {
            // Drop the old copyright column
            $table->dropColumn('copyright');
            
            // Add new multilingual copyright columns
            $table->string('copyright_en')->nullable();
            $table->string('copyright_ar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            // Drop the new columns
            $table->dropColumn(['copyright_en', 'copyright_ar']);
            
            // Add back the old column
            $table->string('copyright')->nullable();
        });
    }
};
