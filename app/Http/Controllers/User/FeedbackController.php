<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;
class FeedbackController extends Controller
{
    function index(){   
        return view('userDashboard.feedback');
    }
    function submit_feedback(Request $request){

        $request->validate([
            "feedback"          =>  "required | string"
        ]);

        $users = Auth::user(); //get current userid
        $userid = $users->id;

        $data = new Feedback;
        $data->user_id = $userid;
        $data->feedback = $request->feedback;
        $data->save();
        return redirect('my-account')->with('feedback-submitted', 'Feedback successfully submitted!');
    }
}
