<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\City;
use App\Models\Booking;
use App\Models\HomeService;
use App\Models\PackageBookings;
use App\Models\Package;
use App\Models\PackageItem;
use Auth;
use App\Mail\OrderComplete;
use Illuminate\Support\Facades\Mail;
use App\Jobs\OrderCompleteSMS;
use App\Jobs\BookingDetailsToAdmin;
use App\Models\Coupon;
use App\Models\CouponRedeem;

class BookingController extends Controller
{
    public function index($url_category){

        $category_info = DB::table('categories')
            ->where('categories.category_name', $url_category)->first();
        $category = Category::all();
        $city = City::all();
        $users = Auth::user();
        return view('userDashboard.booking-form')->with(array(
            'category' => $category, 
            'city' => $city, 
            'url_category' => $url_category, 
            'user_id' => $users->id, 
            'phone' => $users->phone,
            'bottom_content' => $category_info->bullet_point_content,
        ));
    } 

    public function selectpackages($url_category){
        $category_info = DB::table('categories')
            ->where('categories.category_name', $url_category)->first();
        $packages = DB::table('packages')
            ->where('packages.category_id', $category_info->id)->get();
        
        $category = str_replace('-', ' ', $url_category); //will replace - with 'space' to be displayed at the top of the navbar

        $reviews = Booking::join('users', 'bookings.user_id', '=', 'users.id')->
                    where('category', $url_category)->where('review', '!=', '0')->get(['review', 'name']);
        return view('userDashboard.select-packages')->with(array(
            'packages' => $packages,
            'url_category' => $url_category,
            'category' => $category,
            'bullet_point_content' => $category_info->bullet_point_content,
            'reviews' => $reviews
        ));
    }
    public function selectpackagesitems($category, $package_id){
        $packageItems = DB::table('package_items')
            ->where('package_items.package_id', $package_id)->get();
        $packageName = DB::table('packages')
            ->where('packages.package_id', $package_id)->first();
        $package_id = DB::table('categories')
            ->where('categories.category_name', $category)->first();
        $packages = DB::table('packages')
            ->where('packages.category_id', $package_id->id)->get();
        $showcategory = str_replace('-', ' ', $category); //will replace - with 'space' to be displayed at the top of the navbar
        

        return view('userDashboard.select-package-item')->with(array(
            'packages'     => $packages,
            'packageItems' => $packageItems,
            'showcategory' => $showcategory,
            'category'     => $category,
            'packageName'  => $packageName->package_name
        ));
    }
    /**
     * Service where prices are not pre determined
     */
    public function select_service($category){
        
        $package_id = DB::table('packages')
            ->where('packages.package_name', $category)->first();
        $packageItems = DB::table('package_items')
            ->where('package_items.package_id', $package_id->package_id)->get();
        $category_info = DB::table('categories')
            ->where('categories.category_name', $category)->first();
        // $packages = DB::table('packages')
        //     ->where('packages.category_id', $package_id->id)->get();
        // $showcategory = str_replace('-', ' ', $category); //will replace - with 'space' to be displayed at the top of the navbar
        
        if($category == 'Taxi' || $category == 'Carrier-Vehicle'){
            $action = "/vehicle-checkout";
        }else{
            $action = "/service-checkout";
        }
        return view('userDashboard.select-service')->with(array(
            'packageItems' => $packageItems,
            'category' => $category_info,
            'html_title' => $category,
            'action' => $action
        ));
    }

