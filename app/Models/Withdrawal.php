<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $appends = ['commission_fee','tax_fee','cot_fee'];
    protected $fillable = [
        'user_id','processed','commission','tax','cost_of_transfer','commission_proof','tax_proof','cot_proof',
'amount','note',
'wallet',
'status','account_id',
'method',
'approved','type'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function account()
    {
        return $this->belongsTo(Account::class,'account_id');
    }
    public function getCommissionFeeAttribute(){
        $amount = ($this->amount * setting('withdrawal_commission', 20)) / 100;
        return '$'.$amount;
    }
    public function getTaxFeeAttribute(){
        $amount = ($this->amount * setting('withdrawal_tax', 20)) / 100;
        return '$'.$amount;
    }
    public function getNoteAttribute($value){
        if(!$value){
            if(!$this->processed){
                return 'processing withdrawal';
            }elseif (!$this->approved){
                return 'awaiting approval';
            }else{
                return 'approved';
            }
        }else{
            return $value;
        }
    }
    public function getCotFeeAttribute(){
        $amount = ($this->amount * setting('withdrawal_cot', 20)) / 100;
        return '$'.$amount;
    }
}
