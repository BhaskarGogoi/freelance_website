@extends('layouts.master')

@section('title')
	
@endsection
@section('header-text')
    
@endsection

@section('content')
<br>
<section>
   <div class="container">
       <div class="row">
           <div class="col-sm-6">
            <div class="card work-sample-detail-view" style="width: 100%; border: none;">
                <div class="card-image-top">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @if($profile->img_1)
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            @endif
                            @if($profile->img_2)
                                <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                            @endif
                            @if($profile->img_3)
                                <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                            @endif
                        </ol>
                        <div class="carousel-inner card-profile-view-carousel">
                         @if($profile->img_1)
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="../images/freelance_profile_images/{{$profile->img_1}}">
                          </div>
                          @endif
                          @if($profile->img_2)
                          <div class="carousel-item">
                            <img class="d-block w-100" src="../images/freelance_profile_images/{{$profile->img_2}}">
                          </div>
                          @endif
                          @if($profile->img_3)
                          <div class="carousel-item">
                            <img class="d-block w-100" src="../images/freelance_profile_images/{{$profile->img_3}}">
                          </div>
                          @endif
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>                
                <div class="card-body">
                  <h5 class="card-title">{{$profile->firstname}} {{$profile->lastname}}</h5>
                  {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
              </div>
           </div>
           <div class="col-sm-6">
                <div class="booking-card mb-5" style="opacity: 90%;">
                    <div class="booking-card-body">
                        <form action="/book-freelancer" method="POST">
                            @csrf
                            <input type="hidden" name="category" class="form-control" value="{{$category->category_name}}" required>
                            <input type="hidden" name="profile_id" class="form-control" value="{{$profile->job_profile_id}}" required>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required>
                                @error('address')
                                    <span class="invalid-form-field" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Landmark</label>
                                <input type="text" name="landmark" class="form-control @error('landmark') is-invalid @enderror" value="{{ old('landmark') }}" placeholder="Optional">
                                @error('landmark')
                                    <span class="invalid-form-field" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
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
                            <div class="form-group">
                                <label>PIN</label>
                                <input type="text" pattern="[0-9]*" inputmode="numeric" name="pincode" class="form-control @error('pincode') is-invalid @enderror" value="{{ old('pincode') }}" required>
                                @error('pincode')
                                    <span class="invalid-form-field" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="inlineFormInputGroup">Phone</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+91</div>
                                </div>
                                <input type="text" pattern="[0-9]*" inputmode="numeric" name="phone" readonly class="form-control @error('phone') is-invalid @enderror" value="{{$phone}}" required>
                                @error('phone')
                                    <span class="invalid-form-field" role="alert">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="inlineFormInputGroup">Alternate Phone</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+91</div>
                                </div>
                                <input type="text" pattern="[0-9]*" inputmode="numeric" name="alt_phone" class="form-control @error('alt_phone') is-invalid @enderror" value="{{ old('alt_phone') }}" placeholder="Alt Phone (Optional)">
                                    @error('alt_phone')
                                        <span class="invalid-form-field" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="form-group">
                                <label>Date: </label>
                                <input type="date" id="dueDate" name="date" required><br>
                            </div>
                            <div class="form-group">
                                <label>Describe</label>
                                <textarea class="form-control @error('describe') is-invalid @enderror" rows="3" name="describe" value="{{ old('describe') }}" placeholder="Describe your requirements (optional)"></textarea>
                                @error('describe')
                                    <span class="invalid-form-field" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </form>
                    </div>
                </div> 
           </div>
       </div>
   </div>
</section><br>

@endsection

@section('script')
<script>
    window.onload = restrictDate;
    function restrictDate() {
        var today = new Date();
        var targetDate= new Date();
        var targetMinDate= new Date();
        targetDate.setDate(today.getDate()+ 7);
        targetMinDate.setDate(today.getDate()+ 0);
        document.getElementById("dueDate").setAttribute("min", formatDate(targetMinDate));
        document.getElementById("dueDate").setAttribute("max", formatDate(targetDate));
    }

    function getTodayDate() {
        var d = new Date(),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    }

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    }
</script>
@endsection

    

