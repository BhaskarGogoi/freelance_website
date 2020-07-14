<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\HomeService;
use App\Models\City;
use App\Models\FreelanceProfile;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Booking;
use App\Jobs\OrderCompleteSMS;
use App\Jobs\BookingDetailsToAdmin;
use App\Mail\OrderComplete;
use Illuminate\Support\Facades\Mail;


class FreelanceController extends Controller
{
    public function index($category){
        $category_info = Category::where('category_name', $category)->first();
        // $job_profile = HomeService::select('firstname', 'lastname')->where('category_id', $category_info->id)->get();

        $job_profile = DB::table('home_services')
            ->join('freelance_profiles', 'home_services.job_profile_id', 'freelance_profiles.job_profile_id')
            ->where('category_id', $category_info->id)
            ->where('status', 'Accepted')
            ->get();
        
        return view('userDashboard.freelance-services')->with([
            'profiles'   => $job_profile,
            'html_title' => $category
        ]);
        
    }

    public function service_details($id){
        $job_profile = DB::table('home_services')
            ->join('freelance_profiles', 'home_services.job_profile_id', 'freelance_profiles.job_profile_id')
            ->where('home_services.job_profile_id', $id)
            ->where('status', 'Accepted')
            ->first();
        $city = City::all();
        $users = Auth::user();
        $category= Category::where('id', $job_profile->category_id)->first();
        return view('userDashboard.freelance-service-details')->with([
            'profile'   => $job_profile,
            'city'      => $city,
            'phone'     => $users->phone,
            'category'  => $category,
        ]);
    }

    public function book(Request $request){
        $request->validate([
            "category"          =>  "required",
            "address"           =>  "required | string",
            "landmark"          =>  "nullable | string",
            "city"              =>  "required",
            "pincode"           =>  "required | digits:6",
            "phone"             =>  "required | digits:10",
            "alt_phone"         =>  "nullable | digits:10",
            "describe"          =>  "nullable | string",
            "profile_id"        =>  "required | integer",
        ]);
        $user = Auth::user();
        /**
         * Formatting date from YYYY-MM-DD to DD-MM-YYYY
         */
        $formated_date = date('d-m-Y', strtotime($request->date));

        $data = new Booking;
        $data->user_id = $user->id;
        $data->category = $request->category;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->pin = $request->pincode;
        $data->landmark = $request->landmark;
        $data->phone = $request->phone;
        $data->alt_phone = $request->alt_phone;
        $data->date = $formated_date;
        $data->description = $request->describe;
        $data->assigned_to = $request->profile_id;
        $data->status = "Assigned";

        $success = $data->save();
        if($success){
            Mail::to($user->email)->send(new OrderComplete($user));
            OrderCompleteSMS::dispatch($user->phone)->delay(now()->addSeconds(1));
            BookingDetailsToAdmin::dispatch(
                $request->category,
                $user->name,
                $request->phone
                )->delay(now()->addSeconds(1));
            return redirect('/my-account')->with('status', 'Booking Successfull!');
        }else{
            return redirect('/my-account')->with('status', 'Something Went Wrong!');
        }
    }
}
