<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentPoint extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'student_id',
        'point_id',
        'point',
        'teacher_id',
        'classroom_id',
        'reason',
        'date_awarded'
    ];

    protected $dates = ['deleted_at', 'date_awarded'];

    protected $casts = [
        'date_awarded' => 'datetime'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function point()
    {
        return $this->belongsTo(Points::class, 'point_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class, 'classroom_id');
    }
}