@extends('layouts.admin_dashboard')

@section('title')
	Cities
@endsection

@section('content')

{{-- Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="save-city" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">City:</label>
              <input type="text" name="city_name" class="form-control" id="category" required>
            </div> 
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select</label>
                <select class="form-control" name="state" id="exampleFormControlSelect1" required>
                  <option>Select</option>
                  <option value="Assam">Assam</option>
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
            <h6 class="h2 text-white d-inline-block mb-0">Category</h6>
          </div>
          <div class="col-lg-6 text-right">
            <button type="button" class="btn btn-neutral" data-toggle="modal" data-target="#exampleModal">ADD</button>
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
                  <th scope="col" class="sort" data-sort="name">ID</th>
                  <th scope="col" class="sort" data-sort="budget">City</th>
                  <th scope="col" class="sort" data-sort="budget">State</th>
                  <th scope="col" class="sort" data-sort="status">Created</th>
                  <th scope="col" class="sort" data-sort="status">Updated</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach($cities as $data)     
                <tr>                  
                  <td>{{$data->id}}</td>
                  <td>{{$data->city_name}}</td>
                  <td>{{$data->state}}</td>
                  <td>{{$data->created_at}}</td>
                  <td>{{$data->updated_at}}</td>
                  <td class="text-right">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
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