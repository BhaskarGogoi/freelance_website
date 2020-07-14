@extends('layouts.master')

@section('title')
	Create Freelance Profile
@endsection

@section('content')
<section class="my-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-header bg-blue">
              <h4 class="card-title">Create Freelance Profile</h4>               
            </div>
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
            @endif
            <div class="card-body">
              <div style="max-width: 600px;font-size: 18px; margin: 0 auto;">
                  <form action="/create_freelance_profile" method="POST" enctype="multipart/form-data">
                      @csrf
                      {{-- <div class="form-group">
                          <label for="exampleFormControlSelect1">Service you offer</label>
                          <select class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required>
                            <option value="">SELECT</option>
                            <option value="">--------Home Service-------</option>
                            @foreach($home_service as $i)
                            <option value="{{$i->id}}">{{$i->category_name}}</option>
                            @endforeach
                            <option value="">--------Freelance-------</option>
                            @foreach($freelance as $i)
                            <option value="{{$i->id}}">{{$i->category_name}}</option>
                            @endforeach
                          </select>
                          @error('category')
                            <span class="invalid-form-field" role="alert">{{ $message }}</span>
                          @enderror
                      </div> --}}
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Example file input</label>
                        <input type="file" class="form-control-file @error('Image1') is-invalid @enderror" id="exampleFormControlFile1"  value="{{ old('Image1') }}" name="Image1" required>
                        @error('Image1')
                            <span class="invalid-form-field" role="alert">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Example file input</label>
                        <input type="file" class="form-control-file @error('Image2') is-invalid @enderror" id="exampleFormControlFile1"  value="{{ old('Image2') }}" name="Image2" required>
                        @error('Image2')
                            <span class="invalid-form-field" role="alert">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Example file input</label>
                        <input type="file" class="form-control-file @error('Image3') is-invalid @enderror" id="exampleFormControlFile1"  value="{{ old('Image3') }}" name="Image3" required>
                        @error('Image3')
                            <span class="invalid-form-field" role="alert">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                          <input type="hidden" class="form-control" name="profile_id" value="{{$profile_id}}" required>
                      </div>
                    <button type="submit" name="submit" class="btn btn-primary">Create</button>
                    </form>
              </div>       
            </div>
          </div><br>
        </div>
      </div>
    </div>
  </section>
	
@endsection