@extends('layouts.master')

@section('title')
	View Profile
@endsection
@section('content')
<section style="background-color: #fafafa;">
<section>
<div class="container py-3">
    <div class="row">     
    <div class="col-md-12">
      <div class="card shadow-sm">
        <div class="card-header">
          Job Profile Details
        </div>
        <div class="card-body" style="font-size: 17px;">
            <form>
                @if($jobprofile->status == "Pending")
                    <div class="alert alert-danger" role="alert">
                        Your profile is under verification.
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Your Service :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->category_name}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Firstname :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->firstname}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Lastname :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->lastname}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Gender :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->gender}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">City :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->city_name}}" disabled>
                        </div>
                    </div>
                @elseif($jobprofile->status == "Accepted")
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Job Profile ID :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->job_profile_id}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Your Service :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->category_name}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Firstname :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->firstname}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Lastname :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->lastname}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Gender :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->gender}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Address :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->address}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">City :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->city_name}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Pincode :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->pincode}}" disabled>
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Status :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->status}}" disabled>
                        </div>
                    </div>
                @elseif($data->status == "Rejected")
                    <div class="alert alert-danger" role="alert">
                        <b>Your application is rejected.</b><br>
                       <b>Reason:</b> {{$jobprofile->comment}}
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Category :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->category_name}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Firstname :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->firstname}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Lastname :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->lastname}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Gender :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->gender}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">City :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->city_name}}" disabled>
                        </div>
                    </div>                   
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Status :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->status}}" disabled>
                        </div>
                    </div>
                @elseif($data->status == "Disqualified")
                    <div class="alert alert-danger" role="alert">
                        Your profile has been <b>disqualified</b>.<br>
                        <b>Reason: </b> {{$jobprofile->comment}}
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Category :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->category_name}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Firstname :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->firstname}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Lastname :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->lastname}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Gender :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->gender}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Address :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->address}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">City :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->city_name}}" disabled>
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Pincode :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->pincode}}" disabled>
                        </div>
                    </div>            
                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">Status :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$jobprofile->status}}" disabled>
                        </div>
                    </div>
                @endif                         
            </form><br>
            @if($jobprofile->category_type == 'freelance')
            <div style="text-align:center;">
                <a href="/upload-work-sample"><button class="btn btn-primary">View/Update Work Samples</button></a>

            </div>
            @endif 
        </div>
      </div>
    </div>
</div>
</div>
</section>
</section>
@endsection