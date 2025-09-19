<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradeYear extends Model
{
    use SoftDeletes;

    protected $table = 'grade_years';

    protected $fillable = [
        'name',
        'description',
        'level',
        'is_active'
    ];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'is_active' => 'boolean',
        'level' => 'integer'
    ];

    public function classRooms()
    {
        return $this->hasMany(ClassRoom::class, 'grade_id');
    }
}