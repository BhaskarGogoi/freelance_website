<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Jobprofile;
use App\Models\City;
use App\Models\Category;
class DashboardController extends Controller
{
    public function checkProfileCreated(){
        $users = Auth::user();
        if($users->profile_created == 1){
            $jobprofile = Jobprofile::where('user_id', $users->id)->first();
            
            $category = Category::where('id', $jobprofile->category_id)->first();
        // $about = Page::where('page', 'about-me')->first();

            return view('userDashboard.dashboard')->with(array(
                'users' => $users,
                'jobprofile' => $jobprofile,
                'category' => $category,
            ));
        } else {
            return view('userDashboard.dashboard')->with('users', $users,); 
        }
        
    }
}
