@extends('layouts.master')

@section('title')
	Dashboard
@endsection

@section('content')

<section style="background-color: #ddd;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 secondary-navbar">
                <ul>
                    <li><a href="/dashboard" class="{{ 'dashboard' == request()->path() ? 'active' : ''}}">Dashboard</a></li>
                    <li><a href="/view-profile" class="{{ 'view-profile' == request()->path() ? 'active' : ''}}">Job Profile</a></li>
                    <li><a href="/account" class="{{ 'account' == request()->path() ? 'active' : ''}}">Account</a></li>
                    
                </ul>
            </div>
        </div>
    </div>
</section>
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
            <div class="col-sm-8 mt-2 p-3">
                @if($users->profile_created == 0)
                  <div class="card shadow-sm p-2 mb-3 bg-white rounded">
                    <div class="card-header bg-transparent">
                      Create Job Profile</span>
                    </div>
                      <div class="card-body">
                        <p class="card-text">To work for clients you have to create your job profile.</p>
                        <a href="job-profile-create" class="btn btn-primary">Create Now</a>
                      </div>
                  </div>
                @else
                  <div class="card shadow-sm p-2 mb-3 bg-white rounded">
                    <div class="card-header bg-transparent">
                      Your Job Profile - {{$category->category_name}}</span>
                    </div>
                    <div class="card-body">
                      <p class="card-text">
                          <ul>
                            <li>Total Task Completed: 0</li>
                            <li>Total Earning: &#8377; 0</li>
                          </ul>
                      </p>
                      <a href="/view-profile" class="btn btn-primary">View Details</a>
                    </div>
                  </div>
                @endif
                <div class="card shadow-sm p-2 mb-3 bg-white rounded">
                    <div class="card-header bg-transparent">
                      Current Task</span>
                    </div>
                    <div class="card-body">
                      <p class="card-text">Not Current Task!</p>
                    </div>
                </div>
                <div class="card shadow-sm p-2 mb-5 bg-white rounded">
                    <div class="card-header bg-transparent">
                      Your latest tasks <span class="float-right">View All</span>
                    </div>
                    <div class="card-body">
                        <img src="../images/icons/no-data.png">
                        <h6>No data found!</h6>
                      {{-- <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Earning</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                          </tr>
                        </tbody>
                      </table> --}}
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-2 p-3">
                <div class="card shadow p-2 mb-4 rounded" style="background-color: rgb(98,146,250); color: #fff;">
                    <div class="card-body">
                      <h5 class="card-title">Welcome!</h5>
                      <p class="card-text">{{$users->name}}</p>
                      <a href="/account" class="btn btn-warning">View Profile</a>
                    </div>
                </div>
                {{-- <div class="card shadow p-2 mb-5 rounded bg-dark">
                  <div class="card-header bg-dark" style="color: #fff;">
                    Notifications
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">&#10162; Profile Successfully Created</li>
                    <li class="list-group-item">&#10162; Porfile has been verified</li>
                    <li class="list-group-item">&#10162; You have got a new task</li>
                    <li class="list-group-item">&#10162; Task Completed</li>
                  </ul>
                </div> --}}
            </div>
        </div>
    </div>  
</section>
@endsection
