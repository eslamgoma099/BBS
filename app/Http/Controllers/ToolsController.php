<?php

namespace App\Http\Controllers;

use App\Models\PointClass;
use App\Models\Points;
use App\Models\StudentPoint;
use App\Models\User;
use App\Models\ClassRoom;
use App\Models\GradeYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ToolsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tool_cat()
    {
        return view('tools.toolCat');
    }

    public function stopWatch()
    {
        return view('tools.stopWatch');
    }

    public function countdownTimer()
    {
        return view('tools.countdown');
    }

    // Class Point System
    public function classPoint()
    {
        // Get teacher's classes
        $classes = DB::table('class_teacher')
            ->join('users', 'class_teacher.user_id', 'users.id')
            ->join('class_rooms', 'class_teacher.class_room_id', 'class_rooms.id')
            ->join('grade_years', 'class_rooms.grade_id', 'grade_years.id')
            ->select('class_rooms.*', 'grade_years.name as gradeName')
            ->where('class_teacher.user_id', auth()->user()->id)
            ->get();

        return view('tools.classPoint', compact('classes'));
    }

    public function selectClassPoint($classroom)
    {
        // Get students in this classroom
        $students = User::where('classroom_id', $classroom)->get();
        
        // Get teacher's points (positive and negative)
        $plus = Points::where('teacher_id', auth()->user()->id)
            ->where('type', 'plus')
            ->get();
            
        $minus = Points::where('teacher_id', auth()->user()->id)
            ->where('type', 'minus')
            ->get();

        return view('tools.studentPoint', compact('students', 'classroom', 'plus', 'minus'));
    }

    public function plusPoint(Request $request)
    {
        $point = Points::where('id', $request->point_id)->first();

        StudentPoint::create([
            'student_id' => $request->student_id,
            'point_id' => $request->point_id,
            'point' => $point->grade,
            'teacher_id' => auth()->user()->id,
            'classroom_id' => $request->classroom_id ?? null,
            'date_awarded' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'تمت إضافة النقطة بنجاح');
    }

    public function minusPoint(Request $request)
    {
        $point = Points::where('id', $request->point_id)->first();

        StudentPoint::create([
            'student_id' => $request->student_id,
            'point_id' => $request->point_id,
            'point' => -($point->grade),
            'teacher_id' => auth()->user()->id,
            'classroom_id' => $request->classroom_id ?? null,
            'date_awarded' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'تم خصم النقطة بنجاح');
    }

    public function plusPointClass(Request $request)
    {
        $point = Points::where('id', $request->point_id)->first();
        $students = User::where('classroom_id', $request->classroom_id)->get();

        foreach ($students as $student) {
            StudentPoint::create([
                'student_id' => $student->id,
                'point_id' => $request->point_id,
                'point' => $point->grade,
                'teacher_id' => auth()->user()->id,
                'classroom_id' => $request->classroom_id,
                'date_awarded' => Carbon::now()
            ]);
        }

        return redirect()->back()->with('success', 'تمت إضافة النقاط لجميع الطلاب');
    }

    public function minusPointClass(Request $request)
    {
        $point = Points::where('id', $request->point_id)->first();
        $students = User::where('classroom_id', $request->classroom_id)->get();

        foreach ($students as $student) {
            StudentPoint::create([
                'student_id' => $student->id,
                'point_id' => $request->point_id,
                'point' => -($point->grade),
                'teacher_id' => auth()->user()->id,
                'classroom_id' => $request->classroom_id,
                'date_awarded' => Carbon::now()
            ]);
        }

        return redirect()->back()->with('success', 'تم خصم النقاط من جميع الطلاب');
    }

    public function skillPoint($classroom)
    {
        $plus = Points::where('teacher_id', auth()->user()->id)
            ->where('type', 'plus')
            ->get();
            
        $minus = Points::where('teacher_id', auth()->user()->id)
            ->where('type', 'minus')
            ->get();

        return view('tools.skillPoint', compact('classroom', 'plus', 'minus'));
    }

    public function addPositiveSkill(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|integer|min:1|max:100'
        ]);

        $classes = DB::table('class_teacher')
            ->join('users', 'class_teacher.user_id', 'users.id')
            ->join('class_rooms', 'class_teacher.class_room_id', 'class_rooms.id')
            ->select('class_rooms.*')
            ->where('class_teacher.user_id', auth()->user()->id)
            ->get();

        $point = Points::create([
            'teacher_id' => auth()->user()->id,
            'name' => $request->name,
            'grade' => $request->grade,
            'type' => 'plus',
            'description' => $request->description,
            'icon' => 'positive-icon.png',
            'color' => '#28a745'
        ]);

        foreach ($classes as $class) {
            PointClass::create([
                'classroom_id' => $class->id,
                'point_id' => $point->id,
                'is_active' => true
            ]);
        }

        return redirect()->back()->with('success', 'تمت إضافة المهارة الإيجابية بنجاح');
    }

    public function addNegativeSkill(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|integer|min:1|max:100'
        ]);

        $classes = DB::table('class_teacher')
            ->join('users', 'class_teacher.user_id', 'users.id')
            ->join('class_rooms', 'class_teacher.class_room_id', 'class_rooms.id')
            ->select('class_rooms.*')
            ->where('class_teacher.user_id', auth()->user()->id)
            ->get();

        $point = Points::create([
            'teacher_id' => auth()->user()->id,
            'name' => $request->name,
            'grade' => $request->grade,
            'type' => 'minus',
            'description' => $request->description,
            'icon' => 'negative-icon.png',
            'color' => '#dc3545'
        ]);

        foreach ($classes as $class) {
            PointClass::create([
                'classroom_id' => $class->id,
                'point_id' => $point->id,
                'is_active' => true
            ]);
        }

        return redirect()->back()->with('success', 'تمت إضافة المهارة السلبية بنجاح');
    }

    public function editPositiveSkill($positive_id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|integer|min:1|max:100'
        ]);

        $positive = Points::findOrFail($positive_id);
        
        if ($positive->teacher_id != auth()->user()->id) {
            abort(403, 'غير مصرح لك بتعديل هذه المهارة');
        }

        $positive->update([
            'name' => $request->name,
            'grade' => $request->grade,
            'description' => $request->description
        ]);

        return redirect()->back()->with('success', 'تم تحديث المهارة الإيجابية بنجاح');
    }

    public function editNegativeSkill($negative_id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|integer|min:1|max:100'
        ]);

        $negative = Points::findOrFail($negative_id);
        
        if ($negative->teacher_id != auth()->user()->id) {
            abort(403, 'غير مصرح لك بتعديل هذه المهارة');
        }

        $negative->update([
            'name' => $request->name,
            'grade' => $request->grade,
            'description' => $request->description
        ]);

        return redirect()->back()->with('success', 'تم تحديث المهارة السلبية بنجاح');
    }

    public function deleteSkill($skill_id)
    {
        $skill = Points::findOrFail($skill_id);
        
        if ($skill->teacher_id != auth()->user()->id) {
            abort(403, 'غير مصرح لك بحذف هذه المهارة');
        }

        // Delete related records
        PointClass::where('point_id', $skill_id)->delete();
        StudentPoint::where('point_id', $skill_id)->delete();
        
        $skill->delete();

        return redirect()->back()->with('success', 'تم حذف المهارة بنجاح');
    }

    public function reportPoint($class_id)
    {
        $students = User::where('classroom_id', $class_id)->pluck('id');
        $reports = StudentPoint::whereIn('student_id', $students)
            ->with(['student', 'point', 'teacher'])
            ->orderBy('date_awarded', 'desc')
            ->get();

        return view('tools.reportPoint', compact('reports', 'class_id'));
    }

    public function deletePoint($point_id)
    {
        $studentPoint = StudentPoint::findOrFail($point_id);
        
        if ($studentPoint->teacher_id != auth()->user()->id) {
            abort(403, 'غير مصرح لك بحذف هذه النقطة');
        }

        $studentPoint->delete();

        return redirect()->back()->with('success', 'تم حذف النقطة بنجاح');
    }

    // Student wheel functions
    public function classWheel()
    {
        return view('tools.classWheel');
    }

    public function selectclassWheel($classroom)
    {
        return redirect()->route('spinningWheel', $classroom);
    }

    public function spinningWheel($classroom)
    {
        $students = User::where('classroom_id', $classroom)->get();
        return view('tools.spinningWheel', compact('students'));
    }

    // Class maker functions
    public function classMaker()
    {
        return view('tools.classMaker');
    }

    public function selectclassMaker($classroom)
    {
        return redirect()->route('groupMaker', $classroom);
    }

    public function groupMaker($classroom)
    {
        $students = User::where('classroom_id', $classroom)->count();
        return view('tools.groupMaker', compact('students', 'classroom'));
    }

    public function getStudentInGroup(Request $request)
    {
        $numberMaker = (int) $request->numberMaker;
        $classroomId = $request->classroom;

        $classroom = ClassRoom::with(['students'])->findOrFail($classroomId);
        $students = $classroom->students->shuffle();

        $totalStudents = $students->count();
        if ($numberMaker <= 0) {
            return response()->json(['html' => "<p class='text-danger'>يجب إدخال رقم صحيح أكبر من صفر.</p>"]);
        }

        $number_group = ceil($totalStudents / $numberMaker);

        $view = view("tools.htmlGroup", [
            'students' => $students,
            'number_group' => $number_group,
            'numberMaker' => $numberMaker
        ])->render();

        return response()->json(['html' => $view]);
    }
}