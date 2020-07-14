<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referal;
use Auth;

class ReferAndEarnController extends Controller
{
    public function index(){
        $user_id = Auth::user();
        if(Referal::where('user_id', $user_id->id)->exists()){
            $referal_code = Referal::where('user_id', $user_id->id)->first();
            return view('userDashboard.refer-and-earn')->with([
                'is_generated'  => True,
                'referal_code'  => $referal_code->code
            ]);
        }else{
            return view('userDashboard.refer-and-earn')->with([
                'is_generated'  => False,
                'referal_code'  => Null
            ]);
        }
    }

    public function generateRefCode(){
        function generateRandomString($length) {
            $include_chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            /* Uncomment below to include symbols */
            /* $include_chars .= "[{(!@#$%^/&*_+;?\:)}]"; */
            $charLength = strlen($include_chars);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $include_chars [rand(0, $charLength - 1)];
            }
            return $randomString;
        }
        $lenght = 6;
        $randString = generateRandomString($lenght);
        $cond=True;
        while($cond){
            if(Referal::where('code', $randString)->exists())
                $randString = generateRandomString($lenght);
            else{
                $cond = False;
            }
        }
        $user_id = Auth::user();
        $referal = new Referal;
        $referal->user_id = $user_id->id;
        $referal->code = $randString;
        $success = $referal->save();
        if($success){
            return redirect('/refer-and-earn');
        }else{
            return redirect('/refer-and-earn')->with('status', 'Something went wrong!');
        }
    }
}
