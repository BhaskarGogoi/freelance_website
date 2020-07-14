<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomBookingController extends Controller
{
    public function taxi_service(){

        return view('userDashboard.taxi-service');
    }
    public function taxi_book(){
        
        
    }
}
