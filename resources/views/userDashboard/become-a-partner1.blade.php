@extends('layouts.master')

@section('title')
	Become a Partner
@endsection

@section('content')
<div class="full-height">
<section>  
    <div class="container py-5">
      <div class="row">
        <div class="col-sm-12">
          <div class="card shadow-sm p-2 mb-3 bg-white rounded">
            <div class="card-body py-4">
              <h5 class="card-title">Select City</h5>
              <form action="/become-a-partner/step-2" method="POST">
                @csrf
                <div class="form-group">
                  <select class="form-control form-control-lg" name="city" required>
                    <option value="">Select</option>
                    <option value="2">Golaghat</option>
                    <option value="3">Jorhat</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
 
</section>
</div>
@endsection