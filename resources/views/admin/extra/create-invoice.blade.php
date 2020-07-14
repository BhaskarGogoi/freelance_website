@extends('layouts.admin_dashboard')

@section('title')
	Create Invoice
@endsection

@section('content')

{{-- Modal Reject Modal --}}
<div class="modal fade" id="RejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/job-profile-action" role="form" method="POST">
        @csrf
        <div class="modal-body">
          {{-- @foreach($jobprofile as $data)  
            <input type="hidden" name="job_profile_id" class="form-control"  value="{{$data->job_profile_id}}">
          @endforeach --}}
          <div class="form-group">
            <label class="col-form-label">Reject Reason:</label>
            <input type="text" name="reason" class="form-control" required>
          </div>  
          <input type="hidden" name="status" class="form-control"  value="Rejected">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" value="reject">Reject</button>
        </div>
      </form> 
    </div>
  </div>
</div>
{{-- End Reject Modal --}}


{{-- Accept Modal --}}
<div class="modal fade" id="AcceptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Accept</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
        @csrf
        <div class="modal-body">
          {{-- @foreach($jobprofile as $data)  
            {{-- <input type="hidden" name="job_profile_id" class="form-control"  value="{{$data->job_profile_id}}"> --}}
          {{-- @endforeach --}}
          <input type="hidden" name="status" class="form-control"  value="Accepted">
          Are you sure, you want to accept this profile?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" value="Accept">Confirm</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- End Accept Modal --}}


<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Create Invoice</h6>
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
            <h3 class="mb-0"></h3>
          </div>
          <div class="card-body" style="margin: 0 auto; width: 600px;">
            <form action="/export-invoice" method="get">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Order ID</label>
                  <input type="text" name="order_id" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Order Date</label>
                  <input type="date" name="date" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Bill To</label>
                  <input type="text" name="bill_to" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Address</label>
                  <input type="text" name="address" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">City</label>
                  <select class="form-control" name="city" id="exampleFormControlSelect1" required>
                    <option value="Jorhat">Jorhat</option>
                    <option value="Golaghat">Golaghat</option>
                    <option value="Dibrugarh">Dibrugarh</option>
                    <option value="Sivsagar">Sivsagar</option>                
                    <option value="Guwahati">Guwahati</option>               
                  </select>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">PIN</label>
                  <input type="text" name="pin" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Phone</label>
                  <input type="text" name="phone" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Procuct</label>
                  <input type="text" name="product_name" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Quantity</label>
                  <select class="form-control" name="qty" id="exampleFormControlSelect1" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>                
                    <option value="5">5</option>                
                    <option value="6">6</option>                
                    <option value="7">7</option>                
                    <option value="8">8</option>                
                    <option value="9">9</option>                
                    <option value="10">10</option>                
                  </select>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Price</label>
                  <input type="text" name="price" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Offer Price</label>
                  <input type="text" name="offer_price" class="form-control" autocomplete="off" value="0" required>
                  <small id="emailHelp" class="form-text text-muted">Keep it as <b>0</b> in case of no offer.</small>
                </div>
                <button type="submit" class="btn btn-primary">Generate</button>      
            </div>
            </form>
          </div> 
        </div>
      </div>
    </div>
    @endsection