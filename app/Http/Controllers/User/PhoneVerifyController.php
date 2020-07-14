<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\PhoneVerifyOtp;
use App\Jobs\PhoneVerifyOtpSMS;

class PhoneVerifyController extends Controller
{
    public function index(){
        $user = Auth::user();
        if($user->phone_verified == 0){
            return view('userDashboard.verify-phone');
        }else{
            return redirect('/my-account')->with('status', 'Your phone number is already verified.');
        }
    }
    
    public function sendOTP(){
        function generateRandomString($length = 20) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $user = Auth::user();
        $ref = generateRandomString();
        $generate_otp=rand(100000,999999);
        $otp = new PhoneVerifyOtp;
        $otp->user_id = $user->id;
        $otp->otp = $generate_otp;
        $otp->ref = $ref;
        $otp->save();
      
        PhoneVerifyOtpSMS::dispatch($user->phone, $generate_otp)
                ->delay(now()->addSeconds(3));
        return redirect('verifyPhone')->with('status', 'OTP successfully sent to your mobile.');       
    }
    public function verifyOtp(Request $request){
        $request->validate([
            "otp"          =>  "required | digits:6"
        ]);
        $user = Auth::user();
        $otp = PhoneVerifyOtp::where('user_id', $user->id)->latest()->first();
        if($request->otp == $otp->otp){
            $success = Auth::user()->where('id', $user->id)
            ->update([
                'phone_verified' =>  '1'
            ]);
            if($success){
                return redirect('/my-account')->with('status', 'Your phone number is successfully verified.');
            }else{

            }
        }else{
            return redirect('verifyPhone')->with('status', 'OTP Not Matched');       
        }
        
    }
}
