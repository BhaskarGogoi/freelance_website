<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Booking;
use App\Models\PackageBookings;
use App\Models\Package;
use App\Models\Category;
use App\Models\HomeService;
use Illuminate\Support\Facades\DB;
use App\Models\City;



class JobsController extends Controller
{
    public function viewJobs(){
        $users = Auth::user();
        $job_profile =  HomeService::where('user_id', $users->id)->first();
        $bookings = Booking::where('assigned_to', $job_profile->job_profile_id)->orderBy('booking_id', 'DESC')->get();
        
        return view('userDashboard.jobs')->with('bookings', $bookings);
    }
    public function JobDetails($id){
        if($id){
            $bookings = DB::table('bookings')
                ->join('cities', 'bookings.city', '=', 'cities.id')
                ->where('bookings.booking_id', $id)
                ->first();
            $city = City::where('id', 1)->first();
            $user = Auth::user()->where('id', $bookings->user_id)->first();
            $package_booking_ref_no = $bookings->package;
            //getting package details
            $package = DB::table('package_bookings')
            ->join('bookings', 'package_bookings.booking_ref', '=', 'bookings.package')
            ->where('package_bookings.booking_ref', $package_booking_ref_no)
            ->get();

             //calculate total amount
            $total  = 0;
            foreach($package as $amount){
                $total = $total + $amount->price;
            }
            return view("userDashboard.job-details")->with([
                'bookings'  => $bookings,
                'user'      => $user,
                'package'   => $package,
                'city'      => $city,
                'totalPrice' => $total
            ]);
        }else {
            echo "Something went wrong!";
        }
    }

    public function JobAction(Request $request){
        $request->validate([
            "booking_id"          =>  "required | integer",
            "action"              =>  "required | string"
        ]);
        if($request->action == 'Completed'){
            $success = Booking::where('booking_id', $request->booking_id)
                ->update([
                    'status' => 'Completed'
                ]
            );
        }
        if($success){
            return redirect('/jobs');
        }else {
            return abort(500);
        }
    }
}
