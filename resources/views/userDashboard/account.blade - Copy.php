@extends('layouts.master')

@section('title')
	My Account
@endsection

@section('content')
<div class="full-height">
<section style="padding-top: 20px;">
<section>
    <div class="container mb-3">
        @if (session('jobprofile_created'))
            <div class="modal" tabindex="-1" role="dialog" id="myModal">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Success!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p>You have successfully submitted your service details.</p>
                    <p>Our service executive will call you within 24 hrs for the verification.</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
        @endif
        @if (session('feedback-submitted'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('feedback-submitted') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
            <br><br>
            <div class="card shadow-sm p-2 mb-3 bg-white rounded" style="border:none;">
                  <div class="card-body pl-0 account-nav">
                    <ul>
                        <li><a href="/bookings"><i class="fas fa-shopping-cart"></i> &nbsp; Bookings</a><i class="fas fa-chevron-right float-right"></i></li>
                        <li><a href="refer-and-earn"><i class="fas fa-money-bill-wave"></i> &nbsp; Refer & Earn</a><i class="fas fa-chevron-right float-right"></i></li>
                    </ul>
                  </div>
              </div>
            </div>
        </div>
    </div>
</section>
@if($users->profile_created == 1)
<section>
    <div class="container my-3">
        <div class="row">
            <div class="col-sm-12">
            <div class="card shadow-sm p-2 mb-3 bg-white rounded" style="border:none;">
                <div class="card-header bg-transparent">
                    Selling
                  </div>
                  <div class="card-body pl-0 account-nav">
                    <ul>
                        <li><a href="/jobs"><i class="fas fa-suitcase"></i> &nbsp; Jobs</a><i class="fas fa-chevron-right float-right"></i></li>
                        {{-- <li><a href="#"><i class="fas fa-rupee-sign"></i> &nbsp; Earnings</a><i class="fas fa-chevron-right float-right"></i></li> --}}
                        <li><a href="/view-profile"><i class="fas fa-portrait"></i> &nbsp; Profile</a><i class="fas fa-chevron-right float-right"></i></li>
                        @if($jobprofile->category_type == 'freelance' && $jobprofile->status == 'Accepted' && $jobprofile->freelance_profile == 0)
                            <li><a href="/view_freelance_profile_form/{{$jobprofile->job_profile_id}}"><i class="fas fa-plus-circle"></i> &nbsp; Create Freelance Profile</a><i class="fas fa-chevron-right float-right"></i></li>
                        @elseif($jobprofile->category_type == 'freelance' && $jobprofile->status == 'Accepted' && $jobprofile->freelance_profile == 1)
                            <li><a href="/view_freelance_profile/{{$jobprofile->job_profile_id}}"><i class="far fa-id-badge"></i> &nbsp; Freelance Profile</a><i class="fas fa-chevron-right float-right"></i></li>
                        @endif
                    </ul>
                  </div>
              </div>
            </div>
        </div>
    </div>
</section>
@endif
<section>
    <div class="container my-3">
        <div class="row">
            <div class="col-sm-12">
            <div class="card shadow-sm p-2 mb-3 bg-white rounded" style="border:none;">
                <div class="card-header bg-transparent">
                  Account Summery</span>
                </div>
                  <div class="card-body pl-0">
                    <ul class="style-none">
                        <li><i class="fas fa-user"></i> &nbsp; {{$users->name}}</li>
                    </ul>
                    <ul>
                        <li><i class="fas fa-envelope"></i> &nbsp; {{$users->email}}</li>
                    </ul>
                    <ul>
                        <li><i class="fas fa-phone"></i> &nbsp; {{$users->phone}} 
                            @if($users->phone_verified == 0)
                              -  <a href="/verifyPhone">Verify Now</a>
                            @elseif($users->phone_verified == 1)
                                <span style="color:green;"><i class="far fa-check-circle"></i></span>
                            @endif
                        </li>
                    </ul>
                  </div>
              </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a  href="{{ route('logout') }}"
				onclick="event.preventDefault();
				document.getElementById('logout-form').submit();" style="text-align:center;">
				<button class="logoutbtn"><i class="fas fa-power-off"></i> {{ __('Logout') }}</button>
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
            </div>
        </div>
    </div>
</section>
</section>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
@endsection