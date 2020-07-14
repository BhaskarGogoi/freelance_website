<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Category;
use App\Models\HomeService;
use App\Models\City;
use Auth;

class DashboardController extends Controller
{
    public function index() {

        $totalRegistered = Auth::user()::where('usertype', "user")->get();
        $totalRegisteredUsers = $totalRegistered->count();

        $partners = Auth::user()::where('profile_created', "1")->where('usertype', "user")->get();
        $partners_count = $partners->count();

        $customers = Auth::user()::where('profile_created', "0")->where('usertype', "user")->get();
        $customers_count = $customers->count();
        
        //Bookings summery
        $new_bookings = Booking::where('status', 'Pending')->get();
        $new_bookings_count = $new_bookings->count();

        $cancelled_bookings = Booking::where('status', 'Cancelled')->get();
        $cancelled_bookings_count = $cancelled_bookings->count();

        $assigned_bookings = Booking::where('status', 'Assigned')->get();
        $assigned_bookings_count = $assigned_bookings->count();

        $completed_bookings = Booking::where('status', 'Completed')->get();
        $completed_bookings_count = $completed_bookings->count();

        $total_bookings = Booking::all();
        $total_bookings_count = $total_bookings->count();

        //End Booking Summery

        //Job profiles summery
        $unverified_job_profiles = HomeService::where('status', 'Pending')->get();
        $unverified_job_profiles_count = $unverified_job_profiles->count();

        $verified_job_profiles = HomeService::where('status', 'Accepted')->get();
        $verified_job_profiles_count = $verified_job_profiles->count();

        $rejected_job_profiles = HomeService::where('status', 'Rejected')->get();
        $rejected_job_profiles_count = $rejected_job_profiles->count();

        $total_job_profiles = HomeService::all();
        $total_job_profiles_count = $total_job_profiles->count();
        //End Job profiles summery

        $booking = DB::table('bookings')
        ->join('cities', 'bookings.city', '=', 'cities.id')
        ->join('users', 'bookings.user_id', '=', 'users.id')
        ->orderBy('booking_id','DESC')
        ->take(10)->get();

        return view('admin.dashboard')->with(array(
            'booking' => $booking, 
            'new_bookings_count' => $new_bookings_count,
            'assigned_bookings_count' => $assigned_bookings_count,
            'cancelled_bookings_count' => $cancelled_bookings_count,
            'completed_bookings_count' => $completed_bookings_count,
            'total_bookings_count' => $total_bookings_count,

            'unverified_job_profiles_count' => $unverified_job_profiles_count,
            'verified_job_profiles_count' => $verified_job_profiles_count,
            'rejected_job_profiles_count' => $rejected_job_profiles_count,
            'total_job_profiles_count' => $total_job_profiles_count,
            'totalRegisteredUsers' => $totalRegisteredUsers,
            'partners_count' => $partners_count,
            'customers_count' => $customers_count
        ));
    }
}
