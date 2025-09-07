<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1) تأكد أن الجدول موجود
        if (!Schema::hasTable('settings')) {
            return;
        }

        // 2) أضف الأعمدة الجديدة إن ما كانت موجودة
        Schema::table('settings', function (Blueprint $table) {
            if (!Schema::hasColumn('settings', 'copyright_en')) {
                $table->string('copyright_en')->nullable();
            }
            if (!Schema::hasColumn('settings', 'copyright_ar')) {
                $table->string('copyright_ar')->nullable();
            }
        });

        // 3) انقل القيم من العمود القديم (لو موجود) إلى الأعمدة الجديدة
        if (Schema::hasColumn('settings', 'copyright')) {
            // اقرأ القيم وحاول تتعامل مع كونها نص أو JSON
            $rows = DB::table('settings')->select('id', 'copyright')->get();

            foreach ($rows as $row) {
                $en = null;
                $ar = null;

                if ($row->copyright === null) {
                    // لا شيء
                } else {
                    // جرّب JSON: {"en": "...", "ar": "..."} أو مشابه
                    $decoded = null;
                    try {
                        $decoded = json_decode($row->copyright, true, 512, JSON_THROW_ON_ERROR);
                    } catch (\Throwable $e) {
                        $decoded = null;
                    }

                    if (is_array($decoded)) {
                        // جرّب مفاتيح شائعة
                        $en = $decoded['en'] ?? $decoded['copyright_en'] ?? null;
                        $ar = $decoded['ar'] ?? $decoded['copyright_ar'] ?? null;
                        // لو ما لقينا شي، خلّ النسخة الإنجليزية نص خام
                        if (!$en && !$ar) {
                            $en = is_scalar($row->copyright) ? (string) $row->copyright : null;
                        }
                    } else {
                        // قيمة نصية عادية
                        $en = (string) $row->copyright;
                    }
                }

                DB::table('settings')->where('id', $row->id)->update([
                    'copyright_en' => $en,
                    'copyright_ar' => $ar,
                ]);
            }

            // 4) بعد النقل: احذف العمود القديم بأمان
            Schema::table('settings', function (Blueprint $table) {
                if (Schema::hasColumn('settings', 'copyright')) {
                    $table->dropColumn('copyright');
                }
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable('settings')) {
            return;
        }

        // أرجع عمود واحد
        Schema::table('settings', function (Blueprint $table) {
            if (!Schema::hasColumn('settings', 'copyright')) {
                $table->string('copyright')->nullable();
            }
        });

        // دمج القيم راجعًا: خذ الإنجليزية كقيمة أساسية
        $rows = DB::table('settings')->select('id', 'copyright_en', 'copyright_ar')->get();
        foreach ($rows as $row) {
            $value = $row->copyright_en ?? $row->copyright_ar ?? null;
            DB::table('settings')->where('id', $row->id)->update([
                'copyright' => $value,
            ]);
        }

        // احذف الأعمدة الجديدة لو موجودة
        Schema::table('settings', function (Blueprint $table) {
            if (Schema::hasColumn('settings', 'copyright_en')) {
                $table->dropColumn('copyright_en');
            }
            if (Schema::hasColumn('settings', 'copyright_ar')) {
                $table->dropColumn('copyright_ar');
            }
        });
    }
};
