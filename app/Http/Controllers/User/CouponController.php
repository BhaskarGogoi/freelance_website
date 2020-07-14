<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Coupon;
use App\Models\PackageBookings;
use App\Models\PackageItem;
use App\Models\City;
use App\Models\CouponRedeem;
use Auth;


class CouponController extends Controller
{
    public function applyCoupon(Request $request){
        $request->validate([
            "coupon_name"          =>  "required",
            "category"              =>  "required"
        ]);
        $city = City::all();
        $users = Auth::user(); 

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
                    'item_id'       =>  $val['package_item'],
                    'item_name'     =>  $i->package_item_name,
                    'item_qty'      => $quantity_arr[$qty_array_index],
                    'item_price'    => $items_price
                );                
            }
            $qty_array_index = $qty_array_index + 1;
        }
        $coupon_status;
        $coupon = 0;
        $discount_price = NULL;
        $coupon_details = DB::table('coupons')->where('coupon_code', $request->coupon_name)->first();
        if($coupon_details){
            if($coupon_details->active == 1){
                if($coupon_details->eligible_price > $total_price){
                    $coupon_status = 'Not Eligible';
                }else{
                    $redeem = CouponRedeem::where('user_id', $users->id)->where('coupon_id', $coupon_details->id)->first();
                    if($redeem){
                        $coupon_status = "Redeemed";
                    }else{
                        $discount_per = ($coupon_details->discount_percentage/100) * $total_price;
                        if($discount_per > $coupon_details->max_discount_price){
                            $discount_price = $total_price - $coupon_details->max_discount_price;
                        }else{
                            $discount_price = $total_price - $discount_per;
                        }
                        $coupon_status = "Applied";
                        $coupon = $coupon_details->id;
                        $discount_price = round($discount_price);
                    }
                }
            }else{
                $coupon_status = 'Expired';
            }
            
            
            return view('userDashboard.bookWithPackage-form')->with([
                'package_item_details'  => $package_item_details,
                'url_category'          => $request->category,
                'city'                  => $city, 
                'user_id'               => $users->id, 
                'phone'                 => $users->phone,
                'total_price'           => $total_price,
                'discount_price'        => $discount_price,
                'coupon_id'             => $coupon,
                'coupon_name'           => $request->coupon_name,
                'coupon_status'         => $coupon_status
            ]);
        }else{
            return view('userDashboard.bookWithPackage-form')->with(array(
                'package_item_details'  => $package_item_details,
                'url_category'          => $request->category,
                'city'                  => $city, 
                'user_id'               => $users->id, 
                'phone'                 => $users->phone,
                'total_price'           => $total_price,
                'discount_price'        => NULL,
                'coupon_id'                => 0,
                'coupon_status'         => 'Invalid'
            ));
        }
    }
}
