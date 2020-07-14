<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notify;
use Illuminate\Support\Facades\DB;

class NotifyPhone extends Controller
{
    public function index(){

        $phone = Notify::orderBy('id', 'DESC')->paginate(20)->onEachSide(2);
        return view('admin.notify')->with(array(
            'phone' => $phone
        ));

    }
}
