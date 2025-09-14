<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class LeadImport implements ToCollection,  WithHeadingRow
{
    /**
    * @param Collection $row
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
        //  $items=  explode(";",$row['emailphonefirst_namelast_namesourcecountryaddress']);
        //  $email=$items[0]??'';
        //  $phone=$items[1]??'';
        //  $first_name=str_replace('"',"",$items[2]);
        //  $last_name=str_replace('"',"",$items[3]??'');
        //  $source=$items[4]??'';
        // $country=$items[5]??'';
        // $address=$items[6]??'';
         
         
            // dd($row);
            // $username = strlen($row['username']) > 2 ? $this->clean($row['username']) : $this->clean($row['email']);
            $exist = User::select('email','phone')->where('email',$this->clean($row['email']))->orWhere('phone',$this->clean($row['phone']))->first();
            // $exist = User::select('email','phone','username')->where('email',$this->clean($row['email']))->orWhere('phone',$this->clean($row['phone']))->orWhere('username', $username)->first();
           //$exist = User::select('email','phone')->where('email',$email)->orWhere('phone',$phone)->first();
            // if(!empty($phone) && isset($email) && !$exist){
               
            //   $user = User::create([
            //         'country'    =>  $country,
            //         'address'    =>  $address,
            //         'email'    =>  $email,
                    
            //         'first_name'    =>  $first_name,
            //         'last_name'    =>  $last_name,
            //         'phone'    =>  $phone,
            //         'source'    =>  $source??1,
            //         'is_active' => true,
            //         'can_trade' => 1,
            //         'password' => bcrypt('password'),
            //     ]);

            //     $user->attachRole('lead');
            // }
            if(isset($row['phone']) && isset($row['email']) && !$exist){
              $user = User::create([
                    'country'    =>  $this->clean($row['country']),
                    'address'    =>  $this->clean($row['address']),
                    'email'    =>  $this->clean($row['email']),
                    
                    'first_name'    =>  $this->clean($row['first_name']),
                    'last_name'    =>  $this->clean($row['last_name']),
                    'phone'    =>  $this->clean($row['phone']),
                    'source'    =>  isset($row['source']) ? $this->clean($row['source']) :  1,
                    'is_active' => true,
                    'can_trade' => 1,
                    'password' => bcrypt('password'),
                ]);

                $user->attachRole('lead');
            }

        }
    }

    public function clean($item){
        return str_replace('"','',$item);
    }
}
