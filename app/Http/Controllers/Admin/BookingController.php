<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\PackageBookings;
use App\Models\Package;
use App\Models\PackageItem;
use App\Models\Category;
use App\Models\HomeService;
use App\Models\City;
use Auth;


class BookingController extends Controller
{
    public function index($request){
        if($request == 'All'){
            $booking = DB::table('bookings')
                ->join('cities', 'bookings.city', '=', 'cities.id')
                ->join('users', 'bookings.user_id', '=', 'users.id')
                ->orderBy('booking_id', 'DESC')
                ->paginate(20);
        } else{
            $booking = DB::table('bookings')
            ->join('cities', 'bookings.city', '=', 'cities.id')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->where('bookings.status', $request)
            ->paginate(20);
        }   

        return view('admin.bookings')->with(array(
            'booking' => $booking
        ));
    } 

    public function bookingDetails($id, Request $request){
        $serviceMan = $request->category_id; //get service man id
        $category = Category::all();
        $bookings = DB::table('bookings')
        ->join('cities', 'bookings.city', '=', 'cities.id')
        ->join('users', 'bookings.user_id', '=', 'users.id')
        ->where('bookings.booking_id', $id)
        ->first();

        $ifBookedWithPackage = $bookings->package;
        $bookedPackageDetails = NULL;
        if($ifBookedWithPackage != 0){
           $bookedPackageDetails = PackageBookings::where('booking_ref', $bookings->package)->get();
        }


        if($serviceMan){ //check if requested for see service man list
            $category_id =  DB::table('categories')
            ->where('categories.id', $serviceMan)
            ->first();

            $jobprofiles = DB::table('home_services')
                ->join('users', 'home_services.user_id', '=', 'users.id')
                ->join('cities', 'home_services.city', '=', 'cities.id')
                ->where([
                    ['home_services.category_id', $serviceMan],
                    ['home_services.status', 'Accepted']
                ])
                ->get();

            $viewProfiles = 1; //if 1 bottom card will be visible

            return view('admin.booking-details')->with(array(
                'jobprofiles' => $jobprofiles,
                'bookings' => $bookings,
                'category' => $category,
                'viewProfiles' => $viewProfiles,
                'bookedPackageDetails'  => $bookedPackageDetails
            ));
        } else{

            $service_man = DB::table('home_services')
                ->join('categories', 'home_services.category_id', '=', 'categories.id')
                ->join('cities', 'home_services.city', '=', 'cities.id')
                ->where('home_services.job_profile_id', $bookings->assigned_to)
                ->first();

            $viewProfiles = 0; //if 0 bottom card will not visible

            return view('admin.booking-details')->with(array(
                'service_man' => $service_man,
                'bookings' => $bookings,
                'category' => $category,
                'viewProfiles' => $viewProfiles,
                'bookedPackageDetails'  => $bookedPackageDetails
            ));
        }
        
    }

    public function assign(Request $request){
        Booking::where('booking_id', $request->booking_id)
            ->update([
                'assigned_to' => $request->job_profile_id,
                'status' => 'Assigned'
            ]
        );
         //SMS - to Service Man - You have got new task
         $field = array(
            "sender_id" => "FSTSMS",
            "language" => "english",
            "route" => "qt",
            "numbers" => "$request->service_man_phone",
            "message" => "25137",
            "variables" => "{#EE#}",
            "variables_values" => "$request->service_man_name;"
        );
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($field),
          CURLOPT_HTTPHEADER => array(
            "authorization: 6iLnlZXAQreUYkRwq5FxcGV8WjoOIa1vMu34Pf70H29JbdhyTN6VTCgxaKtj5Li9dScQWuABzGRfmovI",
            "cache-control: no-cache",
            "accept: */*",
            "content-type: application/json"
          )
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);

        //SMS - to client - serviceman assigned to your task
        $field = array(
            "sender_id" => "FSTSMS",
            "language" => "english",
            "route" => "qt",
            "numbers" => "$request->client_phone",
            "message" => "25138",
            "variables" => "{#EE#}",
            "variables_values" => "$request->client_name"
        );
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($field),
          CURLOPT_HTTPHEADER => array(
            "authorization: 6iLnlZXAQreUYkRwq5FxcGV8WjoOIa1vMu34Pf70H29JbdhyTN6VTCgxaKtj5Li9dScQWuABzGRfmovI",
            "cache-control: no-cache",
            "accept: */*",
            "content-type: application/json"
          )
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);

        // End SMS       
        return \Redirect::route('booking_details', $request->booking_id)->with('status', 'Service Man Successfully Assigned');
         

    }
    public function bookingAction(Request $request){
        $request->validate([
            "booking_id"          =>  "required | integer",
            "action"          =>  "required | string"
        ]);
        if($request->action == 'Completed'){
            Booking::where('booking_id', $request->booking_id)
                ->update([
                    'status' => 'Completed'
                ]
            );
            return redirect('/bookings-detail/'.$request->booking_id)->with('status', 'Booking Completed');
        }
        elseif($request->action == 'Cancelled'){
            Booking::where('booking_id', $request->booking_id)
                ->update([
                    'status' => 'Cancelled'
                ]
            );
            return redirect('/bookings-detail/'.$request->booking_id)->with('status', 'Booking Cancelled');
        }
    } 
    
    public function viewPackages(Request $request){
        $request->validate([
            "booking_id"          =>  "required | integer",
            "category"          =>  "required | string",
            "ref"          =>  "required | integer"
        ]);
        
        $category = Category::where('category_name', $request->category)->first();
        $package  = Package::where('category_id', $category->id)->get();
        $packageItem = NULL;
        $selected_package = NULL;
        if($request->package_id){
            $selected_package  = Package::where('package_id', $request->package_id)->first();
            $packageItem  = PackageItem::where('package_id', $request->package_id)->get();
            return view('admin.add-package-to-bookings')->with([
                'packageItem'       => $packageItem,
                'package'       => $package,
                'selected_package'       => $selected_package,
                'category' => $request->category,
                'booking_id'    => $request->booking_id,
                'booking_ref'    => $request->ref
            ]);
        } else{
            return view('admin.add-package-to-bookings')->with([
                'packageItem'       => $packageItem,
                'package'       => $package,
                'category' => $request->category,
                'booking_id'    => $request->booking_id,
                'booking_ref'    => $request->ref,
                'selected_package'       => $selected_package
            ]);
        }
    }
    public function addToBooking(Request $request){
        $request->validate([
            "package_item_id"       =>  "required | integer",
            "ref"                   =>  "required | integer",
            "qty"                   =>  "required | integer"
        ]);

        $package_item = PackageItem::where('package_item_id', $request->package_item_id)->first();

        $package_booking = new PackageBookings;
        $package_booking->booking_ref = $request->ref;
        $package_booking->package_item_id = $request->package_item_id;
        $package_booking->package_item_name = $package_item->package_item_name;
        $package_booking->package_item_qty = $request->qty;
        $package_booking->price = $package_item->package_item_offer_price;
        $success = $package_booking->save();
        if($success){
            return redirect('/add-package-to-booking')->with('success', 'Package Item Added Successfully!');
        }else{
            echo "Something went wrong!";
        }
    }

    public function addCustomPackage(Request $request){
        $request->validate([
            "booking_id"       =>  "required | integer",
            "package_name"       =>  "required | string",
            "qty"                   =>  "required | integer",
            "price"                   =>  "required | integer"
        ]);
        
        $ref_id = Booking::where('booking_id', $request->booking_id)->first('package');
        if($ref_id->package == '0'){
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
        }else{
            $ref = $ref_id->package;
        }
        
        DB::beginTransaction();
        try {
            Booking::where('booking_id', $request->booking_id)
                ->update([
                    'package' => $ref
                ]
            );

            $package_booking = new PackageBookings; 
            $package_booking->booking_ref = $ref;
            $package_booking->package_item_id = "Custom";
            $package_booking->package_item_name = $request->package_name;
            $package_booking->package_item_qty = $request->qty;
            $package_booking->price = $request->price;
            $package_booking->save();

            DB::commit();
            return redirect('/bookings-detail/'.$request->booking_id)->with('status', 'Package Added!');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/bookings-detail/'.$request->booking_id)->with('status', 'Something Went Wrong!');
        }  
    }

    public function edit_package_booking_price(Request $request){
        $request->validate([
            "package_booking_id"    =>  "required | integer",
            "price"                 =>  "required | integer"
        ]);

        PackageBookings::where('package_booking_id', $request->package_booking_id)
                ->update([
                    'price' => $request->price
            ]);
        return redirect()->back();
    }
}
