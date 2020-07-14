@extends('layouts.admin_dashboard')

@section('title')
	Job Profiles
@endsection

@section('content')

{{-- Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="save-category" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Category Name:</label>
              <input type="text" name="category_name" class="form-control" id="category">
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
          <div class="card-footer py-4">
            <nav aria-label="...">
              <ul class="pagination justify-content-center mb-0">
                {{ $jobprofiles->links() }}
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    @endsection