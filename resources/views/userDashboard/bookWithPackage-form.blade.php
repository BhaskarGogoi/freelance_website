@extends('layouts.master')

@section('title')
	Book Service
@endsection

@section('content')
<section class="booking-header">
    <div class="container py-3 mb-5" style="font-size: 18px;">       
        You are booking : <span class="cat-name">{{$url_category}}</span>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="checkout-card">
                    @foreach($package_item_details as $data)
                        <p>
                            <img src="../images/package/package-item-image/{{$data['item_id']}}.jpg" onerror="this.style.display='none'">
                            {{$data['item_name']}}
                            <span>x  {{$data['item_qty']}} = <i class="fas fa-rupee-sign"></i> {{$data['item_price']}}</span>
                        </p><br>
                    @endforeach
                    <hr>
                    <h6>Total: <i class="fas fa-rupee-sign"></i> {{$total_price}}</h6><br><br>
                    @if($discount_price)
                        <h6 style="float-right; color: #009578;">Discounted Price: <i class="fas fa-rupee-sign"></i> {{$discount_price}}</h6><br><br>
                        
                    @endif
                    @if($coupon_status == 'Applied')
                        <h5>Coupon Applied : {{$coupon_name}}</h5>
                    @elseif($coupon_status == 'Invalid')
                        <h5 style="color: #d00b3e;">Invalid Coupon</h5>
                    @elseif($coupon_status == 'Not Eligible')
                        <h5 style="color: #d00b3e;">Not eligible at this price</h5>
                    @elseif($coupon_status == 'Expired')
                        <h5 style="color: #d00b3e;">Coupon expired</h5>
                    @elseif($coupon_status == 'Redeemed')
                        <h5 style="color: #d00b3e;">You have already redeemed this coupon.</h5>
                    @endif
                     <form action="/apply-coupon" method="get">
                        <div class="form-group">
                            <label>Apply Coupon</label>
                            <div class="row">
                                <div class="col-8">
                                    <input type="hidden" name="category" class="form-control" value="{{$url_category}}" >
                                    <input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" value="{{ old('coupon_name') }}" >
                                    @error('coupon_name')
                                        <span class="invalid-form-field" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-warning" type="submit">Apply</button>
                                </div>
                            </div>
                        </div>
                     </form>
                     
                </div>
            </div>
            <div class="col-md-6">
                <div class="booking-card mb-5">
                    <div class="booking-card-body">
                        <form action="/bookWithPackage" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="category" class="form-control" value="{{$url_category}}" >
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="user_id" class="form-control" value="{{$user_id}}" >
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" required value="{{ old('address') }}" >
                                @error('address')
                                    <span class="invalid-form-field" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Landmark</label>
                                <input type="text" name="landmark" class="form-control @error('landmark') is-invalid @enderror" value="{{ old('landmark')}}" placeholder="Optional">
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
                                <label>Date </label>
                                <input type="date" id="dueDate" name="date" required><br>
                            </div>
                            <div class="form-group">
                                <label>Describe</label>
                                <textarea class="form-control @error('describe') is-invalid @enderror" rows="3" name="describe" value="{{ old('describe') }}" placeholder="Describe your requirements (optional)"></textarea>
                                @error('describe')
                                    <span class="invalid-form-field" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="hidden" name="coupon_id" value="{{$coupon_id}}" readonly>
                            <button type="submit" class="btn btn-primary">Confirm Booking</button>
                        </form>
                    </div>
                </div> 
            </div>
        </div>        
    </div>
</section>
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