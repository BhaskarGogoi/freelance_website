<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\HomeService;
use App\Models\Category;
use App\Models\City;
use App\Models\FreelanceProfile;
use App\Jobs\PartnerAppliedSuccessSMS;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;


class JobProfileController extends Controller
{
    function is_created(){
        $users = Auth::user();
        if($users->profile_created == 0){
            $home_service = DB::table('categories')
                ->where('categories.category_type', "home_service")
                ->get();
            $freelance = DB::table('categories')
                ->where('categories.category_type', "freelance")
                ->get();
            $city = City::all();
            return view('userDashboard.create-job-profile')->with(array(
                'home_service' => $home_service, 
                'city' => $city,
                'freelance' => $freelance
            ));         
        } else {
            return redirect('my-account');
        }
    }
    
    function create_job_profile(Request $request){

        $request->validate([
            "category"          =>  "required | string",
            "firstname"         =>  "required | alpha",
            "lastname"          =>  "required | alpha",
            "gender"            =>  "required",
            "city"              =>  "required | string"
        ]);
    
        $users = Auth::user(); //get current userid
        $userid = $users->id;
        $phone = $users->phone;
        DB::beginTransaction();
        try {

            $data = new HomeService;
            $data->user_id = $userid;
            $data->firstname = $request->firstname;
            $data->lastname = $request->lastname;
            $data->gender = $request->gender;
            $data->category_id = $request->category;
            $data->city = $request->city;
            $data->save();

            $users->profile_created = 1;
            $users->save();
            $category_info = DB::table('categories')
                ->where('categories.id', $request->category)->first();
            if($category_info->category_type == 'freelance'){

                //creating a row on freelance_profiles table to store/update image path links
                $data_freelance = new FreelanceProfile;
                $data_freelance->job_profile_id = $data->id;
                $data_freelance->save();
                DB::commit();
                return redirect('/upload-work-sample')->with([
                    'job_profile_id' => $data->id
                ]);
            }else{
                DB::commit();
                PartnerAppliedSuccessSMS::dispatch($phone)
                    ->delay(now()->addSeconds(3));
                return redirect('my-account')->with('jobprofile_created', 'Profile Successfully Created');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/my-account')->with('status', 'Something Went Wrong!');
        } 
    }

    public function upload_work_sample(){
        $user = Auth::user();
        $job_profile = HomeService::where('user_id', $user->id)->first();
        $category = Category::where('id', $job_profile->category_id)->first();
        if($category->category_type == 'freelance'){
            $freelance = FreelanceProfile::where('job_profile_id', $job_profile->job_profile_id)->first();
            if(!empty($freelance->img_1 && $freelance->img_2 && $freelance->img_3)){
                return view('userDashboard.upload-work-sample')->with([
                    'job_profile_id' => $job_profile->job_profile_id,
                    'freelance'      => $freelance,
                    'complete_status'       => 1
                ]);
            } else{
                return view('userDashboard.upload-work-sample')->with([
                    'job_profile_id' => $job_profile->job_profile_id,
                    'freelance'      => $freelance,
                    'complete_status'       => 0
                ]);
            }
            
        }else{
            return redirect('my-account');
        }
    }
    public function upload_work_sample_image(Request $request){
        $request->validate([
            "image"             =>  "required",
            "image_no"          =>  "required | integer",
            "job_profile_id"    =>  "required | integer"
        ]);

        $user = Auth::user();

        $image_file = $request->only('image');
        $file = $image_file['image'];

        // Build the input for validation
        $fileArray = array('image' => $file);

        // Tell the validator that this file should be an image
        $rules = array(
        'image' => 'mimes:jpeg,jpg,png|required'
        );

        $validator = Validator::make($fileArray, $rules);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors(['Invalid file format. Only jpg, jpeg, png are allowed.', 'Invalid file format. Only jpg, jpeg, png are allowed.']);
        } else
        {
            if($request->hasFile('image')) {
                $image       = $request->file('image');
                $image_resize = Image::make($image->getRealPath());              
                // resize the image to a height of 200 and constrain aspect ratio (auto width)
                $image_resize->resize(null, 500, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->insert(public_path('/images/watermark.png'), 'bottom-right', 10, 10);
                $image_name = $user->id . '.' . rand() . '.' . $request->image_no . '.' .$image->getClientOriginalExtension();
                $image_resize->save(public_path('images/freelance_profile_images/' .$image_name), 70);
            }
    
            if($request->image_no ==  1){
                $success = FreelanceProfile::where('job_profile_id', $request->job_profile_id)
                    ->update([
                        'img_1' => $image_name
                    ]
                );
            } elseif ($request->image_no == 2){
                $success =FreelanceProfile::where('job_profile_id', $request->job_profile_id)
                    ->update([
                        'img_2' => $image_name
                    ]
                );
            } elseif($request->image_no == 3){
                $success = FreelanceProfile::where('job_profile_id', $request->job_profile_id)
                    ->update([
                        'img_3' => $image_name
                    ]
                );
            }
            if($success){
                return redirect()->back()->with(['image_upload', 'Success']);
            }else{
                return redirect()->back()->with(['image_upload', 'Failed']);
            }
        };
    }
   
    public function viewProfile(){
        $users = Auth::user(); //get current userid
        $userid = $users->id;
        $jobprofile = DB::table('home_services')
            ->join('categories', 'home_services.category_id', 'categories.id')
            ->join('cities', 'home_services.city', '=', 'cities.id')
            ->where('home_services.user_id', $userid)
            ->first();
        return view('userDashboard.view-profile')->with(
            'jobprofile', $jobprofile
        );
    }

    public function freelance_profile_form_index($profile_id){
        $is_created = HomeService::where('job_profile_id', $profile_id)->first();
        if($is_created){
            return redirect('my-account')->with('status', 'Freelance profile already created!');
        }else{
            return view('userDashboard.create-freelance-profile')->with('profile_id', $profile_id);
        }
    }

    public function create_freelance_profile(Request $request){
        $request->validate([
            "Image1"          =>  "required",
            "Image2"          =>  "required",
            "Image3"          =>  "required",
            "profile_id"      =>  "required | integer"
        ]);
        $users = Auth::user(); //get current userid
        $userid = $users->id;

        $image1 = $request->file('Image1');
        $id['imagename'] = $userid . '.' . rand() . '.' .$image1->getClientOriginalExtension();
        $destination1 = public_path('/images/Freelance-Profile-Images');
        $image1->move($destination1, $id['imagename']);

        $image2 = $request->file('Image2');
        $id2['imagename'] = $userid . '.' . rand() . '.' .$image2->getClientOriginalExtension();
        $destination2 = public_path('/images/Freelance-Profile-Images');
        $image2->move($destination2, $id2['imagename']);

        $image3 = $request->file('Image3');
        $id3['imagename'] = $userid . '.' . rand() . '.' .$image3->getClientOriginalExtension();
        $destination3 = public_path('/images/Freelance-Profile-Images');
        $image3->move($destination3, $id3['imagename']);

        DB::beginTransaction();
        try {
            $data = new FreelanceProfile;
            $data->job_profile_id = $request->profile_id;
            $data->img_1 = $id['imagename'];
            $data->img_2 = $id2['imagename'];
            $data->img_3 = $id3['imagename'];
            $data->save();
           
            HomeService::where('job_profile_id', $request->profile_id)
                ->update([
                    'freelance_profile' => 1
                ]
            );

            DB::commit();
            // $user = Auth::user()->where('id',  $request->user_id)->first();
            // Mail::to($user->email)->send(new OrderComplete($user));
            // OrderCompleteSMS::dispatch($user->phone)->delay(now()->addSeconds(3));
            return redirect('/my-account')->with('status', 'Freelance Profile Created!');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/my-account')->with('status', 'Something Went Wrong!');
        } 
    }

    public function view_freelance_profile($profile_id){
        $freelance_profile = FreelanceProfile::where('job_profile_id', $profile_id)->first();
        return view('userDashboard.view-freelance-profile')->with([
            'img_1'     => $freelance_profile->img_1,
            'img_2'     => $freelance_profile->img_2,
            'img_3'     => $freelance_profile->img_3 
        ]);
    }
}