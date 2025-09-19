-- Sample Data for Class Point System
-- Run this SQL after creating the tables

-- Insert Grade Years
INSERT INTO grade_years (id, name, description, level, is_active, created_at, updated_at) VALUES
(1, 'الصف الأول الابتدائي', 'الصف الأول من المرحلة الابتدائية', 1, 1, NOW(), NOW()),
(2, 'الصف الثاني الابتدائي', 'الصف الثاني من المرحلة الابتدائية', 2, 1, NOW(), NOW()),
(3, 'الصف الثالث الابتدائي', 'الصف الثالث من المرحلة الابتدائية', 3, 1, NOW(), NOW());

-- Insert Class Rooms (assuming we have teacher with ID 1)
INSERT INTO class_rooms (id, name, grade_id, teacher_id, description, max_students, is_active, created_at, updated_at) VALUES
(1, 'فصل أ', 1, 1, 'فصل الصف الأول - أ', 25, 1, NOW(), NOW()),
(2, 'فصل ب', 1, 1, 'فصل الصف الأول - ب', 25, 1, NOW(), NOW()),
(3, 'فصل أ', 2, 1, 'فصل الصف الثاني - أ', 30, 1, NOW(), NOW());

-- Insert Class Teacher relationships
INSERT INTO class_teacher (user_id, class_room_id, created_at, updated_at) VALUES
(1, 1, NOW(), NOW()),
(1, 2, NOW(), NOW()),
(1, 3, NOW(), NOW());

-- Insert Sample Points (Skills/Behaviors)
INSERT INTO points (id, teacher_id, name, grade, type, description, icon, color, created_at, updated_at) VALUES
-- Positive Points
(1, 1, 'المشاركة الفعالة', 5, 'plus', 'المشاركة بنشاط في الدرس والإجابة على الأسئلة', 'positive-icon.png', '#28a745', NOW(), NOW()),
(2, 1, 'أداء الواجب', 10, 'plus', 'إكمال الواجب المنزلي بشكل صحيح وفي الوقت المحدد', 'positive-icon.png', '#28a745', NOW(), NOW()),
(3, 1, 'مساعدة الزملاء', 7, 'plus', 'مساعدة الطلاب الآخرين وتقديم الدعم لهم', 'positive-icon.png', '#28a745', NOW(), NOW()),
(4, 1, 'الانتباه والتركيز', 8, 'plus', 'الانتباه للدرس والتركيز أثناء الشرح', 'positive-icon.png', '#28a745', NOW(), NOW()),
(5, 1, 'النظافة والترتيب', 6, 'plus', 'الحفاظ على نظافة المكان وترتيب الأدوات', 'positive-icon.png', '#28a745', NOW(), NOW()),

-- Negative Points
(6, 1, 'عدم أداء الواجب', 5, 'minus', 'عدم إكمال الواجب المنزلي أو تأخير تسليمه', 'negative-icon.png', '#dc3545', NOW(), NOW()),
(7, 1, 'إزعاج الفصل', 8, 'minus', 'التسبب في الفوضى أو إزعاج الطلاب الآخرين', 'negative-icon.png', '#dc3545', NOW(), NOW()),
(8, 1, 'عدم الانتباه', 4, 'minus', 'عدم الانتباه للدرس أو الانشغال بأشياء أخرى', 'negative-icon.png', '#dc3545', NOW(), NOW()),
(9, 1, 'التأخير', 3, 'minus', 'التأخر عن الحصة أو عدم الحضور في الوقت المحدد', 'negative-icon.png', '#dc3545', NOW(), NOW());

-- Insert Point Classes relationships
INSERT INTO point_classes (classroom_id, point_id, is_active, created_at, updated_at) VALUES
-- Assign all points to all classrooms
(1, 1, 1, NOW(), NOW()), (1, 2, 1, NOW(), NOW()), (1, 3, 1, NOW(), NOW()), (1, 4, 1, NOW(), NOW()), (1, 5, 1, NOW(), NOW()),
(1, 6, 1, NOW(), NOW()), (1, 7, 1, NOW(), NOW()), (1, 8, 1, NOW(), NOW()), (1, 9, 1, NOW(), NOW()),
(2, 1, 1, NOW(), NOW()), (2, 2, 1, NOW(), NOW()), (2, 3, 1, NOW(), NOW()), (2, 4, 1, NOW(), NOW()), (2, 5, 1, NOW(), NOW()),
(2, 6, 1, NOW(), NOW()), (2, 7, 1, NOW(), NOW()), (2, 8, 1, NOW(), NOW()), (2, 9, 1, NOW(), NOW()),
(3, 1, 1, NOW(), NOW()), (3, 2, 1, NOW(), NOW()), (3, 3, 1, NOW(), NOW()), (3, 4, 1, NOW(), NOW()), (3, 5, 1, NOW(), NOW()),
(3, 6, 1, NOW(), NOW()), (3, 7, 1, NOW(), NOW()), (3, 8, 1, NOW(), NOW()), (3, 9, 1, NOW(), NOW());

-- Create some sample students (if users table exists)
-- Uncomment and modify these lines according to your users table structure
/*
INSERT INTO users (firstname, lastname, email, password, classroom_id, created_at, updated_at) VALUES
('أحمد', 'محمد', 'ahmad@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, NOW(), NOW()),
('فاطمة', 'عبدالله', 'fatima@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, NOW(), NOW()),
('محمد', 'أحمد', 'mohammed@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, NOW(), NOW()),
('عائشة', 'سالم', 'aisha@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, NOW(), NOW()),
('عبدالرحمن', 'خالد', 'abdulrahman@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, NOW(), NOW());
*/

-- Sample Student Points (uncomment after creating students)
/*
INSERT INTO student_points (student_id, point_id, point, teacher_id, classroom_id, date_awarded, created_at, updated_at) VALUES
(2, 1, 5, 1, 1, NOW(), NOW(), NOW()),   -- Ahmad got participation points
(2, 2, 10, 1, 1, NOW(), NOW(), NOW()),  -- Ahmad completed homework
(3, 1, 5, 1, 1, NOW(), NOW(), NOW()),   -- Fatima got participation points
(4, 6, -5, 1, 1, NOW(), NOW(), NOW()),  -- Mohammed didn't do homework
(5, 3, 7, 1, 2, NOW(), NOW(), NOW());   -- Aisha helped classmates
*/