@extends('layouts.admin_dashboard')

@section('title')
	Job Profile Details
@endsection

@section('content')

{{-- Modal Reject Modal --}}
<div class="modal fade" id="RejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/job-profile-action" role="form" method="POST">
        @csrf
        <div class="modal-body"> 
          <input type="hidden" name="job_profile_id" class="form-control"  value="{{$jobprofile->job_profile_id}}">
          <div class="form-group">
            <label class="col-form-label">Reject Reason:</label>
            <input type="text" name="reason" class="form-control" required>
          </div>  
          <input type="hidden" name="status" class="form-control"  value="Rejected">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" value="reject">Reject</button>
        </div>
      </form> 
    </div>
  </div>
</div>
{{-- End Reject Modal --}}


{{-- Accept Modal --}}
<div class="modal fade" id="AcceptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Accept</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
        @csrf
        <div class="modal-body"> 
          <input type="hidden" name="job_profile_id" class="form-control"  value="{{$jobprofile->job_profile_id}}">
          <input type="hidden" name="status" class="form-control"  value="Accepted">
          Are you sure, you want to accept this profile?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" value="Accept">Confirm</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- End Accept Modal --}}

{{-- Disqualified Modal --}}
<div class="modal fade" id="DisqualifiedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/job-profile-action" role="form" method="POST">
        @csrf
        <div class="modal-body">  
          <input type="hidden" name="job_profile_id" class="form-control"  value="{{$jobprofile->job_profile_id}}">
          <div class="form-group">
            <label class="col-form-label">Disqualified Reason:</label>
            <input type="text" name="reason" class="form-control" required>
          </div>  
          <input type="hidden" name="status" class="form-control"  value="Disqualified">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" value="reject">Disqualify</button>
        </div>
      </form> 
    </div>
  </div>
</div>
{{-- End Disqualified Modal --}}

<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Job Profile Details</h6>
          </div>
        </div>
        @if (session('status'))
              <div class="alert alert-primary" role="alert">
                  {{ session('status') }}
              </div>
          @endif
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0"></h3>
          </div>
          <div class="card-body">
            <form action="/job-profile-action" method="POST">
              @csrf 
                <div class="form-group row">
                    <label for="text" class="col-md-4 col-form-label text-md-right">Job Profile ID :</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" value="{{$jobprofile->job_profile_id}}" disabled>
                        <input name="job_profile_id" type="hidden" class="form-control" value="{{$jobprofile->job_profile_id}}">
                        <input type="hidden" name="status" class="form-control"  value="Accepted">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text" class="col-md-4 col-form-label text-md-right">Category :</label>
                    <div class="col-md-6">
                        <input name="category" type="text" class="form-control" value="{{$jobprofile->category_name}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text" class="col-md-4 col-form-label text-md-right">Firstname :</label>
                    <div class="col-md-6">
                        <input name="firstname" type="text" class="form-control" value="{{$jobprofile->firstname}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text" class="col-md-4 col-form-label text-md-right">Lastname :</label>
                    <div class="col-md-6">
                        <input name="lastname" type="text" class="form-control" value="{{$jobprofile->lastname}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text" class="col-md-4 col-form-label text-md-right">Address :</label>
                    <div class="col-md-6">
                        <input name="address" type="text" class="form-control" value="{{$jobprofile->address}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text" class="col-md-4 col-form-label text-md-right">City :</label>
                    <div class="col-md-6">
                        <input name="city" type="text" class="form-control" value="{{$jobprofile->city_name}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text" class="col-md-4 col-form-label text-md-right">Pincode :</label>
                    <div class="col-md-6">
                        <input name="pincode" type="text" class="form-control" value="{{$jobprofile->pincode}}" required>
                    </div>
                </div>
                <div class="form-group row">
                  <label for="text" class="col-md-4 col-form-label text-md-right">Phone :</label>
                  <div class="col-md-6">
                      <input name="phone" type="text" class="form-control" value="{{$jobprofile->phone}}" disabled>
                  </div>
              </div>
              <div class="form-group row">
                <label for="text" class="col-md-4 col-form-label text-md-right">Email :</label>
                <div class="col-md-6">
                    <input name="email" type="text" class="form-control" value="{{$jobprofile->email}}" disabled>
                </div>
              </div>
              <div class="form-group row">
                  <label for="text" class="col-md-4 col-form-label text-md-right">Created :</label>
                  <div class="col-md-6">
                      <input name="created_at" type="text" class="form-control" value="{{$jobprofile->created_at}}" disabled>
                  </div>
              </div>
              @if($freelance == 1)
              <div class="row">
                <div class="col-sm-4">
                  <div class="card mb-3" style="width: 100%;">
                    @if($freelance_profile->img_1)
                      <img class="card-img-top" src="../images/freelance_profile_images/{{$freelance_profile->img_1}}">
                    @else
                      <img class="card-img-top" src="../images/freelance_profile_images/img_not_available.jpg">
                    @endif
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="card mb-3" style="width: 100%;">
                    @if($freelance_profile->img_2)
                      <img class="card-img-top" src="../images/freelance_profile_images/{{$freelance_profile->img_2}}">
                    @else
                      <img class="card-img-top" src="../images/freelance_profile_images/img_not_available.jpg">
                    @endif
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="card mb-3" style="width: 100%;">
                    @if($freelance_profile->img_3)
                      <img class="card-img-top" src="../images/freelance_profile_images/{{$freelance_profile->img_3}}">
                    @else
                      <img class="card-img-top" src="../images/freelance_profile_images/img_not_available.jpg">
                    @endif
                  </div>
                </div>
                <br><br>
              </div>
              @endif
                @if($jobprofile->status == "Pending")
                  <div class="form-group row">
                    <div class="col-md-6 text-md-right">
                      <button type="submit" name="submit" class="btn btn-primary" >Accept</button>
                    </div>
                    <div class="col-md-6 text-md-left">
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#RejectModal">Reject</button>
                    </div>
                  </div>
                @elseif($jobprofile->status == "Accepted")
                  <div class="form-group row">
                      <div class="col-md-6 text-md-right">
                          <button type="button" name="action" class="btn btn-primary" data-toggle="modal" data-target="#DisqualifiedModal" value="Disquality">Disqualify</button>
                      </div>
                  </div>
                @elseif($jobprofile->status == "Rejected")
                  <div class="form-group row">
                    <div class="col-md-6 text-md-right">
                      <p><b>Reject Reason: </b>{{$jobprofile->comment}}</p>
                    </div>
                      <div class="col-md-6 text-md-left">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AcceptModal">Accept</button>
                      </div>
                  </div>
                @elseif($jobprofile->status == "Disqualified")
                <div class="form-group row">
                  <div class="col-md-6 text-md-right">
                    <p><b>Disqualify Reason: </b>{{$jobprofile->comment}}</p>
                  </div>
                  <div class="col-md-6 text-md-left">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AcceptModal">Re-Accept</button>
                  </div>
              </div>
              @endif
            </form>
          </div> 
        </div>
      </div>
    </div>
    @endsection