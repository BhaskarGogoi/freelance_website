@extends('layouts.admin_dashboard')

@section('title')
	Bookings
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
              <h6 class="h2 text-white d-inline-block mb-0">Bookings</h6>
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
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Booking ID</th>
                    <th scope="col" class="sort" data-sort="budget">Name</th>
                    <th scope="col" class="sort" data-sort="status">Category</th>
                    <th scope="col" class="sort" data-sort="status">City</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col" class="sort" data-sort="status">View</th>
                  </tr>
                </thead>
                <tbody class="list">
                 
                  @foreach($booking as $data)     
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm"> <i class="bg-warning"></i> {{$data->booking_id}}</span>
                        </div>
                      </div>
                    </th>
                    <td >{{$data->name}}</td>
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
                  {{$booking->links()}}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>



@endsection