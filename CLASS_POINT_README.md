# نظام إدارة نقاط الفصل (Class Point System)

## نظرة عامة
نظام شامل لإدارة نقاط الطلاب في الفصول الدراسية يمكن المدرسين من:
- إنشاء وإدارة المهارات والسلوكيات (الإيجابية والسلبية)
- منح أو خصم النقاط للطلاب بشكل فردي أو جماعي
- متابعة تقارير مفصلة عن أداء الطلاب
- عرض إحصائيات شاملة عن النقاط

## الميزات الرئيسية

### 1. إدارة المهارات والسلوكيات
- إضافة مهارات إيجابية (تضيف نقاط)
- إضافة سلوكيات سلبية (تخصم نقاط)
- تعديل وحذف المهارات الموجودة
- تحديد عدد النقاط لكل مهارة/سلوك

### 2. إدارة النقاط
- منح النقاط للطلاب بشكل فردي
- منح النقاط لجميع طلاب الفصل دفعة واحدة
- خصم النقاط عند السلوك السلبي
- تتبع تاريخ منح/خصم النقاط

### 3. التقارير والإحصائيات
- عرض تقرير مفصل بجميع النقاط
- إحصائيات عامة (النقاط الإيجابية، السلبية، الإجمالية)
- إمكانية حذف النقاط المسجلة
- عرض معلومات المدرس الذي منح النقاط

### 4. التصميم والواجهة
- تصميم متجاوب مع جميع الأجهزة
- ألوان متناسقة مع نظام الموقع (الأزرق والأخضر)
- أيقونات واضحة لكل عملية
- رسائل تأكيد وتحذير للعمليات المهمة

## بنية الملفات

### Controllers
- `app/Http/Controllers/ToolsController.php` - المتحكم الرئيسي للنظام

### Models
- `app/Models/Points.php` - نموذج المهارات والسلوكيات
- `app/Models/StudentPoint.php` - نموذج نقاط الطلاب
- `app/Models/PointClass.php` - نموذج ربط المهارات بالفصول
- `app/Models/ClassRoom.php` - نموذج الفصول الدراسية
- `app/Models/GradeYear.php` - نموذج الصفوف الدراسية

### Views
- `resources/views/tools/classPoint.blade.php` - صفحة اختيار الفصل
- `resources/views/tools/studentPoint.blade.php` - صفحة إدارة نقاط الطلاب
- `resources/views/tools/skillPoint.blade.php` - صفحة إدارة المهارات
- `resources/views/tools/reportPoint.blade.php` - صفحة التقارير
- `resources/views/tools/pointForAll.blade.php` - نافذة إضافة النقاط للجميع
- `resources/views/tools/modals/` - نوافذ إضافة وتعديل المهارات

### Database
- `database/migrations/` - ملفات الهجرة لإنشاء الجداول
- `database/class_point_sample_data.sql` - بيانات تجريبية للنظام

## الجداول المطلوبة

### 1. grade_years
- id, name, description, level, is_active

### 2. class_rooms
- id, name, grade_id, teacher_id, description, max_students, is_active

### 3. class_teacher
- id, user_id (teacher), class_room_id

### 4. points
- id, teacher_id, name, grade, type (plus/minus), description, icon, color

### 5. student_points
- id, student_id, point_id, point, teacher_id, classroom_id, reason, date_awarded

### 6. point_classes
- id, classroom_id, point_id, is_active

### 7. users (إضافة عمود)
- classroom_id (للطلاب)

## طريقة التثبيت

### 1. تشغيل Migrations
```bash
php artisan migrate
```

### 2. إدراج البيانات التجريبية
```sql
-- تشغيل محتوى ملف database/class_point_sample_data.sql
```

### 3. إضافة Routes
Routes موجودة بالفعل في `routes/web.php` تحت مجموعة:
```php
Route::group(['middleware' => ['auth']], function () {
    // Class Point System Routes
    ...
});
```

## Routes المتاحة

### الروابط الأساسية
- `/tools/class-point` - صفحة اختيار الفصل
- `/tools/class-point/{classroom}` - صفحة إدارة نقاط فصل معين
- `/tools/skill-point/{classroom}` - صفحة إدارة المهارات
- `/tools/report-point/{classroom}` - صفحة التقارير

### روابط العمليات
- `POST /tools/plus-point` - إضافة نقطة إيجابية لطالب
- `POST /tools/minus-point` - خصم نقطة من طالب
- `POST /tools/plus-point-class` - إضافة نقطة لجميع الطلاب
- `POST /tools/minus-point-class` - خصم نقطة من جميع الطلاب
- `POST /tools/add-positive-skill` - إضافة مهارة إيجابية
- `POST /tools/add-negative-skill` - إضافة سلوك سلبي
- `PUT /tools/edit-positive-skill/{id}` - تعديل مهارة إيجابية
- `PUT /tools/edit-negative-skill/{id}` - تعديل سلوك سلبي
- `GET /tools/delete-skill/{id}` - حذف مهارة
- `GET /tools/delete-point/{id}` - حذف نقطة مسجلة

## الاستخدام

### 1. إعداد الفصول والطلاب
- تأكد من وجود فصول في جدول `class_rooms`
- تأكد من ربط المدرس بالفصول في جدول `class_teacher`
- تأكد من تسجيل الطلاب وربطهم بالفصول (`classroom_id` في جدول `users`)

### 2. إنشاء المهارات
- ادخل إلى صفحة "إدارة المهارات"
- أضف المهارات الإيجابية والسلوكيات السلبية
- حدد عدد النقاط لكل مهارة

### 3. منح النقاط
- ادخل إلى صفحة "إضافة النقاط"
- اختر الطالب المطلوب
- اختر المهارة المناسبة
- سيتم حساب النقاط تلقائياً

### 4. متابعة التقارير
- ادخل إلى صفحة "تقرير النقاط"
- اطلع على الإحصائيات والبيانات التفصيلية
- احذف النقاط الخاطئة إذا لزم الأمر

## الصلاحيات

### المدرس
- إدارة مهاراته الخاصة فقط
- منح نقاط للطلاب في فصوله فقط
- عرض تقارير فصوله فقط
- حذف النقاط التي منحها بنفسه فقط

## التخصيص

### الألوان والتصميم
- الألوان الرئيسية قابلة للتعديل في ملفات CSS
- الأيقونات موجودة في `public/assets/images/`

### الرسائل
- رسائل النجاح والخطأ قابلة للترجمة
- النصوص العربية مدمجة في الكود

## الدعم الفني

للحصول على الدعم أو الإبلاغ عن مشاكل:
1. تحقق من ملفات السجل (logs)
2. تأكد من صحة بنية قاعدة البيانات
3. تحقق من الصلاحيات والـ middleware

## التطوير المستقبلي

### ميزات مقترحة
- تصدير التقارير إلى Excel/PDF
- إشعارات للطلاب وأولياء الأمور
- رسوم بيانية للتقدم
- نظام مكافآت على النقاط
- تطبيق جوال للنظام

---

تم تطوير هذا النظام ليكون سهل الاستخدام ومتوافق مع المعايير التعليمية الحديثة.