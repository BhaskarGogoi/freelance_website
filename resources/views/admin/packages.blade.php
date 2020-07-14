@extends('layouts.admin_dashboard')

@section('title')
	Packages
@endsection

@section('content')

{{-- Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/add-package" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Package Name:</label>
              <input type="text" name="package_name" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Select Category</label>
              <select class="form-control" name="category_id" id="exampleFormControlSelect1" required>
                <option value="">SELECT</option>
                @foreach($categories as $data)
              <option value="{{$data->id}}">{{$data->category_name}} - {{$data->category_type}}</option>
                @endforeach
              </select>
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
            <h6 class="h2 text-white d-inline-block mb-0">Packages</h6>
          </div>
          <div class="col-lg-6 text-right">
            <button type="button" class="btn btn-neutral" data-toggle="modal" data-target="#exampleModal">ADD</button>
            <button type="button" class="btn btn-neutral">Filter</button>
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
            <h3 class="mb-0">Latest Packages</h3>
          </div>          
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="ID">ID</th>
                  <th scope="col" class="sort" data-sort="Category Name">Package Name</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach($packages as $data)     
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div class="media-body">
                        <span class="name mb-0 text-sm"> <i class="bg-warning"></i> {{$data->package_id}}</span>
                      </div>
                    </div>
                   </th>
                  <td>
                    {{$data->package_name}}
                  </td>
                  <td class="text-right">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="/edit-package/{{$data->package_id}}">Edit</a>
                      </div>
                    </div>
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
                {{$packages->links()}}
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    @endsection