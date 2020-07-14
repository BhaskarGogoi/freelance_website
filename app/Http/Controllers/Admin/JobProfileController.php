<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Models\HomeService;
use App\Models\Category;
use App\Models\FreelanceProfile;
use App\Jobs\SendApplicationStatusSMS;

class JobProfileController extends Controller
{   
    public function indexCategory(){
        $categories = Category::all();
        return view('admin.category')->with('categories', $categories);
    }
    // public function index() {
    //     $jobprofiles = Jobprofile::all();
    //     return view('admin.job-profiles')->with('jobprofiles', $jobprofiles);

    // }
    // $users = DB::table('users')
    //         ->join('contacts', 'users.id', '=', 'contacts.user_id')
    //         ->join('orders', 'users.id', '=', 'orders.user_id')
    //         ->select('users.*', 'contacts.phone', 'orders.price')
    //         ->get();
    public function job_profile_new(){
        $jobprofiles = DB::table('home_services')
            ->join('categories', 'home_services.category_id', '=', 'categories.id')
            ->where('home_services.status', "Pending")
            ->paginate(20);
        return view('admin.job-profiles')->with('jobprofiles', $jobprofiles);
    }
    public function job_profile_accepted(){
        $jobprofiles = DB::table('home_services')
            ->join('categories', 'home_services.category_id', '=', 'categories.id')
            ->where('home_services.status', "Accepted")
            ->paginate(20);
        return view('admin.job-profiles')->with('jobprofiles', $jobprofiles);
    }
    public function job_profile_rejected(){
        $jobprofiles = DB::table('home_services')
            ->join('categories', 'home_services.category_id', '=', 'categories.id')
            ->where('home_services.status', "Rejected")
            ->paginate(20);
        return view('admin.job-profiles')->with('jobprofiles', $jobprofiles);
    }
    public function job_profile_disqualified(){
        $jobprofiles = DB::table('home_services')
            ->join('categories', 'home_services.category_id', '=', 'categories.id')
            ->where('home_services.status', "Disqualified")
            ->paginate(20);
        return view('admin.job-profiles')->with('jobprofiles', $jobprofiles);
    }

    public function view_profile_details($id){
        $jobprofile = DB::table('home_services')
            ->join('categories', 'home_services.category_id', 'categories.id')
            ->join('cities', 'home_services.city', '=', 'cities.id')
            ->join('users', 'home_services.user_id', '=', 'users.id')
            ->where('home_services.job_profile_id', $id)
            ->first();
        $category = Category::where('id', $jobprofile->category_id)->first();
        if($category->category_type == 'freelance'){
            $freelance_profile = FreelanceProfile::where('job_profile_id' , $jobprofile->job_profile_id)->first();
            return view('admin.job-profile-details')->with([
                'jobprofile'    => $jobprofile,
                'freelance'     => 1,
                'freelance_profile' => $freelance_profile
            ]);
        } else{
            return view('admin.job-profile-details')->with([
                'jobprofile'    => $jobprofile,
                'freelance'     => 0
            ]);
        }
        
    }

    public function action(Request $request){
        if($request->status == "Accepted"){
            $request->validate([
                "job_profile_id"          =>  "required",
                "firstname"          =>  "required | string",
                "lastname"          =>  "required | string",
                "address"          =>  "required | string",
                "pincode"          =>  "required | digits:6"
            ]);
            HomeService::where('job_profile_id', $request->job_profile_id)
            ->update([
                'status' => $request->status, 
                'comment' => "",
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'address' => $request->address,
                'pincode' => $request->pincode
            ]);
            
            $jobprofile = HomeService::where('job_profile_id', $request->job_profile_id)->first();
    
            $users = Auth::user()::where('id', $jobprofile->user_id)->first();
            $name = $users->name;
            $phone = $users->phone;

            //sms
           
            SendApplicationStatusSMS::dispatch($name, $phone)
                ->delay(now()->addSeconds(3));

            return redirect()->back()->with('status', 'Form Successfully Accepted!');

        } elseif($request->status == "Rejected"){
            HomeService::where('job_profile_id', $request->job_profile_id)
            ->update(['status' => $request->status, 'comment' => $request->reason] );
            return redirect()->back()->with('status', 'Form Successfully Rejected!');
        } elseif($request->status == "Disqualified"){
            HomeService::where('job_profile_id', $request->job_profile_id)
            ->update(['status' => $request->status, 'comment' => $request->reason] );
            return redirect()->back()->with('status', 'Form Successfully Disqualified!');
        }
        
    }
}
