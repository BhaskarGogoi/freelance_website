<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;
class FeedbackController extends Controller
{
    public function index(){
        $feedbacks = DB::table('feedbacks')
            ->join('users', 'users.id', '=', 'feedbacks.user_id')
            ->orderBy('feedback_id', 'desc')
            ->get();
        return view('admin.feedback')->with('feedbacks', $feedbacks);
    }
    public function feedback_details($id){
        $feedbacks = DB::table('feedbacks')
            ->join('users', 'users.id', '=', 'feedbacks.user_id')
            ->where('feedbacks.feedback_id', $id)
            ->first();
        $user = Auth::user()->where('id', $feedbacks->user_id)->first();
       
        return view('admin.feedback-details')->with([
            'feedbacks' => $feedbacks,
            'user'      => $user
        ]);
    }    
}
