<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notify;
class GetPhNumber extends Controller
{
    
    public function getphone(Request $request, $category){

        $request->validate([
            "phone"   =>  "required | digits:10"
        ]);

        $data = new Notify;
        $data->phone = $request->phone;
        $data->category = $category;
        $data->save();
        return redirect('/')->with('phone-submitted', 'Phone Number Successfully Submitted!');

    }
    public function comingSoon($category){
        return view("coming-soon")->with('category', $category);
    }
}
