@extends('layouts.admin_dashboard')

@section('title')
	Job Profiles
@endsection

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Job Profiles</h6>
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
            <h3 class="mb-0">Light table</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">Job Profile ID</th>
                  <th scope="col" class="sort" data-sort="budget">Name</th>
                  <th scope="col" class="sort" data-sort="status">Category</th>
                  <th scope="col" class="sort" data-sort="status">Status</th>
                  <th scope="col" class="sort" data-sort="status">View</th>
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
                  <td >{{$data->firstname}} {{$data->lastname}}</td>
                  <td>{{$data->category_name}}</td>
                  <td>{{$data->status}}</td>
                  <td>
                    <a href="/job-profile-details/{{$data->job_profile_id}}"><button type="button" class="btn btn-primary">View</button></a>
                    {{-- <p><a href="{{route('test', $id)}}" class="btn btn-info btn-xs" role="button">know more</a> --}}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
            <nav aria-label="...">
              <ul class="pagination justify-content-end mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <i class="fas fa-angle-left"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">
                    <i class="fas fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    @endsection