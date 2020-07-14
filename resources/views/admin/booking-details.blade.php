@extends('layouts.admin_dashboard')

@section('title')
	Booking Details
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
      <form action="/booking-action" method="POST">
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
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancel Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/booking-action" method="POST">
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
<div class="modal fade" id="addCustomPackage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/add-custom-package" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Package Name</label>
              <input type="text" name="package_name" class="form-control" autocomplete="off" required>
              <input type="hidden" name="booking_id" class="form-control" value="{{$bookings->booking_id}}" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Quantity</label>
              <select class="form-control" name="qty" id="exampleFormControlSelect1" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>                
                <option value="5">5</option>                
                <option value="6">6</option>                
                <option value="7">7</option>                
                <option value="8">8</option>                
                <option value="9">9</option>                
                <option value="10">10</option>                
              </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Price</label>
              <input type="text" name="price" class="form-control" autocomplete="off" required>
            </div>       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form> 
    </div>
  </div>
</div>
{{-- End Modal --}}
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Booking Details</h6>
          </div>
        </div>
        @if (session('status'))
              <div class="alert alert-primary" role="alert">
                  {{ session('status') }}
              </div>
          @endif
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0"></h3>
          </div>
          <div class="card-body">
              <div class="row">
                  <div class="col-sm-6">
                      <div class="card shadow">
                          <div class="card-header mb-0">
                            <b>Client Details</b> <a href="/autoGenerateInvoice/{{$bookings->booking_id}}"><button class="btn btn-primary float-right">Export Invoice</button> </a>
                          </div>
                          <div class="card-body">
                            <h4>Booking Id: {{$bookings->booking_id}}</h4>
                            <p style="line-height: 30px; font-family: Arial;">
                                Category: {{$bookings->category}}<br>
                                Name: {{$bookings->name}}<br>
                                Address: {{$bookings->address}} <br>
                                Landmark: {{$bookings->landmark}}<br>
                                City: {{$bookings->city_name}}<br>
                                Pin: {{$bookings->pin}}<br>
                                Phone: {{$bookings->phone}}<br>
                                Alternate Phone: {{$bookings->alt_phone}}<br>
                                Description: {{$bookings->description}}<br>
                                Date: {{$bookings->date}}<br>
                                <?php
                                    echo "Booking Date: ". date('d-m-Y', strtotime($bookings->created_at)) . "<br>";
                                    echo "Booking Time: ".date("g:i a", strtotime($bookings->created_at));
                                ?>
                                <br>
                                Status: {{$bookings->status}}<br>

                            </p>
                            @if($bookings->status == 'Assigned')
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Mark As Complete</button>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2">Cancel</button>
                            @elseif($bookings->status == 'Pending')
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2">Cancel</button>
                            @endif                            
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="card shadow">
                        <div class="card-header mb-0">
                          <b>Service Man Details</b>
                        </div>
                        <div class="card-body">
                          @if($bookings->assigned_to == 'Not Assigned')
                            <form action="/bookings-detail/{{$bookings->booking_id}}" method="GET" role="form">
                                @csrf
                                <div>
                                    <select class="form-control"  name="category_id"  id="exampleFormControlSelect1" required>
                                        <option value="">Select</option>
                                        @foreach($category as $data)
                                            <option value = "{{$data->id}}">{{$data->category_name}}</option>
                                        @endforeach
                                    </select><br>
                                    <button class="btn btn-primary" type="submit" >Submit</button>
                                </div>
                            </form>
                          @else
                            <h4>Job Profile Id: {{$service_man->job_profile_id}}</h4>
                            <p style="line-height: 30px; font-family: Arial;">
                                Category: {{$service_man->category_name}}<br>
                                Assigned To: {{$service_man->firstname}} {{$service_man->lastname}}<br>
                                Address: {{$service_man->address}}<br>
                                City: {{$service_man->city_name}}<br>
                                Pincode: {{$service_man->pincode}}<br><br>
                                <a href="/job-profile-details/{{$service_man->job_profile_id}}"><button type="button" class="btn btn-primary">View Details</button></a>
                            </p>
                          @endif
                        </div>
                    </div>
                  </div>
                  @if($bookedPackageDetails)
                  <div class="col-sm-6">
                    <div class="card shadow">
                        <div class="card-body">
                          @if($bookings->status != 'Completed')
                          <button type="button" class="btn btn-warning float-right ml-3" data-toggle="modal" data-target="#addCustomPackage">Add Custom Package</button>
                            <form action="/add-package-to-booking" method="get">
                              <input type="hidden" name="booking_id" value="{{$bookings->booking_id}}">
                              <input type="hidden" name="category" value="{{$bookings->category}}">
                              <input type="hidden" name="ref" value="{{$bookings->package}}">
                              <button type="submit" class="btn btn-primary float-right mb-3">Add Package</button>
                            </form>
                          @endif
                          <table class="table table-borderless">
                            <thead>
                              <tr>
                                <th scope="col">Package Name</th>
                                <th scope="col">Qty</th>
                                <th scope="col"><i class="fas fa-rupee-sign"></i> Price</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($bookedPackageDetails as $data)
                              <tr>
                                <td>{{$data->package_item_name}}</td>
                                <td>{{$data->package_item_qty}}</td>
                                <form action="/edit-package-booking-price" method="get">
                                  <td> <input type="text" name="price" value="{{$data->price}}" required></td>
                                  <td>
                                      <input type="hidden" name="package_booking_id" value="{{$data->package_booking_id}}" required>
                                      <button type="submit" style="border:none; color: green; background:none;"><i class="far fa-check-circle"></i></button>
                                  </td>
                                </form>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
                @else
                  <div class="col-sm-6">
                    <div class="card shadow">
                        <div class="card-body">
                          @if($bookings->status != 'Completed')                            
                            <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#addCustomPackage">Add Custom Package</button>
                          @endif
                          @if($bookedPackageDetails)
                          <table class="table table-borderless">
                            <thead>
                              <tr>
                                <th scope="col">Package Name</th>
                                <th scope="col">Qty</th>
                                <th scope="col"><i class="fas fa-rupee-sign"></i> Price</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($bookedPackageDetails as $data)
                              <tr>
                                <td>{{$data->package_item_name}}</td>
                                <td>{{$data->package_item_qty}}</td>
                                <td>Rs. {{$data->price}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          @endif
                        </div>
                    </div>
                </div>
                @endif
                @if($bookings->review != '0' && $bookings->status == 'Completed')
                  <div class="col-sm-6">
                    <div class="card shadow">
                        <div class="card-body">
                          <p><b>Review: </b> {{$bookings->review}}</p>
                        </div>
                    </div>
                </div>
                @endif
              </div>
              <div class="col-sm-12">
                @if($viewProfiles)
                    @if(!$jobprofiles->isEmpty())
                    <div class="card shadow">
                        <div class="card-header mb-0">
                        <b>Service Man Details</b>
                        </div>
                        <div class="card-body">
                             <!-- Light table -->
                            <div class="table-responsive">
                              <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                  <tr>
                                    <th scope="col" class="sort" data-sort="name">ID</th>
                                    <th scope="col" class="sort" data-sort="budget">Name</th>
                                    <th scope="col" class="sort" data-sort="status">Address</th>
                                    <th scope="col" class="sort" data-sort="status">City</th>
                                    <th scope="col" class="sort" data-sort="status">Pin</th>
                                    <th scope="col" class="sort" data-sort="status">Service Time</th>
                                    <th scope="col" class="sort" data-sort="status">View</th>
                                    <th scope="col" class="sort" data-sort="status">Action</th>
                                  </tr>
                                </thead>
                                <tbody class="list">
                                  @foreach($jobprofiles as $data)   
                                  <tr>
                                    <th scope="row">
                                      <div class="media align-items-center">
                                        <div class="media-body">
                                          <span class="name mb-0 text-sm"> <i class="bg-warning"></i> {{$data->job_profile_id}}</span>
                                        </div>
                                      </div>
                                    </th>
                                    <td>{{$data->firstname}} {{$data->lastname}}</td>
                                    <td>{{$data->address}}</td>
                                    <td>{{$data->city_name}}</td>
                                    <td>{{$data->pincode}}</td>
                                    <td>
                                      <a href="/job-profile-details/{{$data->job_profile_id}}"><button type="button" class="btn btn-primary">View</button></a>
                                    </td>
                                    <td>
                                      <form action="/bookings-detail-assign" method="post">
                                        @csrf 
                                        <input type="hidden" name="booking_id" class="form-control"  value="{{$bookings->booking_id}}">
                                        <input type="hidden" name="job_profile_id" class="form-control"  value="{{$data->job_profile_id}}">
                                        <input type="hidden" name="service_man_name" class="form-control"  value="{{$data->firstname}}">
                                        <input type="hidden" name="service_man_phone" class="form-control"  value="{{$data->phone}}">
                                        <input type="hidden" name="client_phone" class="form-control"  value="{{$bookings->phone}}">
                                        <input type="hidden" name="client_name" class="form-control"  value="{{$bookings->name}}">
                                        <button type="submit" class="btn btn-primary">Assign</button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card shadow">
                        <div class="card-header mb-0">
                        <b>Service Man Details</b>
                        </div>
                        <div class="card-body">
                            No Profiles Available
                        </div>
                    </div>
                    @endif
                @endif
              </div>
          </div> 
        </div>
      </div>
    </div>
    @endsection