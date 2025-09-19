<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PointClass extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'classroom_id',
        'point_id',
        'is_active'
    ];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class, 'classroom_id');
    }

    public function point()
    {
        return $this->belongsTo(Points::class, 'point_id');
    }
}