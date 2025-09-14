<?php

namespace App\Http\Controllers;

use App\Models\InvProfit;
use App\Models\Package;
use App\Models\User;
use App\Models\Certificate;
use App\Models\UserCertificate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class certificatesController extends Controller
{
    public function index()
    {
        $plans = Certificate::all();
        $certificates = $this->HandelResponseCertificates();
       
        return view('backend.Certificates.index', compact('plans','certificates'));
    }
    public function HandelResponseCertificates(){
        
       $certificates =  UserCertificate::whereUserId(auth()->id())->get();
      $data = [
            'data'=>[],
            'profit'=>0,
            'accepted'=>0,
            'rejected'=>0,
        ];
       foreach($certificates as $certificate){
            $data['data'][] = [
                'name'=>$certificate->certificate->name,
                'amount'=>$certificate->certificate->amount,
                'duration'=>$this->getDuration($certificate->duration),
                'period'=>$this->getPeriod($certificate->period),
                'start'=>$certificate->start_date,
                'expired'=>$certificate->end_date,
                'profit'=>number_format($certificate->total,2,",","."),
                'total'=>$certificate->total,
                'profit_day'=>$certificate->profit,
                'status'=>$certificate->status_text
            ];
             $data['profit'] +=$certificate->total;
             if($certificate->status == 1){
                 $data['accepted'] += 1;
             }
             
              if($certificate->status == 3){
                 $data['rejected'] += 1;
             }
       }
       $data['profit'] = number_format($data['profit'],2,",",".");
       return $data;
    }
    
       public function getDuration($value){
           return $value."year";
           
        // switch($value) {
        //     case '1':
        //         return "year";
        //         break;
        //     case '2':
        //         return "2 years";
        //         break;
        //     case '3':
        //     return "3 years";
        //             break;
        //         default:
        //         return "unknown";
        //         }
    }
    public function getPeriod($value){
        switch($value) {
            case '1':
                return "monthly";
                break;
            case '2':
                return "quarterly";
                break;
                case '3':
                    return "Semi-annually";
                    break;
                default:
                return "annually";
                }
    }
    
    
    public function store(Request $request){
        //  $request->validate([
        //      'duration'=>"required",
        //      'amount'=>"required",
        //      'distribution_period'=>'required',
        //      'certificates_id'=>"required|numeric|exists:certificates,id",    
        //      'user_id'=>"required|numeric|exists:users,id",    
        // ]);
        
        $certificate = Certificate::find($request->id);
        if(auth()->user()->balance < ($certificate->duration * $certificate->amount)){
            return redirect()->back()->with(['message'=>"your balance less than of value certificate" . $certificate->name]);
        }
        UserCertificate::create([
                'certificates_id'=>$certificate->id,
                'user_id'=>auth()->user()->id,
                'amount'=>$certificate->amount,
                'duration'=>$request->duration,
                'profit'=> $certificate->amount * ($certificate->average/100),
                'period'=>$request->distribution_period,
                'start_date'=>date('Y-m-d'),
                "end_date"=>date('Y-m-d',strtotime("+".$request->duration."year",strtotime(date("Y-m-d"))))
            ]);
            
            $user = User::find(1);
            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('mails.newuser', ['user' => $user], function($message)
            {
                $message
                    ->from(env('MAIL_FROM_ADDRESS'))
                    ->to(setting('admin_email','bitrxsupcrm@gmail.com'), 'Admin')
                    ->subject('New user account on '.env('APP_NAME'));
            });
        
        
        return redirect()->back()->with(['message'=>"Certificate In Process " . $certificate->name]);
    }
 

    public function getDifInDays($start, $end){
        $to = Carbon::createFromFormat('Y-m-d', $end);
        $from = Carbon::createFromFormat('Y-m-d', $start);
        return $to->diffInDays($from);
    }

    protected function getData(Request $request)
    {
        $rules = [
            'plan_id' => 'required',
            'unit' => 'required',
            'amount' => 'required',
        ];
        return $request->validate($rules);
    }

}
