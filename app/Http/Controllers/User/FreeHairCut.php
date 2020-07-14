<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\City;
use App\Models\Booking;
use Carbon\Carbon;
use App\Mail\OrderComplete;
use Illuminate\Support\Facades\Mail;
use App\Jobs\OrderCompleteSMS;

class FreeHairCut extends Controller
{
    public function index(){
        $user = Auth::user();
        $if_user_exists = Booking::where([
                'user_id' => $user->id,
                'category' => 'Free-Hair-Cut'
            ])->first();
        $city = City::all();
        $users = Auth::user();
        if(!$if_user_exists){
            return view('userDashboard.free-haircut')->with(array(
                'city' => $city, 
                'phone' => $users->phone,
            )); 
        }else {
            return view('userDashboard.daily-quota')->with(
                'showQuotaOver' , '0'
            );
        }       
    }
    public function book(Request $request){
        $request->validate([
            "address"           =>  "required | string",
            "landmark"          =>  "nullable | string",
            "city"              =>  "required",
            "pincode"           =>  "required | digits:6",
            "phone"             =>  "required | digits:10",
            "alt_phone"         =>  "nullable | digits:10",
            "describe"          =>  "nullable | string"
        ]);
        
        // $booking = Booking::where([
        //         'date' => $request->date,
        //         'category' => 'Free-Hair-Cut'
        //     ])->count();
        $booking = Booking::whereDate('created_at', Carbon::today())->where('category', 'Free-Hair-Cut')->count();
        $user = Auth::user();
        $if_user_exists = Booking::where([
                'user_id' => $user->id,
                'category' => 'Free-Hair-Cut'
            ])->first();

        if($booking >= 1){
            return view('userDashboard.daily-quota')->with(
                'showQuotaOver' , '1'
            );
        }else{
            if(!$if_user_exists){
                $users = Auth::user();
                $data = new Booking;
                $data->user_id = $users->id;
                $data->category = 'Free-Hair-Cut';
                $data->address = $request->address;
                $data->city = $request->city;
                $data->pin = $request->pincode;
                $data->landmark = $request->landmark;
                $data->phone = $request->phone;
                $data->alt_phone = $request->alt_phone;
                $data->package = 0;                        // 1 = ordered with package
                $data->description = $request->describe; 
                $data->date = 'Today';
                $success = $data->save();
    
                if($success){
                    $user = Auth::user();
                    Mail::to($user->email)->send(new OrderComplete($user->phone));
                    OrderCompleteSMS::dispatch($user->phone)
                        ->delay(now()->addSeconds(3));
                        return redirect('/my-account')->with('status', 'Booking Successfull!');
                } else{
                    return redirect('/my-account')->with('status', 'Something Went Wrong!');
                }
            } else{
                return view('userDashboard.daily-quota')->with(
                    'showQuotaOver' , '0'
                );
            }
        }
    }
}
