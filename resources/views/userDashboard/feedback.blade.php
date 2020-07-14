@extends('layouts.master')

@section('title')
	Feedback
@endsection

@section('content')
<div class="full-height">
<br><br>
<section>
    <div class="container">
        <div class="booking-card mb-5">
            <div class="booking-card-body">
                <form action="/submit-feedback" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Describe</label>
                        <textarea class="form-control @error('feedback') is-invalid @enderror" rows="5" name="feedback" value="{{ old('feedback') }}" placeholder="Give us your valueable feedback/suggestions" required></textarea>
                        @error('feedback')
                            <span class="invalid-form-field" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div> 
    </div>
</section>
</div>
@endsection