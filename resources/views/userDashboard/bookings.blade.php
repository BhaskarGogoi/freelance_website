@extends('layouts.master')

@section('title')
	Bookings
@endsection

@section('content')
<div class="full-height">
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 my-1 p-1">
				@if (session('status'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{ session('status') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif
			  </div>
			  <div class="col-sm-12 mt-2 py-3">
          @if(!$bookings->first())
            <div class="card shadow-sm p-2 mb-3 bg-white rounded">
              <div class="card-header bg-transparent">
                Your bookings</span>
              </div>
                <div class="card-body">
                  <div style="text-align:center;">
                    <img src="../images/icons/empty_box.png">
                  </div>
                  <p class="card-text">Oops! You have not booked any services yet.</p>
                  <a href="/" class="btn btn-primary">Book Now</a>
                </div>
            </div>
          @else
          <h4>Bookings</h4>
          @foreach($bookings as $data)
            <div class="card-hover">              
                <div class="card shadow-sm  my-3 bg-white rounded" style="border:none;">
                  <div class="card-body bookings-card-list">
                    <ul>               
                      <li>
                        <a href="/booking-details/{{$data->booking_id}}">
                        <div style="width: 100%; display:inline-block;">
                          <span class="bookings-service-name">{{$data->category}}</span>
                          <span class="float-right job-status">
                            @if($data->status== 'Completed')
                              <span style="color: green;"><i class="fas fa-clipboard-check"></i> Completed</span>
                            @elseif($data->status == 'Cancelled')
                              <span style="color: #E44236;"><i class="fas fa-ban"></i> Cancelled</span>                            
                            @else
                              <span style="color: #ffa800;"><i class="far fa-clock"></i> Processing</span>                            
                            @endif
                          </span>
                          <br>
                          <div class="bookings-service-details">
                            <?php
                              echo date('d-m-Y', strtotime($data->created_at));
                            ?> | {{$data->status}}
                          </div>                                                 
                        </div>
                      </a>
                      @if($data->status == 'Completed' && $data->review == '0')
                        <hr>
                        <div class="review"><a href='/write-review/{{$data->booking_id}}'>Write Review</a></div>
                      @endif 
                    </li>                
                  </ul>
                </div>                  
              </div>              
            </div>            
          @endforeach
          @endif
        </div>
		</div>
	</div>
</section>
</div>
@endsection