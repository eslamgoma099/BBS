-- نظام إدارة نقاط الفصل - بيانات تجريبية
-- KUNOOZ Class Point System - Sample Data

-- إدخال الصفوف الدراسية (Grade Years)
INSERT INTO grade_years (id, name, description, level, is_active, created_at, updated_at) VALUES
(1, 'الصف الأول الابتدائي', 'المرحلة الابتدائية - الصف الأول', 1, 1, NOW(), NOW()),
(2, 'الصف الثاني الابتدائي', 'المرحلة الابتدائية - الصف الثاني', 2, 1, NOW(), NOW()),
(3, 'الصف الثالث الابتدائي', 'المرحلة الابتدائية - الصف الثالث', 3, 1, NOW(), NOW()),
(4, 'الصف الرابع الابتدائي', 'المرحلة الابتدائية - الصف الرابع', 4, 1, NOW(), NOW()),
(5, 'الصف الخامس الابتدائي', 'المرحلة الابتدائية - الصف الخامس', 5, 1, NOW(), NOW()),
(6, 'الصف السادس الابتدائي', 'المرحلة الابتدائية - الصف السادس', 6, 1, NOW(), NOW());

-- إدخال الفصول الدراسية (ClassRooms)
INSERT INTO class_rooms (id, name, grade_id, teacher_id, description, max_students, is_active, created_at, updated_at) VALUES
(1, 'فصل أ', 1, 1, 'فصل الصف الأول الابتدائي - أ', 30, 1, NOW(), NOW()),
(2, 'فصل ب', 1, 1, 'فصل الصف الأول الابتدائي - ب', 30, 1, NOW(), NOW()),
(3, 'فصل أ', 2, 1, 'فصل الصف الثاني الابتدائي - أ', 30, 1, NOW(), NOW()),
(4, 'فصل ب', 2, 1, 'فصل الصف الثاني الابتدائي - ب', 30, 1, NOW(), NOW()),
(5, 'فصل أ', 3, 1, 'فصل الصف الثالث الابتدائي - أ', 30, 1, NOW(), NOW());

-- ربط المدرسين بالفصول (Class Teacher)
INSERT INTO class_teacher (id, user_id, class_room_id, created_at, updated_at) VALUES
(1, 1, 1, NOW(), NOW()),
(2, 1, 2, NOW(), NOW()),
(3, 1, 3, NOW(), NOW()),
(4, 1, 4, NOW(), NOW()),
(5, 1, 5, NOW(), NOW());

