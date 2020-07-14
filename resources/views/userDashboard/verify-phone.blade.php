@extends('layouts.master')

@section('title')
	Verify Your Phone
@endsection
@section('content')
<div class="full-height">
<section>
	<div class="container">
		<div class="row">
			  <div class="col-sm-12 mt-2 py-3">
                <h4>Verify Phone</h4>
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form action="/send-otp" method="POST">
                            @csrf
                            <div class="form-group">
                            <label>Send OTP for mobile number verification.</label> 
                                <button type="submit" class="btn-sm btn-primary">SEND</button>
                            </div>
                        </form>
                        <form action="/submit-otp" method="POST">
                            @csrf
                            <div class="form-group">
                                <br>
                                <input type="number" name="otp" class="form-control @error('coupon_name') is-invalid @enderror" value="{{ old('otp') }}" placeholder="Enter OTP" required style="max-width: 150px;">
                                @error('otp')
                                    <span class="invalid-form-field" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                  </div>         
              </div>
		</div>
	</div>
</section>
</div>
@endsection