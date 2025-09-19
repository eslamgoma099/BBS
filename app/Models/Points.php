<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Points extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'teacher_id',
        'name',
        'grade',
        'type',
        'description',
        'icon',
        'color'
    ];

    protected $dates = ['deleted_at'];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function studentPoints()
    {
        return $this->hasMany(StudentPoint::class, 'point_id');
    }

    public function pointClasses()
    {
        return $this->hasMany(PointClass::class, 'point_id');
    }
}