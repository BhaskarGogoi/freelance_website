@extends('layouts.master')

@section('title')
	Write Review
@endsection

@section('content')
<div class="full-height">
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 my-1 p-1">
				@if (session('status'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{ session('status') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif
			  </div>
			  <div class="col-sm-12 mt-2 py-3">
                <h4>Write Review</h4>
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <form action="/submit-review" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="booking_id" value="{{$booking_id}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control"  name="review" rows="5" required></textarea>
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