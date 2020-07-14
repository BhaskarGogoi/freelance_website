@extends('layouts.master')

@section('title')
	Book Service
@endsection

@section('content')
<section>
    <div class="package-banner-image" style="background-image: url(../images/package/{{$category_name}}.jpg); margin-top: 0px;">
    </div>

</section>
<section>
    <div class="container" style="max-width: 600px; margin-top: -230px;">
        <div class="mb-3" style="text-align:center;">
            <button style="font-size: 18px; text-transform: capitalize; height: 45px; min-width: 100px; text-align:center; background-color: #E83350; color: #fff; border-radius: 15px; border: none; font-weight: bold; padding: 6px;">       
                {{$category_name}}
             </button>
        </div>
        <div class="booking-card mb-5" style="opacity: 90%;">
            <div class="booking-card-body">
                <form action="/book-service" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="category" class="form-control" value="{{$category_name}}" required>
                        <input type="hidden" name="package_item_id" class="form-control" value="{{$package_item_id}}" required>
                    </div>
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
                    <button type="submit" class="btn btn-primary">Book Now / Call Now</button>
                </form>
            </div>
        </div> 
    </div>
</section>
{{-- <section class="booking-bottom">
    <div class="container">
        <div class="row div1">
            <ul>
                <li><i class="fas fa-angle-right"></i> &nbsp; Skilled and certified plubmers.</li>
                <li><i class="fas fa-angle-right"></i> &nbsp; Background verified.</li>
                <li><i class="fas fa-angle-right"></i> &nbsp; Re-work guranteed T&C applied.</li>
            </ul>
        </div>
        <div class="row div2">
            <div class="header">How we work?</div>
        </div>
        <div class="bottom-stripe">
            <div class="bottom-stripe-points">
                <div class="image">
                    <img src="../images/icons/booking.png" alt="">
                </div>
                <div class="content">
                   Book your service.
                </div>
            </div>
            <div class="bottom-stripe-points">
                <div class="image">
                    <img src="../images/icons/support.png" alt="">
                </div>
                <div class="content">
                    Our customer executive will call the customer for confirmation.
                </div>
            </div>
            <div class="bottom-stripe-points">
                <div class="image">
                    <img src="../images/icons/inspection.png" alt="">
                </div>
                <div class="content">
                    Our service person will visit the customer and inspect the problem.
                </div>
            </div>
            <div class="bottom-stripe-points">
                <div class="image">
                    <img src="../images/icons/payment.png" alt="">
                </div>
                <div class="content">
                    Service cost will be quoted to the customer after inspection through an online generated bill.
                </div>
            </div>
            <div class="bottom-stripe-points">
                <div class="image">
                    <img src="../images/icons/payment-dollar.png" alt="">
                </div>
                <div class="content">
                    Customer can pay us through cash or online payment.
                </div>
            </div>
        </div>
    </div>
</section> --}}
{!!html_entity_decode($bottom_content)!!}
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