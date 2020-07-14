@extends('layouts.admin_dashboard')

@section('title')
	Edit Package Item
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
            <form action="/update-package-item" method="POST">
              @csrf
              <div class="form-group">
                  <label>Package ID</label>
                  <input type="text" class="form-control" name="package_item_id" value="{{$item->package_item_id}}" readonly required>
              </div>
              <div class="form-group">
                <label>Package Name</label>
                <input type="text" class="form-control" name="package_item_name" value="{{$item->package_item_name}}" required>
              </div>
              <div class="form-group">
                  <label>Price</label>
                  <input type="text" class="form-control" name="item_price" value="{{$item->package_item_price}}" required>
              </div>
              <div class="form-group">
                  <label>Offer Price</label>
                  <input type="text" class="form-control" name="item_offer_price" value="{{$item->package_item_offer_price}}" required>
              </div>
              <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" id="package_item_description" name="package_item_description" rows="3">{{$item->description}}</textarea>
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>  
          </div>          
        </div>
      </div>
    </div>
    @endsection