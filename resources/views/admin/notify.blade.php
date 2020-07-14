@extends('layouts.admin_dashboard')

@section('title')
	Notify Me
@endsection

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Notify Me</h6>
          </div>
        </div>
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
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">Feedback ID</th>
                  <th scope="col" class="sort" data-sort="budget">Name</th>
                  <th scope="col" class="sort" data-sort="budget">Category</th>
                </tr>
              </thead>
              <tbody class="list">
               
                @foreach($phone as $data)     
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div class="media-body">
                      <span class="name mb-0 text-sm"> <i class="bg-warning"></i> {{$data->id}}</span>
                      </div>
                    </div>
                  </th>
                  <td >{{$data->phone}}</td>
                  <td >{{$data->category}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
            <nav aria-label="...">
              <ul class="pagination justify-content-center mb-0">
                {{ $phone->onEachSide(2)->links() }}
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    @endsection