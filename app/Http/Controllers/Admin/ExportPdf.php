<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Auth;
use App\Models\Category;
use App\Models\City;
use App\Models\Booking;
use App\Models\HomeService;
use App\Models\PackageBookings;
use App\Models\Package;
use App\Models\PackageItem;
use App\Models\Coupon;
use App\Models\CouponRedeem;
use Illuminate\Support\Facades\DB;

class ExportPdf extends Controller
{
    public function index(){
        return view('admin.extra.create-invoice');
    }

    public function create_pdf(Request $request){
        $request->validate([
            "order_id"         =>  "required | integer",
            "date"             =>  "required",
            "bill_to"          =>  "required | string",
            "address"          =>  "required",
            "city"             =>  "required | string",
            "pin"              =>  "required | integer",
            "phone"            =>  "required | digits:10",
            "product_name"     =>  "required",
            "qty"              =>  "required | integer",
            "price"            =>  "required | integer",
            "offer_price"      =>  "required | integer"
        ]);
        $formated_date = date('d-m-Y', strtotime($request->date));
        $current_date = date('d-m-Y');
        $discounted_price = $request->price - $request->offer_price;

        $data = [
            'order_id'      => $request->order_id,
            'date'          => $formated_date,
            'invoice_date'  => $current_date,
            'bill_to'       => $request->bill_to,
            'address'       => $request->address,
            'city'          => $request->city,
            'pin'           => $request->pin,
            'phone'         => $request->phone,
            'product'       => $request->product_name,
            'qty'           => $request->qty,
            'price'         => $request->price,
            'offer_price'   => $request->offer_price,
            'discounted_price'  => $discounted_price
        ];

        $pdf = PDF::loadView('admin.extra.invoice', compact('data'));
        return $pdf->setPaper('a4', 'horizontal')->stream('invoice.pdf');
    }

    public function generateInvoice($id){
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
       
        $city = $city;
        $phone = $users->phone;
        $current_date = date('d-m-Y');
        $pdf = PDF::loadView('admin.extra.autoGenerateInvoice', compact([
                'bookings', 
                'current_date',
                'city',
                'phone',
                'package',
                'total',
                'discounted_price',
                'discount_price'
            ])
        );
        return $pdf->setPaper('a4', 'horizontal')->stream('invoice.pdf');
    }
}
