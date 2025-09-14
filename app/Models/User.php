<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Yadahan\AuthenticationLog\AuthenticationLogable;
use Laratrust\Traits\LaratrustUserTrait;
use Octopy\LaraPersonate\Models\Impersonate;
use DB;

class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;
    use Notifiable, AuthenticationLogable;
    use Impersonate;


//    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'email',
        'password',
        'btc','phone',
        'new_password',
        'avatar',
        'is_active',
        'city',
        'pass','cur',
        'withdrawable',
        'can_withdraw',
        'can_upgrade','msg',
        'balance',
        'bonus',
        'source',
        'status',
        'trader_request',
        'manager_id','webhook',
        'can_trade','plan_id',
        'fee','profit','about','j_first_name','j_last_name','j_email','j_country','j_phone',
        'country', 'address', 'permanent_address', 'postal', 'dob','first_name','last_name','account_officer','phone_code',
        'plan','can_add_fund','google2fa_secret','can_refer',"last_seen" , "archive_customer?"
    ];

    protected $appends = ['name','cur_sym','online'];

    protected $hidden = [
        'password',
        'remember_token',
        'admin_notifications'
    ];

    protected $with = ['identity','currency', 'notes'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'can_trade' => 'integer',
        'balance' => 'float',
        'admin_notifications' => 'array',
    ];

    public function getAdminNotificationsAttribute() {
        return json_decode($this->attributes['admin_notifications']) ?? [];
    }

    public function totalProfit(){
        return Trade::whereUserId($this->id)->sum('profit');
    }

    public function trades(){
        return $this->hasMany(Trade::class);
    }

    public function manager(){
        return $this->belongsTo(User::class,'manager_id');
    }

    public function watchlists () {
        return $this->hasMany(Watchlist::class);
    }

    public function notes () {
        return $this->hasMany(Note::class)->orderByDesc('created_at');
    }

    public function statusrecord () {
        return $this->belongsTo(Status::class, 'status');
    }

    public function sourcerecord () {
        return $this->belongsTo(Source::class, 'source');
    }

    public function getPlanAtrribute(){
        return 'Starter';
    }

    public function getPhoneAtrribute(){
        return $this->phone_code.$this->phone;
    }

   /* public function getOnlineAttribute(){
        if($this->last_seen >= Carbon::now('Europe/London')->format('Y-m-d H:i:s')){
            return 1;
        }else{
            return 0;
        }
    } */

    public function getOnlineAttribute(){
        if($this->session_id !== "NULL" && $this->no_of_logins > 0){
            return 1;
        }else{
            return 0;
        }
    }


    public function getCurSymAttribute(){
        if($this->currency){
            return $this->currency->sign;
        }else{
            return '$';
        }
    }

    public function deposits(){
        return $this->hasMany(Deposit::class,'user_id');
    }

    public function canImpersonate() : bool
    {
        // example
        if($this->hasRole(['admin','superadmin'])){
            return true;
        }else{
            return false;
        }
    }

    public function canBeImpersonated() : bool
    {
        // example
        if($this->hasRole(['user','manager', 'retention'])){
            return true;
        }else {
            return false;
        }
    }

    public function plans(){
        return $this->hasMany(UserPlan::class,'user_id');
    }
    public function currency(){
        return $this->belongsTo(Currency::class,'cur','code');
    }

    public function activePlans(){
        return $this->hasMany(InvProfit::class,'user_id');
    }

    public function accounts(){
        return $this->hasMany(Account::class,'user_id');
    }

    public function wireAccounts(){
        return $this->hasMany(WireAccount::class,'user_id');
    }

    public function identity(){

        return $this->hasOne(Identity::class);

    }
//    public function plan(){
//
//        return $this->hasOne(Package::class,'id','plan_id');
//
//    }

    public function invested(){
        return  UserPlan::whereUserId($this->id)->sum('amount');
    }

    public function invEarning(){
        return  UserPlan::whereUserId($this->id)->whereStatus(2)->sum('earned');
    }

    public function lockedInvFund(){
        return  UserPlan::whereUserId($this->id)->whereStatus(1)->sum('amount');
    }

    public function activeInvested(){
        return  InvProfit::whereUserId($this->id)->whereStatus(1)->sum('amount');
    }

    public function activeInvestedProfit(){
        return  InvProfit::whereUserId($this->id)->whereStatus(1)->sum('profit');
    }

    public function pendingInvested(){
        return  UserPlan::whereUserId($this->id)->whereStatus(0)->sum('amount');
    }

    public function totalDeposit(){
        return  Deposit::whereUserId($this->id)->sum('amount');
    }

    public function myWithdrawals() {
        return $this->hasMany(Withdrawal::class, 'user_id');
    }

    public function withdrawals(){
        return '$'. Withdrawal::whereUserId($this->id)->whereApproved(1)->sum('amount');
    }

    public function getNameAttribute(){
        if(!$this->first_name && !$this->last_name){
            return "N/A";
        }else{
            return $this->first_name.' '.$this->last_name;
        }
    }

    public function balance(){
        return $this->balance;
    }
    public function profit(){
        return $this->balance;
    }

    public function aBalance(){
        return $this->balance - $this->bonus - $this->pnl;
    }

    public function total(){
        return $this->withdrawable + $this->balance . ' USD';
    }

    public function bonus(){
        return $this->bonus . ' USD';
    }


    public function getAvatarAttribute($value) {
        if(!$this->attributes['avatar']) {
            $colors = ['E91E63', '9C27B0', '673AB7', '3F51B5', '0D47A1', '01579B', '00BCD4', '009688', '33691E', '1B5E20', '33691E', '827717', 'E65100',  'E65100', '3E2723', 'F44336', '212121'];
            $background = "FF7700";
            return "https://ui-avatars.com/api/?size=256&background=".$background."&color=fff&name=".urlencode($this->name);
        }

        return asset($this->attributes['avatar']);
    }

    public function getBalanceAttribute($bal) {
        if(setting('separate_bonus', 'no') == 'yes'){
            return $bal;
        }else{
            return $bal + $this->bonus + $this->pnl;

        }
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before deletenotes method call this
             $user->notes()->delete();
        });
    }

    public function scopeSearch($query, $request) {
        if ($request->filled('q')) {
            $query = $query->where(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'like', "%" . $request->q . "%")
                        ->orWhere('email', 'like', "%$request->q%")
                        ->orWhere('phone', 'like', "%$request->q%");
        }

        if ($request->filled('status')) {
            $query = $query->where('status', $request->status);
        }

        if ($request->filled('source')) {
            $query = $query->where('source', $request->source);
        }

        if ($request->filled('manager')) {
            $query = $query->where('manager_id', $request->manager);
        }

        return $query;
    }
}
