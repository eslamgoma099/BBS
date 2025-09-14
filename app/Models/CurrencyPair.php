<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyPair extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['sy','buy_p','sell_p'];

    protected $casts = [
        'leverage' => 'integer',
        'disabled' => 'boolean'
    ];


    public function getLeverageAttribute($value){
        if($value > 0){
            return $value;
        }else{
            return 1;
        }
    }


    public function buyPrice(){
        $value = ($this->buy_spread * $this->rate) / 100;
        return number_format($value + $this->rate, 2);
    }
    public function sellPrice(){
        $value = ($this->sell_spread * $this->rate) / 100;
        return number_format($this->rate -  $value, 2);
    }

    public function getBaseAttribute($value){
        if($value){
            return strtoupper($value);
        }else{
            return 'USD';
        }
    }

    public function getImageAttribute($value) {
        if(!$value) {
            $colors = ['E91E63', '9C27B0', '673AB7', '3F51B5', '0D47A1', '01579B', '00BCD4', '009688', '33691E', '1B5E20', '33691E', '827717', 'E65100',  'E65100', '3E2723', 'F44336', '212121'];
            $background = $colors[$this->id%count($colors)];
            return "https://ui-avatars.com/api/?size=256&background=".$background."&color=fff&name=".urlencode($this->name);
        }
        return $value;
    }

    public function getSyAttribute(){
        return $this->sym.'USD';
    }
    public function getBuyPAttribute(){
        return $this->buyPrice();
    }
    public function getSellPAttribute(){
        return $this->sellPrice();
    }
}
