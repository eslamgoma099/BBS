<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function getStatusAttribute($value)
    {
        if($value == 1){
            return 'approved';
        }else if ($value == 0){
            return 'pending';
        } else {
            return 'disapproved';
        }
    }
    public function getFrontAttribute($value)
    {
        if($value){
            return asset('storage/'.$value);
        }
        return null;
    }
    public function getBackAttribute($value)
    {
        if($value){
            return asset('storage/'.$value);
        }
        return null;
    }
    public function getCreditCardFrontAttribute($value)
    {
        if($value){
            return asset('storage/'.$value);
        }
        return null;
    }
    public function getCreditCardBackAttribute($value)
    {
        if($value){
            return asset('storage/'.$value);
        }
        return null;
    }
    public function getProofOfAddressAttribute($value)
    {
        if($value){
            return asset('storage/'.$value);
        }
        return null;
    }
}
