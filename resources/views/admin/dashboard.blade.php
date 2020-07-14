@extends('layouts.admin_dashboard')

@section('title')
	Dashboard
@endsection

@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  {{-- Job Profile Graph --}}
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Verified',      {{$verified_job_profiles_count}} ],
        ['Unverified',     {{$unverified_job_profiles_count}} ],      
        ['Rejected',      {{$rejected_job_profiles_count}} ],
        ['Disqualified',  0 ]
      ]);

      var options = {
        title: '',
        colors: ['#26ae60', '#0A79DF', '#E8290B', '#E8290B', '#f6c7b6']
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>

   {{-- Users Graph --}}
  <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Partners',     {{$partners_count}}],
        ['Customer',      {{$customers_count}}]
      ]);

      var options = {
        title: '',
        pieHole: 0.4,
      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
      chart.draw(data, options);
    }
  </script>

   {{-- Boookings Graph --}}
   <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Completed',     {{$completed_bookings_count}}],
        ['Assigned',      {{$assigned_bookings_count}}],
        ['Pending',      {{$new_bookings_count}}],
        ['Cancelled',      {{$cancelled_bookings_count}}],
        
      ]);

      var options = {
        title: '',
        pieHole: 0.4,
        colors: ['#26ae60', '#0A79DF', '#F4C724', '#E8290B', '#f6c7b6']
      };

      var chart = new google.visualization.PieChart(document.getElementById('bookings'));
      chart.draw(data, options);
    }
  </script>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <p style="color: #fff;">Bookings Summery</p>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="#" class="btn btn-sm btn-neutral">Filters</a>
          </div>
        </div>
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <a href="/bookings/Pending">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase  mb-0">New Bookings <span style="color: #ffa800; font-size: 16px;"><i class="far fa-clock"></i></span> </h5>
                      <span class="h2 font-weight-bold mb-0">{{$new_bookings_count}}</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <a href="/bookings/Assigned">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase mb-0">Assigned Bookings <span style="color:#0A79DF; font-size: 16px;"><i class="fas fa-user-check"></i></span></h5>
                      <span class="h2 font-weight-bold mb-0">{{$assigned_bookings_count}}</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <a href="/bookings/Completed">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase mb-0">Completed Bookings <span style="color: green; font-size: 16px;"> <i class="fas fa-clipboard-check"></i></span></h5>
                      <span class="h2 font-weight-bold mb-0">{{$completed_bookings_count}}</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <a href="/bookings/All">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase mb-0">Total Bookings</h5>
                      <span class="h2 font-weight-bold mb-0">{{$total_bookings_count}}</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Latest Bookings</h3>
              </div>
              <div class="col text-right">
                <a href="/bookings/All" class="btn btn-sm btn-primary">See all</a>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">B_ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Category</th>
                  <th scope="col">Address</th>
                  <th scope="col">City</th>
                  <th scope="col">status</th>
                  <th scope="col">View</th>
                </tr>
              </thead>
              <tbody>
                @foreach($booking as $data)
                <tr>
                  <th>{{$data->booking_id}}</th>
                  <td>{{$data->name}}</td>
                  <td>{{$data->category}}</td>
                  <td>{{$data->address}}</td>
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
                  <td><a href="/bookings-detail/{{$data->booking_id}}"><button type="button" class="btn btn-primary">View</button></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header bg-transparent">
            <div class="row align-items-center">
              <div class="col">
                <h5 class="h3 mb-0">Statistics</h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-4">
                <ul style="line-height: 2.3em; font-weight:bold;">
                  <li>Total Bookings: {{$total_bookings_count}}</li>
                </ul>
                <div id="bookings" style="width: 500px; height: 350px;"></div>
              </div>
              <div class="col-sm-4">
                <ul style="line-height: 2.3em; font-weight:bold;">
                  <li>Total Job Profiles: {{$total_job_profiles_count}}</li>
                </ul>
                <div id="piechart" style="width: 500px; height: 350px;"></div>
              </div>
              <div class="col-sm-4">
                <ul style="line-height: 2.3em; font-weight:bold;">
                  <li>Total Registered Users: {{$totalRegisteredUsers}}</li>
                </ul>
                <div id="donutchart" style="width: 500px; height: 350px;"></div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
    @endsection