-- إدخال عينة من الطلاب (Students)
-- ملاحظة: يجب تحديث جدول users لإضافة classroom_id للطلاب
INSERT INTO users (name, email, password, role, classroom_id, created_at, updated_at) VALUES
('أحمد محمد علي', 'ahmed.student1@kunooz.edu', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 1, NOW(), NOW()),
('فاطمة أحمد محمد', 'fatima.student2@kunooz.edu', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 1, NOW(), NOW()),
('محمد عبدالله حسن', 'mohammed.student3@kunooz.edu', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 1, NOW(), NOW()),
('عائشة محمود إبراهيم', 'aisha.student4@kunooz.edu', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 1, NOW(), NOW()),
('يوسف أحمد سالم', 'youssef.student5@kunooz.edu', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 1, NOW(), NOW()),
('زينب محمد عمر', 'zeinab.student6@kunooz.edu', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 2, NOW(), NOW()),
('خالد عبدالرحمن أحمد', 'khaled.student7@kunooz.edu', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 2, NOW(), NOW()),
('مريم سعد محمد', 'mariam.student8@kunooz.edu', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', 2, NOW(), NOW());

-- إدخال المهارات والسلوكيات الإيجابية (Positive Points)
INSERT INTO points (id, teacher_id, name, grade, type, description, icon, color, created_at, updated_at) VALUES
(1, 1, 'المشاركة الفعالة', 5, 'plus', 'المشاركة بإيجابية في الأنشطة الصفية', 'participation-icon.png', '#28a745', NOW(), NOW()),
(2, 1, 'الانضباط والالتزام', 10, 'plus', 'الحضور في الوقت المحدد والالتزام بالقوانين', 'discipline-icon.png', '#28a745', NOW(), NOW()),
(3, 1, 'التعاون مع الزملاء', 7, 'plus', 'مساعدة الزملاء والعمل بروح الفريق', 'teamwork-icon.png', '#17a2b8', NOW(), NOW()),
(4, 1, 'أداء الواجبات بإتقان', 8, 'plus', 'تسليم الواجبات في الوقت المحدد بجودة عالية', 'homework-icon.png', '#007bff', NOW(), NOW()),
(5, 1, 'الإبداع والابتكار', 12, 'plus', 'تقديم حلول إبداعية وأفكار مبتكرة', 'creativity-icon.png', '#6f42c1', NOW(), NOW()),
(6, 1, 'احترام المعلم والزملاء', 6, 'plus', 'إظهار الاحترام والتقدير للجميع', 'respect-icon.png', '#fd7e14', NOW(), NOW()),
(7, 1, 'النظافة الشخصية', 4, 'plus', 'الاهتمام بالنظافة الشخصية والمظهر', 'cleanliness-icon.png', '#20c997', NOW(), NOW());

-- إدخال السلوكيات السلبية (Negative Points)  
INSERT INTO points (id, teacher_id, name, grade, type, description, icon, color, created_at, updated_at) VALUES
(8, 1, 'التأخر عن الحصة', 3, 'minus', 'عدم الحضور في الوقت المحدد', 'late-icon.png', '#dc3545', NOW(), NOW()),
(9, 1, 'عدم أداء الواجبات', 5, 'minus', 'عدم تسليم الواجبات في الوقت المحدد', 'no-homework-icon.png', '#dc3545', NOW(), NOW()),
(10, 1, 'الإزعاج في الصف', 4, 'minus', 'التسبب في الفوضى وعدم الالتزام بالهدوء', 'disruption-icon.png', '#dc3545', NOW(), NOW()),
(11, 1, 'عدم الاحترام', 8, 'minus', 'عدم احترام المعلم أو الزملاء', 'disrespect-icon.png', '#dc3545', NOW(), NOW()),
(12, 1, 'عدم المشاركة', 2, 'minus', 'تجنب المشاركة في الأنشطة الصفية', 'no-participation-icon.png', '#6c757d', NOW(), NOW());

-- ربط المهارات بالفصول (Point Classes)
INSERT INTO point_classes (id, classroom_id, point_id, is_active, created_at, updated_at) VALUES
-- ربط المهارات الإيجابية
(1, 1, 1, 1, NOW(), NOW()),
(2, 1, 2, 1, NOW(), NOW()),
(3, 1, 3, 1, NOW(), NOW()),
(4, 1, 4, 1, NOW(), NOW()),
(5, 1, 5, 1, NOW(), NOW()),
(6, 1, 6, 1, NOW(), NOW()),
(7, 1, 7, 1, NOW(), NOW()),
-- ربط السلوكيات السلبية
(8, 1, 8, 1, NOW(), NOW()),
(9, 1, 9, 1, NOW(), NOW()),
(10, 1, 10, 1, NOW(), NOW()),
(11, 1, 11, 1, NOW(), NOW()),
(12, 1, 12, 1, NOW(), NOW()),
-- ربط للفصل الثاني
(13, 2, 1, 1, NOW(), NOW()),
(14, 2, 2, 1, NOW(), NOW()),
(15, 2, 3, 1, NOW(), NOW()),
(16, 2, 4, 1, NOW(), NOW()),
(17, 2, 8, 1, NOW(), NOW()),
(18, 2, 9, 1, NOW(), NOW()),
(19, 2, 10, 1, NOW(), NOW());

-- إدخال عينة من النقاط المكتسبة (Student Points)
INSERT INTO student_points (id, student_id, point_id, point, teacher_id, classroom_id, reason, date_awarded, created_at, updated_at) VALUES
-- نقاط الطالب أحمد محمد علي (ID: 1)
(1, 1, 1, 5, 1, 1, 'مشاركة ممتازة في درس الرياضيات', '2024-01-15 09:00:00', NOW(), NOW()),
(2, 1, 2, 10, 1, 1, 'حضر في الوقت المحدد طوال الأسبوع', '2024-01-16 08:00:00', NOW(), NOW()),
(3, 1, 4, 8, 1, 1, 'أدى واجب اللغة العربية بإتقان', '2024-01-17 10:30:00', NOW(), NOW()),
(4, 1, 8, -3, 1, 1, 'تأخر عن الحصة الأولى', '2024-01-18 08:15:00', NOW(), NOW()),

-- نقاط الطالبة فاطمة أحمد محمد (ID: 2)
(5, 2, 3, 7, 1, 1, 'ساعدت زميلتها في فهم الدرس', '2024-01-15 11:00:00', NOW(), NOW()),
(6, 2, 5, 12, 1, 1, 'قدمت فكرة إبداعية في مشروع العلوم', '2024-01-16 14:00:00', NOW(), NOW()),
(7, 2, 6, 6, 1, 1, 'أظهرت احترام كبير للمعلمة', '2024-01-17 09:30:00', NOW(), NOW()),

-- نقاط الطالب محمد عبدالله حسن (ID: 3)
(8, 3, 2, 10, 1, 1, 'انضباط ممتاز في الحضور', '2024-01-15 08:00:00', NOW(), NOW()),
(9, 3, 9, -5, 1, 1, 'لم يسلم واجب الرياضيات', '2024-01-16 10:00:00', NOW(), NOW()),
(10, 3, 1, 5, 1, 1, 'مشاركة جيدة في النقاش', '2024-01-17 11:15:00', NOW(), NOW()),

-- نقاط الطالبة عائشة محمود إبراهيم (ID: 4)
(11, 4, 7, 4, 1, 1, 'اهتمام بالنظافة الشخصية', '2024-01-15 12:00:00', NOW(), NOW()),
(12, 4, 4, 8, 1, 1, 'أدت جميع الواجبات بإتقان', '2024-01-16 15:30:00', NOW(), NOW()),
(13, 4, 10, -4, 1, 1, 'تحدثت بصوت عالي أثناء الدرس', '2024-01-17 09:45:00', NOW(), NOW()),

-- نقاط الطالب يوسف أحمد سالم (ID: 5)
(14, 5, 5, 12, 1, 1, 'ابتكر طريقة جديدة لحل المسائل', '2024-01-15 13:30:00', NOW(), NOW()),
(15, 5, 3, 7, 1, 1, 'عمل مع فريقه بكفاءة عالية', '2024-01-16 14:45:00', NOW(), NOW()),
(16, 5, 12, -2, 1, 1, 'لم يشارك في النشاط الجماعي', '2024-01-17 10:00:00', NOW(), NOW());

-- ملاحظات مهمة للتشغيل:
-- 1. تأكد من وجود مدرس بـ ID = 1 في جدول users
-- 2. تأكد من أن الطلاب لديهم role = 'student' 
-- 3. تأكد من إضافة عمود classroom_id إلى جدول users
-- 4. يمكن إضافة المزيد من البيانات حسب الحاجة

-- استعلامات مفيدة للاختبار:
-- عرض جميع النقاط لطالب معين:
-- SELECT sp.*, p.name as skill_name, p.type, u.name as student_name 
-- FROM student_points sp 
-- JOIN points p ON sp.point_id = p.id 
-- JOIN users u ON sp.student_id = u.id 
-- WHERE sp.student_id = 1;

-- عرض إجمالي النقاط لكل طالب:
-- SELECT u.name, SUM(sp.point) as total_points
-- FROM users u 
-- LEFT JOIN student_points sp ON u.id = sp.student_id 
-- WHERE u.role = 'student' 
-- GROUP BY u.id, u.name;

-- عرض النقاط الإيجابية والسلبية منفصلة:
-- SELECT u.name,
--        SUM(CASE WHEN sp.point > 0 THEN sp.point ELSE 0 END) as positive_points,
--        SUM(CASE WHEN sp.point < 0 THEN sp.point ELSE 0 END) as negative_points,
--        SUM(sp.point) as total_points
-- FROM users u 
-- LEFT JOIN student_points sp ON u.id = sp.student_id 
-- WHERE u.role = 'student' 
-- GROUP BY u.id, u.name;