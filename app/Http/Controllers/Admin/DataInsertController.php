<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use App\Models\HomeService;
use App\Models\Package;
use App\Models\PackageItem;
use Illuminate\Support\Facades\DB;



class DataInsertController extends Controller
{   
    //Controller for Category
    public function indexCategory(){
        $categories = Category::all();
        return view('admin.category')->with('categories', $categories);
    }

    public function savecategory(Request $request){

        $request->validate([
            "category_name"          =>  "required | string",
            "category_type"          =>  "required | string"
        ]);

        $categories = new Category;
        $categories->category_name = $request->input('category_name');
        $categories->category_type = $request->input('category_type');
        $categories->save();
        return redirect('category')->with('status', 'New Category Added');
    }

    //End Controller for Category

    //Controller for Packages
    function indexPackage(){
        $categories = Category::all();
        $packages = Package::orderBy('package_id', 'DESC')->paginate(20);
        return view('admin.packages')
            ->with([
                'categories' => $categories,
                'packages'  => $packages
             ]);
    }
    function addPackage(Request $request){
        $request->validate([
            "package_name"          =>  "required | string",
            "category_id"          =>  "required | string"
        ]);
        $package = new Package;
        $package->package_name = $request->input('package_name');
        $package->category_id = $request->input('category_id');
        $package->save();

        Category::where('id', $request->input('category_id'))
        ->update(['packages' =>  "1"]);

        return redirect('packages')->with('status', 'Package successfully added!');
    }

    function indexPackageItems(){
        $packages = Package::all();
        $packages_items = DB::table('package_items')
            ->orderBy('package_item_id', 'desc')
            ->paginate(15);
        return view('admin.package-item')
            ->with([
                'packages'  => $packages,
                'package_items'  => $packages_items
        ]);
    }
    function addPackageItem(Request $request){
        $request->validate([
            "package_item_name"          =>  "required | string",
            "item_price"                 =>  "required | string",
            "package_id"                 =>  "required | string",
            "item_offer_price"           =>  "required | string",
            "package_item_description"   =>  "nullable | string"
        ]);
        $discount_price = $request->input('item_price') - $request->input('item_offer_price');
        if($request->input('item_price') == 0){
            $discount = 0;
        }else{
            $discount = round(($discount_price/$request->input('item_price'))*100, 2);
        }
        $package = new PackageItem;
        $package->package_item_name = $request->input('package_item_name');
        $package->package_item_price = $request->input('item_price');
        $package->package_item_offer_price = $request->input('item_offer_price');
        $package->discount = $discount;
        $package->description = $request->package_item_description;
        $package->package_id = $request->input('package_id');
        $package->save();

        return redirect('package-item')->with('status', 'Item successfully added!');
    }
    function DeletePackageItem($package_item_id){
        $del = PackageItem::where('package_item_id', $package_item_id)->delete();
        if($del){
            return redirect('package-item')->with('status', 'Item successfully Deleted!');
        } else{
            abort(500, 'Something went wrong');
        }
    }

    ////////// EDIT PACKAGE ITEM /////////////
    function EditPackageItem($package_item_id){
        $item = PackageItem::where('package_item_id', $package_item_id)->first();
        return view('admin.edit-package-item')->with('item', $item);
    }
    function UpdatePackageItem(Request $request){
        $request->validate([
            "package_item_name"          =>  "required | string",
            "item_price"                 =>  "required | string",
            "package_item_id"            =>  "required | string",
            "item_offer_price"           =>  "required | string",
            "package_item_description"   =>  "nullable | string"
        ]);
        $discount_price = $request->input('item_price') - $request->input('item_offer_price');
        if($request->input('item_price') == 0){
            $discount = 0;
        }else{
            $discount = round(($discount_price/$request->input('item_price'))*100, 2);
        }
        $success = DB::table('package_items')
            ->where('package_item_id', $request->package_item_id)
            ->update([
                'package_item_name'         => $request->package_item_name,
                'package_item_price'        => $request->item_price,
                'package_item_offer_price'  => $request->item_offer_price,
                'discount'                  => $discount,
                'description'               => $request->package_item_description
            ]
        );
        if($success){
            return redirect("/package-item");
        }else {
            echo "error";
        }
    }
    //////////// EDIT PACKAGE /////////////
    function EditPackage($package_id){
        $item = Package::where('package_id', $package_id)->first();
        return view('admin.edit-package')->with('item', $item);
    }
    function UpdatePackage(Request $request){
        $request->validate([
            "package_name"          =>  "required | string",
            "package_id"            =>  "required | string"
        ]);
    
        $success = DB::table('packages')
            ->where('package_id', $request->package_id)
            ->update([
                'package_name'         => $request->package_name
            ]
        );
        if($success){
            return redirect("/packages");
        }else {
            echo "error";
        }
    }

    //Controller for City
    public function indexCity(){
        $cities = City::all();
        return view('admin.city')->with('cities', $cities);
    }

    public function savecity(Request $request){

        $cities = new City;
        $cities->city_name = $request->input('city_name');
        $cities->state = $request->input('state');
        $cities->save();
        return redirect('city')->with('status', 'New City Added');
    }

    //End Controller for Category
}
