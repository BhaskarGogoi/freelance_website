@extends('layouts.master')

@section('title')
	Cart
@endsection

@section('content')
<section class="booking-header">
    <div class="container py-3 mb-5" style="font-size: 18px;">       
        Cart Summery
    </div>
</section>
<section>
    <div class="container my-3">
        <div class="row">
            <div class="col-sm-12">
                <form action="/get-packages" method="GET">
                @csrf
                @foreach($package_item_name as $data) 
                    <div class="card" style="width: 100%;">
                        <div class="card-body shadow-sm">
                        <h5 class="card-title">{{$data['name']}} </h5>
                        <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-rupee-sign"></i> {{$data['price']}} </h6>
                        </div>
                    </div><br>                                        
                @endforeach
                <button type="submit" class="continueButton" style="float:right;">Book Now</button>
                </form>
            </div>
                
        </div>
    </div>
</section>

@endsection