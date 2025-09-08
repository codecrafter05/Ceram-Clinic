<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('settings')) return;

        Schema::table('settings', function (Blueprint $table) {
            if (! Schema::hasColumn('settings', 'copyright_en')) {
                $table->string('copyright_en')->nullable()->after('copyright');
            }
            if (! Schema::hasColumn('settings', 'copyright_ar')) {
                $table->string('copyright_ar')->nullable()->after('copyright_en');
            }
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('settings')) return;

        Schema::table('settings', function (Blueprint $table) {
            if (Schema::hasColumn('settings', 'copyright_ar')) {
                $table->dropColumn('copyright_ar');
            }
            if (Schema::hasColumn('settings', 'copyright_en')) {
                $table->dropColumn('copyright_en');
            }
        });
    }
};
