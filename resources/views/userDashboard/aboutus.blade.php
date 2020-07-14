@extends('layouts.user')

@section('title')
	About Us
@endsection

@section('content')

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add About Us</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>         
        </div>
        <form action="/save-aboutus" method="POST">
          {{csrf_field()}}
          <div class="modal-body">
            
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Title:</label>
                <input type="text" name="title" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Sub-Title:</label>
                <input type="text" name="subtitle" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Description:</label>
                <textarea class="form-control" name="description" id="message-text"></textarea>
              </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
      </div>
    </div>
  </div>


  <style>
    .w-10p{
      width: 10% !important;
    }
  </style>
	<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> About Us
                  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add</button>
                </h4>               
              </div>
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
              @endif
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th class="w-10p">Id</th>
                      <th class="w-10p">Title</th>
                      <th class="w-10p">Subtitle</th>
                      <th class="w-10p">Description</th>
                      <th class="w-10p">Edit</th>
                      <th class="w-10p">Delete</th>            
                    </thead>
                    <tbody>
                      @foreach($aboutus as $data)
                      <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->subtitle}}</td>
                        <td>
                        <div style="height: 81px; overflow:hidden;">
                          {{$data->description}}
                        </div>     
                        </td>                                                          
                        <td> <a href="#"  class="btn btn-success">Edit</a></td>
                        <td> <a href="#"  class="btn btn-danger">Delete</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')
@endsection