# دليل تثبيت وتشغيل نظام إدارة نقاط الفصل
# KUNOOZ Class Point System Setup Instructions

## المتطلبات الأساسية (Prerequisites)

### 1. متطلبات الخادم
- PHP 7.4 أو أحدث
- MySQL 5.7 أو أحدث 
- Composer لإدارة حزم PHP
- Apache أو Nginx
- Laravel Framework 8.x أو أحدث

### 2. الحزم المطلوبة
```bash
# التأكد من تثبيت الحزم المطلوبة
sudo apt update
sudo apt install php php-cli php-mbstring php-xml php-mysql php-zip php-gd composer
```

## خطوات التثبيت (Installation Steps)

### 1. إعداد قاعدة البيانات
```bash
# دخول إلى MySQL
mysql -u root -p

# إنشاء قاعدة بيانات جديدة (إذا لم تكن موجودة)
CREATE DATABASE kunooz_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

# إنشاء مستخدم قاعدة بيانات (اختياري)
CREATE USER 'kunooz_user'@'localhost' IDENTIFIED BY 'your_password';
GRANT ALL PRIVILEGES ON kunooz_db.* TO 'kunooz_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 2. إعداد ملف البيئة
```bash
# نسخ ملف البيئة المثال
cp .env.example .env

# تعديل إعدادات قاعدة البيانات في ملف .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kunooz_db
DB_USERNAME=kunooz_user
DB_PASSWORD=your_password
```

### 3. تثبيت التبعيات وإعداد Laravel
```bash
# تثبيت حزم Composer
composer install

# توليد مفتاح التطبيق
php artisan key:generate

# تشغيل الهجرة (Migrations)
php artisan migrate

# تشغيل البذور (Seeders) إن وجدت
php artisan db:seed
```

### 4. إدخال البيانات التجريبية
```bash
# إدخال البيانات التجريبية لنظام النقاط
mysql -u kunooz_user -p kunooz_db < database/class_point_sample_data.sql
```

### 5. إعداد الصلاحيات
```bash
# إعطاء صلاحيات الكتابة للمجلدات المطلوبة
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

## إعداد النظام (System Configuration)

### 1. إضافة مدرس جديد
```sql
-- إضافة مدرس في جدول users
INSERT INTO users (name, email, password, role, created_at, updated_at) VALUES
('المدرس الأول', 'teacher@kunooz.edu', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', NOW(), NOW());
```

### 2. إعداد الفصول والطلاب
```sql
-- ربط المدرس بالفصول في جدول class_teacher
INSERT INTO class_teacher (user_id, class_room_id, created_at, updated_at) VALUES
(1, 1, NOW(), NOW()); -- teacher_id = 1, classroom_id = 1

-- إضافة طلاب وربطهم بالفصول
INSERT INTO users (name, email, password, role, classroom_id, created_at, updated_at) VALUES
('طالب تجريبي', 'student@kunooz.edu', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 1, NOW(), NOW());
```

## استخدام النظام (System Usage)

### 1. الوصول إلى نظام النقاط
- انتقل إلى: `http://yourwebsite.com/tools/class-point`
- تسجيل الدخول كمدرس
- اختيار الفصل المطلوب

### 2. إدارة المهارات والسلوكيات
```
الانتقال إلى: /tools/skill-point/{classroom_id}
- إضافة مهارات إيجابية (تضيف نقاط)
- إضافة سلوكيات سلبية (تخصم نقاط)
- تعديل المهارات الموجودة
- حذف المهارات غير المطلوبة
```

### 3. منح النقاط للطلاب
```
الانتقال إلى: /tools/class-point/{classroom_id}
- اختيار الطالب
- اختيار المهارة أو السلوك
- إضافة/خصم النقاط تلقائياً
- إضافة نقاط لجميع الطلاب دفعة واحدة
```

### 4. عرض التقارير
```
الانتقال إلى: /tools/report-point/{classroom_id}
- عرض جميع النقاط المسجلة
- إحصائيات الطلاب
- حذف النقاط الخاطئة
```

## المسارات المتاحة (Available Routes)

### المسارات الأساسية
- `GET /tools/class-point` - صفحة اختيار الفصل
- `GET /tools/class-point/{classroom}` - صفحة إدارة النقاط
- `GET /tools/skill-point/{classroom}` - صفحة إدارة المهارات
- `GET /tools/report-point/{classroom}` - صفحة التقارير

### مسارات العمليات
- `POST /tools/plus-point` - إضافة نقطة إيجابية
- `POST /tools/minus-point` - خصم نقطة سلبية
- `POST /tools/plus-point-class` - إضافة نقطة لجميع الطلاب
- `POST /tools/minus-point-class` - خصم نقطة من جميع الطلاب
- `POST /tools/add-positive-skill` - إضافة مهارة إيجابية
- `POST /tools/add-negative-skill` - إضافة سلوك سلبي

## استكشاف الأخطاء (Troubleshooting)

### 1. خطأ في قاعدة البيانات
```bash
# التحقق من إعدادات قاعدة البيانات
php artisan config:cache
php artisan migrate:status
```

### 2. مشكلة في الصلاحيات
```bash
# إعادة تعيين صلاحيات المجلدات
sudo chown -R www-data:www-data /path/to/kunooz
sudo chmod -R 775 storage bootstrap/cache
```

### 3. مشكلة في البيانات
```sql
-- التحقق من وجود البيانات المطلوبة
SELECT * FROM grade_years;
SELECT * FROM class_rooms;
SELECT * FROM class_teacher;
SELECT * FROM users WHERE role = 'teacher';
```

### 4. تسجيلات الأخطاء
```bash
# عرض سجل أخطاء Laravel
tail -f storage/logs/laravel.log

# عرض سجل أخطاء الخادم
tail -f /var/log/apache2/error.log  # Apache
tail -f /var/log/nginx/error.log    # Nginx
```

## الصيانة والتطوير (Maintenance & Development)

### 1. النسخ الاحتياطي
```bash
# نسخة احتياطية من قاعدة البيانات
mysqldump -u kunooz_user -p kunooz_db > backup_$(date +%Y%m%d_%H%M%S).sql

# نسخة احتياطية من الملفات
tar -czf kunooz_backup_$(date +%Y%m%d_%H%M%S).tar.gz /path/to/kunooz
```

### 2. التحديثات
```bash
# تحديث التبعيات
composer update

# تشغيل هجرات جديدة
php artisan migrate

# مسح الكاش
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### 3. المراقبة
```bash
# مراقبة الأداء
php artisan queue:work  # إذا كان هناك طوابير
php artisan schedule:run  # تشغيل المهام المجدولة
```

## دعم إضافي (Additional Support)

### 1. ملفات المساعدة
- `CLASS_POINT_README.md` - دليل شامل للنظام
- `database/class_point_sample_data.sql` - بيانات تجريبية
- `storage/logs/laravel.log` - سجل أخطاء النظام

### 2. الاتصال للدعم
- التحقق من ملفات السجل أولاً
- مراجعة دليل الاستخدام
- التأكد من إعدادات قاعدة البيانات
- فحص صلاحيات الملفات والمجلدات

### 3. موارد إضافية
- [Laravel Documentation](https://laravel.com/docs)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [PHP Documentation](https://www.php.net/manual/)

---

**ملاحظة مهمة:** هذا النظام مصمم للعمل مع مشروع KUNOOZ التعليمي وقد يحتاج إلى تخصيصات إضافية حسب بيئة التشغيل المحددة.

**تاريخ الإنشاء:** سبتمبر 2024  
**الإصدار:** 1.0  
**اللغة:** العربية/الإنجليزية