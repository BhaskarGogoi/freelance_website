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
              <h5 class="card-title">Select Category</h5>
              <form action="/become-a-partner/step-3" method="POST">
                @csrf
                <div class="form-group">
                  <select class="form-control form-control-lg" name="category" required>
                    <option value="">Select</option>
                    @foreach($category as $i)
                        <option value="{{$i->id}}">{{$i->category_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">                    
                    <input type="hidden" class="form-control" name="city" value="{{$city}}" required>                    
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