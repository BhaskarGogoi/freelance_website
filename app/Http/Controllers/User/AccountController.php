<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AccountController extends Controller
{
    public function index(){
        $users = Auth::user();
        return view('userDashboard.account')->with('users',$users);
        
    }
}
