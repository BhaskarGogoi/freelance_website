@extends('layouts.master')

@section('title')
	Free Hair Cut
@endsection

@section('content')
<section class="booking-header">
    <div class="container py-3 mb-5" style="font-size: 18px;">       
        You are booking : <span class="cat-name">Free Hair Cut</span>
    </div>
</section>
<section>
    <div class="container">
        <div class="booking-card mb-5">
            <div class="booking-card-body">
                <form action="/book-free-hair-cut" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" >
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
                        <select class="form-control @error('city') is-invalid @enderror" name="city" id="exampleFormControlSelect1">
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
                        <input type="number" pattern="[0-9]*" inputmode="numeric" name="pincode" class="form-control @error('pincode') is-invalid @enderror" value="{{ old('pincode') }}">
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
                          <input type="text" pattern="[0-9]*" inputmode="numeric" name="alt_phone" maxlength="10" class="form-control @error('alt_phone') is-invalid @enderror" value="{{ old('alt_phone') }}" placeholder="Alt Phone (Optional)">
                            @error('alt_phone')
                                <span class="invalid-form-field" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
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
</section>
@endsection