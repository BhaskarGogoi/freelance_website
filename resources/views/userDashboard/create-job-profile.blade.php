@extends('layouts.master')

@section('title')
	Become a partner
@endsection

@section('content')
<section class="my-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-header bg-blue">
              <h4 class="card-title">Become a partner</h4>               
            </div>
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
            @endif
            <div class="card-body">
              <div style="max-width: 600px;font-size: 18px; margin: 0 auto;">
                  <form action="/create_job_profile" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="exampleFormControlSelect1">Service you offer</label>
                          <select class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required>
                            <option value="">SELECT</option>
                            <option value="">--------Home Service-------</option>
                            @foreach($home_service as $i)
                            <option value="{{$i->id}}">{{$i->category_name}}</option>
                            @endforeach
                            <option value="">--------Freelance-------</option>
                            @foreach($freelance as $i)
                            <option value="{{$i->id}}">{{$i->category_name}}</option>
                            @endforeach
                          </select>
                          @error('category')
                            <span class="invalid-form-field" role="alert">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" id="firstname" value="{{ old('firstname') }}"   placeholder="First Name" required>
                          @error('firstname')
                            <span class="invalid-form-field" role="alert">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" id="lastname" value="{{ old('lastname') }}"  placeholder="Last Name" required>
                          @error('lastname')
                            <span class="invalid-form-field" role="alert">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group form-check form-check-inline">
                        <input class="form-check-input  @error('gender') is-invalid @enderror" type="radio" name="gender" id="inlineRadio1" value="Male" required>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                        @error('gender')
                          <span class="invalid-form-field" role="alert">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input  @error('gender') is-invalid @enderror" type="radio" name="gender" id="inlineRadio2" value="Female" required>
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                        @error('gender')
                          <span class="invalid-form-field" role="alert">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input  @error('gender') is-invalid @enderror" type="radio" name="gender" id="inlineRadio3" value="Other" required>
                        <label class="form-check-label" for="inlineRadio2">Other</label>
                        @error('gender')
                           <span class="invalid-form-field" role="alert">{{ $message }}</span>
                        @enderror
                      </div>
                      {{-- <div class="form-group">
                          <label>Address/Locality</label>
                          <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}"   placeholder="Address or Locality" required>
                          @error('address')
                            <span class="invalid-form-field" role="alert">{{ $message }}</span>
                          @enderror
                      </div> --}}
                      <div class="form-group">
                          <label for="exampleFormControlSelect1">City</label>
                          <select class="form-control @error('city') is-invalid @enderror" name="city" id="exampleFormControlSelect1" required>
                            <option value="">SELECT</option>
                            @foreach($city as $data)
                              <option value="{{$data->id}}">{{$data->city_name}}</option>
                            @endforeach
                          </select>
                          @error('city')
                            <span class="invalid-form-field" role="alert">{{ $message }}</span>
                          @enderror
                      </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
              </div>       
            </div>
          </div><br>
          <div class="card shadow">
            <div class="card-body">
              <h4 class="partnerform-below-card-header">Advantages of becomming partner with us</h4>     
              <div style="max-width: 600px;font-size: 18px; margin: 0 auto;">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="card partnerform-below-card" style="width: 18rem;">
                        <img class="card-img-top" src="../images/adv1.png">
                        <div class="card-body">
                          <h5 class="card-title partnerform-below-card-title">Work on your own terms</h5>
                          <p class="partnerform-below-card-text">You choose when you want to work and how much.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="card partnerform-below-card" style="width: 18rem;">
                        <img class="card-img-top" src="../images/adv2.png">
                        <div class="card-body">
                          <h5 class="card-title partnerform-below-card-title">Easy to connect with customers</h5>
                          <p class="partnerform-below-card-text">We are giving you a great platform to connect with vast numbers of customers in a very simple way.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="card partnerform-below-card" style="width: 18rem;">
                        <img class="card-img-top" src="../images/adv3.png">
                        <div class="card-body">
                          <h5 class="card-title partnerform-below-card-title">Grow your business</h5>
                          <p class="partnerform-below-card-text">Grow your business with us and get new customers lookin for services Professionals like you.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="card partnerform-below-card" style="width: 18rem;">
                        <img class="card-img-top" src="../images/adv4.png">
                        <div class="card-body">
                          <h5 class="card-title partnerform-below-card-title">Rewards</h5>
                          <p class="partnerform-below-card-text">Get rewards on the basis of your Perfomance</p>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>       
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
	
@endsection