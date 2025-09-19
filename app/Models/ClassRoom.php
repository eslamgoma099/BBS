<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassRoom extends Model
{
    use SoftDeletes;

    protected $table = 'class_rooms';

    protected $fillable = [
        'name',
        'grade_id',
        'teacher_id',
        'description',
        'max_students',
        'is_active'
    ];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'is_active' => 'boolean',
        'max_students' => 'integer'
    ];

    public function grade()
    {
        return $this->belongsTo(GradeYear::class, 'grade_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function students()
    {
        return $this->hasMany(User::class, 'classroom_id');
    }

    public function pointClasses()
    {
        return $this->hasMany(PointClass::class, 'classroom_id');
    }

    public function studentPoints()
    {
        return $this->hasMany(StudentPoint::class, 'classroom_id');
    }
}