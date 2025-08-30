# Home Page Management Setup

تم إنشاء نظام إدارة للصفحة الرئيسية يتضمن:

## الملفات المُنشأة:

### 1. Model
- `app/Models/Home.php` - مودل لإدارة بيانات الصفحة الرئيسية

### 2. Migration
- `database/migrations/2025_08_30_171859_create_homes_table.php` - جدول قاعدة البيانات

### 3. Filament Resource
- `app/Filament/Admin/Resources/HomeResource.php` - واجهة إدارة في لوحة التحكم

### 4. Seeder
- `database/seeders/HomeSeeder.php` - بيانات افتراضية

## الحقول المُضافة:

### Hero Section:
- `hero_title_en` - عنوان البطل بالإنجليزية
- `hero_title_ar` - عنوان البطل بالعربية
- `hero_description_en` - وصف البطل بالإنجليزية
- `hero_description_ar` - وصف البطل بالعربية
- `hero_image` - صورة البطل

### Video Section:
- `video_title_en` - عنوان الفيديو بالإنجليزية
- `video_title_ar` - عنوان الفيديو بالعربية
- `video_subtitle_en` - العنوان الفرعي للفيديو بالإنجليزية
- `video_subtitle_ar` - العنوان الفرعي للفيديو بالعربية
- `video_url` - رابط الفيديو (YouTube)
- `video_background_image` - صورة خلفية الفيديو

## الميزات:

1. **دعم اللغتين**: العربية والإنجليزية
2. **إدارة الصور**: رفع وتحرير الصور
3. **واجهة سهلة**: تبويبات منظمة في لوحة التحكم
4. **بيانات افتراضية**: تم إضافة بيانات افتراضية جاهزة

## كيفية الاستخدام:

1. ادخل إلى لوحة التحكم: `/admin`
2. اذهب إلى "الصفحة الرئيسية" في القائمة الجانبية
3. عدّل البيانات حسب الحاجة
4. احفظ التغييرات

## التحديثات في الصفحة الرئيسية:

تم تحديث `resources/views/index.blade.php` لاستخدام البيانات الديناميكية من قاعدة البيانات مع الاحتفاظ بالبيانات الافتراضية كـ fallback.

## التشغيل:

```bash
# تشغيل المايقريشن
php artisan migrate

# تشغيل الـ seeder
php artisan db:seed --class=HomeSeeder

# تشغيل الخادم
php artisan serve
```
