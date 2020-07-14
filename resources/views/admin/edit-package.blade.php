@extends('layouts.admin_dashboard')

@section('title')
	Edit Package
@endsection

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Packages</h6>
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
            <h3 class="mb-0">Edit Package </h3>
          </div>         
          <div class="p-4">
            <form action="/update-package" method="POST">
                @csrf
                <div class="form-group">
                    <label>Package ID</label>
                    <input type="text" class="form-control" name="package_id" value="{{$item->package_id}}" readonly required>
                </div>
                <div class="form-group">
                  <label>Package Name</label>
                  <input type="text" class="form-control" name="package_name" value="{{$item->package_name}}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form> 
          </div>          
        </div>
      </div>
    </div>
    @endsection