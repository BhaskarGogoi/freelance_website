@extends('layouts.master')

@section('title')
	Upload Work Sample
@endsection

@section('content')
<section class="my-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <h5 class="card-title">Upload work sample</h5><br>
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
            @endif
            @if($complete_status == 0)
                <div class="alert alert-primary" role="alert">
                    Upload all images to complete your profile. <a href="/view-profile"><span style="color: #0b4499; font-weight: bold;">Upload Later</span></a>
                </div>
            @endif        
            @if($errors->any())
            <h6>{{$errors->first()}}</h6>
            @endif
            <div class="row">
                <div class="col-sm-4">
                    @if($freelance->img_1)
                        <div class="card upload-work-image mb-3" style="width: 100%;">
                            <div class="img-container">
                                <img src="../images/freelance_profile_images/{{$freelance->img_1}}">
                            </div>
                            <div class="card-body">
                            <form action="/upload-imagee" enctype="multipart/form-data" method="post" id="image_upload_form">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="image_no" value="1" required>
                                    <input type="hidden" name="job_profile_id" value="{{$job_profile_id}}" required>
                                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" required><br>
                                    <input class="btn btn-primary" type="submit" name="submit_button" value='Change'>
                                    <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
                                </div>
                            </form>
                            </div>
                        </div>
                    @else
                        <div class="card mb-3" style="width: 100%;">
                            <img class="card-img-top" src="../images/freelance_profile_images/thumbnail.jpg">
                            <div class="card-body">
                            <form action="/upload-imagee" enctype="multipart/form-data" method="post" id="image_upload_form">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="image_no" value="1" required>
                                    <input type="hidden" name="job_profile_id" value="{{$job_profile_id}}" required>
                                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" required><br>
                                    <input class="btn btn-primary" type="submit" name="submit_button" value="Upload">
                                </div>
                            </form>
                            </div>
                        </div>
                    @endif
                </div> <br>
                <div class="col-sm-4">
                    @if($freelance->img_2)
                    <div class="card upload-work-image mb-3" style="width: 100%;">
                        <div class="img-container">
                            <img src="../images/freelance_profile_images/{{$freelance->img_2}}">
                        </div>
                        <div class="card-body">
                        <form action="/upload-imagee" enctype="multipart/form-data" method="post" id="image_upload_form2">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="image_no" value="2" required>
                                <input type="hidden" name="job_profile_id" value="{{$job_profile_id}}" required>
                                <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" required><br>
                                <input class="btn btn-primary" type="submit" name="submit_button" value="Change">
                            </div>
                        </form>
                        </div>
                    </div>
                @else
                    <div class="card mb-3" style="width: 100%;">
                        <img class="card-img-top" src="../images/freelance_profile_images/thumbnail.jpg">
                        <div class="card-body">
                        <form action="/upload-imagee" enctype="multipart/form-data" method="post" id="image_upload_form2">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="image_no" value="2" required>
                                <input type="hidden" name="job_profile_id" value="{{$job_profile_id}}" required>
                                <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" required><br>
                                <input class="btn btn-primary" type="submit" name="submit_button" value="Upload">
                            </div>
                        </form>
                        </div>
                    </div>
                @endif
                </div>
                <div class="col-sm-4">
                    @if($freelance->img_3)
                        <div class="card upload-work-image mb-3" style="width: 100%;">
                            <div class="img-container">
                                <img src="../images/freelance_profile_images/{{$freelance->img_3}}">
                            </div>
                            <div class="card-body">
                            <form action="/upload-imagee" enctype="multipart/form-data" method="post" id="image_upload_form3">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="image_no" value="3" required>
                                    <input type="hidden" name="job_profile_id" value="{{$job_profile_id}}" required>
                                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" required><br>
                                    <input class="btn btn-primary" type="submit" name="submit_button" value="Change">
                                </div>
                            </form>
                            </div>
                        </div>
                    @else
                        <div class="card mb-3" style="width: 100%;">
                            <img class="card-img-top" src="../images/freelance_profile_images/thumbnail.jpg">
                            <div class="card-body">
                            <form action="/upload-imagee" enctype="multipart/form-data" method="post" id="image_upload_form3">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="image_no" value="3" required>
                                    <input type="hidden" name="job_profile_id" value="{{$job_profile_id}}" required>
                                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" required><br>
                                    <input class="btn btn-primary" type="submit" name="submit_button" value="Upload">
                                </div>
                            </form>
                            </div>
                        </div>
                    @endif
                </div>                
            </div>
        </div>
        @if($complete_status == 1)
            <a href="/view-profile" style="margin: 0 auto;"><button class="btn btn-primary mt-3">View Profile</button></a>
        @endif
      </div>
    </div>
  </section>
@endsection

@section('script')
<script type="text/javascript">

    window.addEventListener("DOMContentLoaded", function(e) {
  
      var form_being_submitted = false;
  
      var checkForm = function(e) {
        var form = e.target;
        if(form_being_submitted) {
          alert("Uploading, Please Wait A Moment...");
          form.submit_button.disabled = true;
          e.preventDefault();
          return;
        }
        if(form.image.value == "") {
          form.firstname.focus();
          e.preventDefault();
          return;
        }
        form.submit_button.value = "Uploading";
        form_being_submitted = true;
      };
  
      document.getElementById("image_upload_form").addEventListener("submit", checkForm, false);
      document.getElementById("image_upload_form2").addEventListener("submit", checkForm, false);
      document.getElementById("image_upload_form3").addEventListener("submit", checkForm, false);
  
    }, false);
  
  </script>
@endsection