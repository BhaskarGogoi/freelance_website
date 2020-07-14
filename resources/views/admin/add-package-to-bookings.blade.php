@extends('layouts.admin_dashboard')

@section('title')
	Add Package to Bookings
@endsection

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Add Package To Bookings</h6>
            <a href="/bookings-detail/{{$booking_id}}"><button>Go Back To Booking</button></a>
          </div>
        </div>
        @if (session('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
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
                  <div class="col-sm-12">
                      <div class="card shadow">
                        <div class="card-header mb-0">
                            <b>Select Package</b>
                            <form action="/add-package-to-booking" method="get" style="display: inline; margin-left: 40px;">
                                <input type="hidden" name="booking_id" value="{{$booking_id}}">
                                <input type="hidden" name="category" value="{{$category}}">
                                <input type="hidden" name="ref" value="{{$booking_ref}}" required>
                                <select name="package_id" required>
                                    @foreach($package as $data)
                                        <option value="{{$data->package_id}}">{{$data->package_name}}</option>
                                    @endforeach
                                </select>
                                <button type="submit">Go</button>
                            </form>
                            @if($selected_package)
                              <span style="margin-left: 200px; font-weight:bold;">{{$selected_package->package_name}}</span>
                            @endif
                            
                        </div>
                        @if($packageItem)
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                  <thead class="thead-light">
                                    <tr>
                                      <th scope="col" class="sort" data-sort="name">ID</th>
                                      <th scope="col" class="sort" data-sort="budget">Package Item Name</th>
                                      <th scope="col" class="sort" data-sort="status">Offer Price</th>
                                      <th scope="col" class="sort" data-sort="status">Price</th>
                                      <th scope="col" class="sort" data-sort="status">Discount</th>
                                      <th scope="col" class="sort" data-sort="status">Qty</th>
                                      <th scope="col" class="sort" data-sort="status">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody class="list">
                                   
                                    @foreach($packageItem as $data)     
                                    <tr>
                                      <th scope="row">
                                        <div class="media align-items-center">
                                          <div class="media-body">
                                            <span class="name mb-0 text-sm"> <i class="bg-warning"></i> {{$data->package_item_id}}</span>
                                          </div>
                                        </div>
                                      </th>
                                      <td>{{$data->package_item_name}}</td>
                                      <td>{{$data->package_item_offer_price}}</td>
                                      <td>{{$data->package_item_price}}</td>
                                      <td>{{$data->discount}}</td>
                                        <form action="/add-pkg-to-booking" method="get">
                                            <td>
                                                <select name="qty" required>
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
                                            </td>
                                            <input type="hidden" name="package_item_id" value="{{$data->package_item_id}}" required>
                                            <input type="hidden" name="ref" value="{{$booking_ref}}" required>
                                            <td><button type="submit">Add</button></td>
                                        </form>
                                      {{-- <td >{{$data->name}}</td>
                                      <td>{{$data->category}}</td>
                                      <td>{{$data->city_name}}</td>
                                      <td>
                                        @if($data->status== 'Completed')
                                          <span style="color: green;"><i class="fas fa-clipboard-check"></i> Completed</span>
                                        @elseif($data->status == 'Cancelled')
                                          <span style="color: #E44236;"><i class="fas fa-ban"></i> Cancelled</span>                            
                                        @elseif($data->status == 'Assigned')
                                          <span style="color:#0A79DF;"><i class="fas fa-user-check"></i> Assigned</span>
                                        @else
                                          <span style="color: #ffa800;"><i class="far fa-clock"></i> Pending</span>                            
                                        @endif
                                      </td>
                                      <td>
                                        <a href="/bookings-detail/{{$data->booking_id}}"><button type="button" class="btn btn-primary">View</button></a>
                                      </td> --}}
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                        </div>
                        @endif
                      </div>
                  </div>
              </div>
          </div> 
        </div>
      </div>
    </div>
    @endsection