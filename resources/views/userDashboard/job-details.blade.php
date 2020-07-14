@extends('layouts.master')

@section('title')
	Job Details
@endsection

@section('content')
{{-- Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mark As Complete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/job-action" method="POST">
                @csrf
                <input type="hidden" name="booking_id" value="{{$bookings->booking_id}}">
                <input type="hidden" name="action" value="Completed">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form> 
        </div>
    </div>
</div>
{{-- Mark as complete Modal --}}
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
                                
                                @if($package) 
                                    <div class="package-order-details">                                   
                                        @foreach($package as $data)                                            
                                            <div class="list">
                                                <div class="name"><i class="fas fa-circle"></i> {{$data->package_item_name}}</div>
                                                <div class="price" style="clear: both;
                                                display: inline-block;
                                                overflow: hidden;
                                                white-space: nowrap;">{{$data->package_item_qty}} x Rs. {{$data->price}} <br></div>
                                            </div>
                                        @endforeach
                                        <hr>
                                        <div style="float:right;">
                                          <b>Total  Rs. {{$totalPrice}}</b>
                                        </div><br><br>
                                    </div>
                                @endif 
                                @if($bookings->category == 'Taxi')
                                    <b>Journey:</b> {{$bookings->description}}<br><br> 
                                @endif
                                <b>Booked For:</b> {{$bookings->date}}<br>
                                <b>Status:</b> {{$bookings->status}}<br><br>
                            </div>
                            <div class="col-sm-6">
                                <b>Customer Address</b><br>
                                {{$user->name}}<br>
                                Address: {{$bookings->address}}<br>
                                Landmark: {{$bookings->landmark}}<br>
                                City: {{$city->city_name}}<br>
                                {{$bookings->pin}}<br>
                                Phone: <a href="tel:+91{{$bookings->phone}}">{{$bookings->phone}}</a><br>
                                Alt Phone: <a href="tel:+91{{$bookings->alt_phone}}">{{$bookings->alt_phone}}</a><br>
                            </div>
                            <div class="col-sm-12">
                                @if($bookings->status == 'Assigned')
                                    <br>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Mark As Complete</button>
                                    <br><br>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection