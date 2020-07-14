@extends('layouts.master')

@section('title')
	Booking Details
@endsection

@section('content')
{{-- Cancel Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Cancel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/cancel-booking" method="POST">
                @csrf
                <input type="hidden" name="booking_id" value="{{$bookings->booking_id}}">
                <input type="hidden" name="action" value="Cancelled">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form> 
        </div>
    </div>
</div>
{{-- Cancel Modal --}}
<div class="full-height">
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="my-3">Booking Details</h5>
                <div class="card mb-4 shadow-sm" style="border:none;">
                    <div class="card-body">
                    <h6 class="card-title"><b>Booking id: </b> #{{$bookings->booking_id}}</h6><hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <b> {{$bookings->category}} </b><br><br>
                                
                                @if(!$package->isEmpty()) 
                                    <div class="package-order-details">                                   
                                        @foreach($package as $data)                                            
                                            <div class="list">
                                                <div class="name"><i class="fas fa-circle circle"></i> {{$data->package_item_name}}</div>
                                                @if(!(($bookings->category == 'Taxi' || $bookings->category == 'Career-Vehicle' || $bookings->category == 'Home-Appliance-Repairer') && $data->price == 0))
                                                    <div class="price">{{$data->package_item_qty}} x Rs. {{$data->price}} <br></div>
                                                @endif
                                            </div>
                                        @endforeach
                                        <hr>
                                        <div style="float:right; text-align:right;">
                                          @if($discount_price)
                                            <b>Subtotal  &nbsp; &nbsp;<i class="fas fa-rupee-sign"></i> {{$totalPrice}}</b><br>
                                            <b style="color: #009578;">Discount   &nbsp; &nbsp;<i class="fas fa-rupee-sign"></i> -{{$discounted_price}}</b><br>
                                            <b>Total   &nbsp; &nbsp;<i class="fas fa-rupee-sign"></i> {{$discount_price}}</b>
                                          @else
                                            @if(($bookings->category == 'Taxi' || $bookings->category == 'Career-Vehicle' || $bookings->category == 'Home-Appliance-Repairer') && $data->price == 0)
                                                <b>Total:   &nbsp; Not Generated</b><br>
                                            @else
                                                <b>Total   &nbsp;<i class="fas fa-rupee-sign"></i> {{$totalPrice}}</b><br>
                                            @endif
                                          @endif
                                        </div><br><br><br>
                                    </div>
                                @endif
                                @if($bookings->category == 'Taxi' || $bookings->category == 'Career-Vehicle')
                                    <b>Journey:</b> {{$bookings->description}}<br><br> 
                                @endif
                                <b>Booked For:</b> {{$bookings->date}}<br>
                                <b>Status:</b> {{$bookings->status}}<br>
                                <b>Payment: </b> Cash<br>
                                @if($bookings->status == 'Pending')
                                   <br>
                                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Cancel</button>
                                @endif
                                <br><br>
                            </div>
                            <div class="col-sm-6">
                                <b>Address</b><br>
                                {{$bookings->name}}<br>
                                {{$bookings->address}}<br>
                                Landmark: {{$bookings->landmark == '' ? 'Not Available' : $bookings->landmark}}<br>
                                {{$city->city_name}}<br>
                                {{$bookings->pin}}<br>
                            </div>
                        </div>
                        @if($jobprofile == 'Not Assigned')
                            <hr>
                            <h6 class="card-title"><b>Service Person: </b> Not Assigned </h6><br>
                        @else
                            <hr>
                            <h6 class="card-title"><b>Service Person: </b> {{$jobprofile->firstname}} {{$jobprofile->lastname}}</h6><br>
                           
                        @endif             
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection