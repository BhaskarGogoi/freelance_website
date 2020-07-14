<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutus;

class AboutusController extends Controller
{
    public function index(){
        $aboutus = Aboutus::all();
        return view('userDashboard.aboutus')->with('aboutus', $aboutus);
    }
    public function save(Request $request){

        $aboutus = new Aboutus;

        $aboutus->title = $request->input('title');
        $aboutus->subtitle = $request->input('subtitle');
        $aboutus->description = $request->input('description');

        $aboutus->save();
        return redirect('aboutus')->with('status', 'Data Added');
    }
}