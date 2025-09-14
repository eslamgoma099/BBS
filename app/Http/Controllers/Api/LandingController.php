<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Role;
use App\Http\Resources\UserCollection;
use App\Models\User;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;

class LandingController extends Controller
{
    

    




    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'username' => 'required|max:50|min:3|unique:users',
            'first_name' => 'required|max:50|min:3',
            'last_name' => 'required|max:50|min:3',
            'phone' => 'required|max:15|unique:users,phone',
            'email' => 'required|max:50|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->all(), 422);
        }

        $data = $request->all();
       $data['password'] ="hhhhhh";
        
        $user = User::create($data);

        // $user->attachRole($role);
        // login user
        try {
            

            return $this->successResponse("Your data has been registered.");
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->errorResponse('Could not create token', 500);
        }
    }

 

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'user' => $this->guard('api')->user(),
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function updateOnline(){
        $user = auth('api')->user();
        $user->last_seen = Carbon::now()->addMinutes(5);
        $user->save();
        return response()->json($user);
    }

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current_password'), auth()->user()->password))) {
            // The passwords matches
            return response()->json('Your current password does not matches with the password you provided. Please try again.', 500);
        }
        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            return response()->json('New Password cannot be same as your current password. Please choose a different password', 500);
        }
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6',
        ]);
        //Change Password
        $user = auth()->user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return response()->json('success');
    }

    public function guard() {
        return \Auth::Guard('api');
    }

    protected function getData(Request $request)
    {
        $rules = [
            'username' => 'required|max:50|min:3|unique:users',
            'first_name' => 'required|max:50|min:3',
            'last_name' => 'required|max:50|min:3',
            'country' => 'nullable',
            'phone' => 'required|min:3|unique:users',
            'email' => 'required|max:50|email|unique:users',
            'password'  => 'required|min:6',
            'repeatPassword' => 'required|same:password',
            'city'  => 'nullable',
            'address'  => 'nullable',
            'permanent_address'  => 'nullable',
            'cur'  => 'required',
        ];
        $data = $request->validate($rules);
        $data['can_trade'] = 1;
        return $data;
    }
    protected function updateData(Request $request)
    {
        $rules = [
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3',
            'country' => 'nullable',
            'city'  => 'nullable',
            'address'  => 'nullable',
            'permanent_address'  => 'nullable',
            'cur'  => 'nullable',
        ];
        return $request->validate($rules);
    }

    protected function getCData(Request $request)
    {
        $rules = [
            'username' => 'required|min:3|unique:users',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'country' => 'nullable',
            'phone' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:6',
            'city'  => 'nullable',
            'address'  => 'nullable',
            'permanent_address'  => 'nullable',
            'cur'  => 'required',
        ];
        $data = $request->validate($rules);
        $data['can_trade'] = 1;
        return $data;
    }


    public function destroy($id)
    {
        $user = User::destroy($id);
        return response()->json($user);
    }

}
 