    public function getPackages(Request $request){
        $request->validate([
            "package_list"          =>  "required",
            "category"              =>  "required"
        ]);        
        $url_category = $request->category;    
        $city = City::all();
        $users = Auth::user();      
        
        foreach ($request->package_list as $package) {
            $package_arr[] = array(
                'package_item' => $package,
            );
        }
        foreach ($request->package_item_qty as $q) {
            $qty_arr[] = array(
                'package_qty' => $q
            );
        }
        if ($request->session()->exists('pack')) {  //check if package exists already in the session
            $request->session()->forget('pack');    //delete the previous session
            $request->session()->forget('pack_item_qty');    //delete the previous session
            $request->session()->put('pack', $package_arr); //add value to session
            $request->session()->put('pack_item_qty', $qty_arr); //add value to session

        } else{
            $request->session()->put('pack', $package_arr);
            $request->session()->put('pack_item_qty', $qty_arr);
        }

        $items_price = 0;
        $total_price = 0;
        //get package details from session
        $getPackageFromSession = $request->session()->get('pack');        
        $getPackageQtyFromSession = $request->session()->get('pack_item_qty');
        foreach($getPackageQtyFromSession as $q){
            $quantity_arr[] = $q['package_qty'];
        }  
        $qty_array_index = 0;   // to access the quantity of the package items
        foreach($getPackageFromSession as $val){
            $package_details = PackageItem::where('package_item_id', '=', $val['package_item'])->get();
                //get package details from database using package id $val[package]
                foreach($package_details as $i){
                    $items_price = $i->package_item_offer_price * $quantity_arr[$qty_array_index];
                    $total_price = $total_price + $items_price;
                    $package_item_details[] = array(
                        'item_id' =>  $val['package_item'],
                        'item_name' =>  $i->package_item_name,
                        'item_qty' => $quantity_arr[$qty_array_index],
                        'item_price' => $items_price
                    );                
            }
            $qty_array_index = $qty_array_index + 1;
        }        
        return view('userDashboard.bookWithPackage-form')->with(array(
            'package_item_details' => $package_item_details,
            'url_category'  => $url_category,
            'city' => $city, 
            'user_id' => $users->id, 
            'phone' => $users->phone,
            'total_price' => $total_price,
            'discount_price'    => NULL,
            'coupon_status'     => NULL,
            'coupon_id'     => 0
        ));
    }
    public function bookPageAfterPackage($url_category){    //get the category from url
        $category = Category::all();
        $city = City::all();
        $users = Auth::user();
        return view('userDashboard.bookWithPackage-form')->with(array(
            'category' => $category, 
            'city' => $city, 
            'url_category' => $url_category, 
            'user_id' => $users->id, 
            'phone' => $users->phone,
        )); 
    }
    public function book(Request $request){
        $request->validate([
            "category"          =>  "required",
            "user_id"           =>  "required",
            "address"           =>  "required | string",
            "landmark"          =>  "nullable | string",
            "city"              =>  "required",
            "pincode"           =>  "required | digits:6",
            "phone"             =>  "required | digits:10",
            "alt_phone"         =>  "required | digits:10",
            "describe"          =>  "nullable | string",
        ]);
        /**
         * Formatting date from YYYY-MM-DD to DD-MM-YYYY
         */
        $formated_date = date('d-m-Y', strtotime($request->date));

        $data = new Booking;
        $data->user_id = $request->user_id;
        $data->category = $request->category;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->pin = $request->pincode;
        $data->landmark = $request->landmark;
        $data->phone = $request->phone;
        $data->alt_phone = $request->alt_phone;
        $data->date = $formated_date;
        $data->description = $request->describe;

        $success = $data->save();
        if($success){
            $user = Auth::user()->where('id',  $request->user_id)->first();
            Mail::to($user->email)->send(new OrderComplete($user));
            OrderCompleteSMS::dispatch($user->phone)->delay(now()->addSeconds(3));
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

    public function bookWithPackage(Request $request){
        $request->validate([
            "category"          =>  "required",
            "user_id"           =>  "required",
            "address"           =>  "required | string",
            "landmark"          =>  "nullable | string",
            "city"              =>  "required",
            "pincode"           =>  "required | digits:6",
            "phone"             =>  "required | digits:10",
            "alt_phone"         =>  "nullable | digits:10",
            "describe"          =>  "nullable | string",
            "date"              =>  "required",
            "coupon_id"         =>  "required | integer"
        ]);
        $users = Auth::user();
        /**
         * Check Coupon Code is valid or not
         */
        $coupon_id = 0;
        $is_coupon_applied = 0;
        if($request->coupon_id != '0'){
            $coupon = Coupon::where('id', $request->coupon_id)->first(); //check if coupon exists
            if($coupon){
                if($coupon->active == 1){ //check if the coupon is active
                    $redeem = CouponRedeem::where('user_id', $users->id)->where('coupon_id', $coupon->id)->first();
                    if($redeem){        //check if user already redeemed the coupon
                        $is_coupon_applied = 0;
                    }else{
                        $is_coupon_applied = 1;
                        $coupon_id = $coupon->id;
                    }
                }                
            }
        }   

        // generate a unique reference number to be stored in database
        $ref = rand(10000,99999);
        $cond=True;
        while($cond){
            if(Booking::where('package', '=', $ref)->exists()) {
                $ref=rand(10000,99999);
            }
            else
            {   
                $cond=False;
            }
        }
        // end generate a unique reference no to be stored in database

        /**
         * Formatting date from YYYY-MM-DD to DD-MM-YYYY
         */
        $formated_date = date('d-m-Y', strtotime($request->date));
        DB::beginTransaction();
        try {
            $data = new Booking;
            $data->user_id = $request->user_id;
            $data->category = $request->category;
            $data->address = $request->address;
            $data->city = $request->city;
            $data->pin = $request->pincode;
            $data->landmark = $request->landmark;
            $data->phone = $request->phone;
            $data->alt_phone = $request->alt_phone;
            $data->package = $ref;                         // 1 = ordered with package
            $data->description = $request->describe; 
            $data->date = $formated_date;
            $data->is_coupon_applied = $is_coupon_applied;
            $data->coupon_id = $coupon_id;
            $data->save();

            /**
             * Insert to coupon_redeems table to chekc if the user already redeemed the coupon code
             */
            if($is_coupon_applied == 1){
                $users = Auth::user();
                $coupon_redeem = new CouponRedeem;
                $coupon_redeem->user_id = $users->id;
                $coupon_redeem->coupon_id =  $request->coupon_id;
                $coupon_redeem->save();
            }           
            //get package details from session
            $getPackageFromSession = $request->session()->get('pack');
            $getPackageQtyFromSession = $request->session()->get('pack_item_qty');
            foreach($getPackageQtyFromSession as $q){
                $quantity_arr[] = $q['package_qty'];
            }
             
            $qty_array_index = 0;      
            foreach($getPackageFromSession as $val){
                $package = new PackageBookings;
                $package->booking_ref = $ref;
                //get package details from database using package id $val[package]
                $package_details = PackageItem::where('package_item_id', '=', $val['package_item'])->get();
                foreach($package_details as $i){
                    $package->package_item_id = $val['package_item'];
                    $package->package_item_name = $i->package_item_name;
                    $items_price = $i->package_item_offer_price * $quantity_arr[$qty_array_index]; //calculate total price for number of qty
                    $package->price = $items_price;
                    $package->package_item_qty = $quantity_arr[$qty_array_index];
                }             
                $package->save();
                $qty_array_index = $qty_array_index + 1;
            }

            DB::commit();
            $user = Auth::user()->where('id',  $request->user_id)->first();
            Mail::to($user->email)->send(new OrderComplete($user));
            OrderCompleteSMS::dispatch($user->phone)->delay(now()->addSeconds(3));
            BookingDetailsToAdmin::dispatch(
                $request->category,
                $user->name,
                $request->phone
                )->delay(now()->addSeconds(1));
            return redirect('/my-account')->with('status', 'Booking Successfull!');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/my-account')->with('status', 'Something Went Wrong!');
        }   
    }

    public function vehicle_booking_checkout(Request $request){
        $category_name = $request->category;
        $package_item_id = $request->package_item_id;
        $category_info = DB::table('categories')
            ->where('categories.category_name', $category_name)->first();
        $category = Category::all();
        $city = City::all();
        $users = Auth::user();
        return view('userDashboard.book-vehicle-form')->with(array(
            'category' => $category, 
            'city' => $city, 
            'category_name' => $category_name, 
            'package_item_id' => $package_item_id,
            'phone' => $users->phone,
            'bottom_content' => $category_info->bullet_point_content,
        ));
    }
    
    public function service_checkout(Request $request){
        $category_name = $request->category;
        $package_item_id = $request->package_item_id;
        $category_info = DB::table('categories')
            ->where('categories.category_name', $category_name)->first();
        $category = Category::all();
        $city = City::all();
        $users = Auth::user();
        return view('userDashboard.bookWithPackageWithoutPrice-form')->with(array(
            'category' => $category, 
            'city' => $city, 
            'category_name' => $category_name, 
            'package_item_id' => $package_item_id,
            'phone' => $users->phone,
            'bottom_content' => $category_info->bullet_point_content,
        ));
    }
    public function book_vehicle(Request $request){
        $request->validate([
            "category"          =>  "required",
            "package_item_id"   =>  "required | integer",
            "from"              =>  "required",
            "destination"       =>  "required",
            "address"           =>  "required | string",
            "landmark"          =>  "nullable | string",
            "city"              =>  "required",
            "pincode"           =>  "required | digits:6",
            "phone"             =>  "required | digits:10"
        ]);
        $user = Auth::user();
        $description = $request->from . " to ". $request->destination;
        // generate a unique reference number to be stored in database
        $ref = rand(10000,99999);
        $cond=True;
        while($cond){
            if(Booking::where('package', '=', $ref)->exists()) {
                $ref=rand(10000,99999);
            }
            else
            {   
                $cond=False;
            }
        }
        // end generate a unique reference no to be stored in database
        /**
         * Formatting date from YYYY-MM-DD to DD-MM-YYYY
         */
        $formated_date = date('d-m-Y', strtotime($request->date));
        DB::beginTransaction();
        try {
            $data = new Booking;
            $data->user_id = $user->id;
            $data->category = $request->category;
            $data->address = $request->address;
            $data->city = $request->city;
            $data->pin = $request->pincode;
            $data->landmark = $request->landmark;
            $data->phone = $request->phone;
            $data->alt_phone = $request->alt_phone;
            $data->package = $ref;
            $data->date = $formated_date;
            $data->description = $description;
            $success = $data->save();

            $package = new PackageBookings;
            $package->booking_ref = $ref;
            //get package details from database using package id $val[package]
            $package_details = PackageItem::where('package_item_id', '=', $request->package_item_id)->first();
          
            $package->package_item_id = $request->package_item_id;
            $package->package_item_name = $package_details->package_item_name;
            $package->price = 0;
            $package->package_item_qty = 1;
                        
            $package->save();
        
            DB::commit();

            Mail::to($user->email)->send(new OrderComplete($user));
            OrderCompleteSMS::dispatch($user->phone)->delay(now()->addSeconds(3));
            BookingDetailsToAdmin::dispatch(
                $request->category,
                $user->name,
                $request->phone
                )->delay(now()->addSeconds(1));
            return redirect('/my-account')->with('status', 'Booking Successfull!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/my-account')->with('status', 'Something Went Wrong!');
        } 
    }
    /**
     * Book services/packages where price is not pre determined
     */
    public function book_service(Request $request){
        $request->validate([
            "category"          =>  "required",
            "package_item_id"   =>  "required | integer",
            "address"           =>  "required | string",
            "landmark"          =>  "nullable | string",
            "city"              =>  "required",
            "pincode"           =>  "required | digits:6",
            "phone"             =>  "required | digits:10",
            "alt_phone"         =>  "nullable | digits:10",
            "describe"          =>  "nullable | string"
        ]);
        $user = Auth::user();
        // generate a unique reference number to be stored in database
        $ref = rand(10000,99999);
        $cond=True;
        while($cond){
            if(Booking::where('package', '=', $ref)->exists()) {
                $ref=rand(10000,99999);
            }
            else
            {   
                $cond=False;
            }
        }
        // end generate a unique reference no to be stored in database
        /**
         * Formatting date from YYYY-MM-DD to DD-MM-YYYY
         */
        $formated_date = date('d-m-Y', strtotime($request->date));
        DB::beginTransaction();
        try {
            $data = new Booking;
            $data->user_id = $user->id;
            $data->category = $request->category;
            $data->address = $request->address;
            $data->city = $request->city;
            $data->pin = $request->pincode;
            $data->landmark = $request->landmark;
            $data->phone = $request->phone;
            $data->alt_phone = $request->alt_phone;
            $data->package = $ref;
            $data->date = $formated_date;
            $data->description = $request->describe;
            $success = $data->save();

            $package = new PackageBookings;
            $package->booking_ref = $ref;
            //get package details from database using package id $val[package]
            $package_details = PackageItem::where('package_item_id', '=', $request->package_item_id)->first();
          
            $package->package_item_id = $request->package_item_id;
            $package->package_item_name = $package_details->package_item_name;
            $package->price = 0;
            $package->package_item_qty = 1;
                        
            $package->save();
        
            DB::commit();

            Mail::to($user->email)->send(new OrderComplete($user));
            OrderCompleteSMS::dispatch($user->phone)->delay(now()->addSeconds(3));
            BookingDetailsToAdmin::dispatch(
                $request->category,
                $user->name,
                $request->phone
                )->delay(now()->addSeconds(1));
            return redirect('/my-account')->with('status', 'Booking Successfull!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/my-account')->with('status', 'Something Went Wrong!');
        } 
    }
    public function bookings(){
        $users = Auth::user();
        $bookings = DB::table('bookings')
            ->where('bookings.user_id', $users->id)
            ->orderBy('booking_id', 'desc')->take(5)->get();
        return view('userDashboard.bookings')->with(array(
            'bookings' => $bookings,
            'users' => $users,
        ));
    }

    public function bookingDetails($id){
        $users = Auth::user();

        $bookings = DB::table('bookings')
           ->join('cities', 'bookings.city', '=', 'cities.id')
           ->join('users', 'bookings.user_id', '=', 'users.id')
           ->where('bookings.booking_id', $id)
           ->first();
        $city = City::where('id', 1)->first();
        $package_booking_ref_no = $bookings->package;

        //getting package details
        $package = DB::table('package_bookings')
            ->join('bookings', 'package_bookings.booking_ref', '=', 'bookings.package')
            ->where('package_bookings.booking_ref', $package_booking_ref_no)
            ->get();

        /**
         * Calculate Total Amount or discounted amount if coupon applied
         */
        if($bookings->is_coupon_applied == 1){
            $total  = 0;
            foreach($package as $amount){
                $total = $total + $amount->price;
            }
            $coupon = Coupon::where('id', $bookings->coupon_id)->first();
            $discount_per = ($coupon->discount_percentage/100) * $total;
            if($discount_per > $coupon->max_discount_price){
                $discounted_price = $coupon->max_discount_price;
                $discount_price = $total - $discounted_price;
            }else{
                $discounted_price = $discount_per;
                $discount_price = $total - $discounted_price;
            }
        }else{
            $total  = 0;
            foreach($package as $amount){
                $total = $total + $amount->price;
            }
            $discount_price = NULL;
            $discounted_price = NULL;
        }
        
        if($bookings->assigned_to == 'Not Assigned'){
            $jobprofile = 'Not Assigned';
            $contact = 'Not Assigned';
        }else {
            $jobid = $bookings->assigned_to;
            $jobprofile = DB::table('home_services')
                ->where('home_services.job_profile_id', $jobid)
                ->first();
            $contact = Auth::user()->where('users.id', $jobprofile->user_id)->first(); //getting contact details of service person
        }
       

        //to restrict user from viewing another user's booking details by entering booking id in the url
        if($bookings->user_id == $users->id){
            return view('userDashboard.booking-details')->with(array(
                'bookings'          => $bookings,
                'jobprofile'        => $jobprofile,
                'package'           => $package,
                'totalPrice'        => $total,
                'city'              => $city,
                'contact'           => $contact,
                'discounted_price'  => $discounted_price,
                'discount_price'    => $discount_price
            ));
        } else{
            return abort(404);
        }
    }
    public function CancelBooking(Request $request){
        $request->validate([
            "booking_id"          =>  "required | integer",
            "action"              =>  "required | string"
        ]);
        if($request->action == 'Cancelled'){
            $user =  Auth::user();
            $success = Booking::where('booking_id', $request->booking_id)->where('user_id', $user->id)
                ->update([
                    'status' => 'Cancelled'
                ]
            );
        }
        if($success){
            return redirect('/bookings');
        }else {
            echo "Something went wrong!";
        }
    }
    public function WriteReview($bookingID){
        if($bookingID){
            return view('userDashboard.write-review')->with('booking_id', $bookingID);
        }else{
            return redirect('/bookings');
        }
    }
    public function SubmitReview(Request $request){
        $request->validate([
            "review"          =>  "required | string",
            "booking_id"      =>  "required"
        ]);

        $booking = Booking::where('booking_id', $request->booking_id)->first();
        $users = Auth::user(); //to restrict user to submit review on bookings which is not associated to him/her
        if($booking->review == '0' &&  $booking->user_id == $users->id){
            $success = Booking::where('booking_id', $request->booking_id)
            ->update([
                'review' =>  $request->review
            ]);
            if($success){
                return redirect('/bookings');
            }else{
                abort(404);
            }
        }else{
            return redirect('/bookings?error');
        }
    }
}
