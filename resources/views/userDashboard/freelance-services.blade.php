@extends('layouts.master')

@section('title')
	{{$html_title}}
@endsection
@section('header-text')
    
@endsection

@section('content')
<br>
<section>
   <div class="container">
       <div class="row custom-card">
         @foreach($profiles as $data)
          <div class="col-6 col-md-4">
            <div class="card freelance-work-image" style="width: 100%;">
                <div class="img-container">
                    <img class="card-img-top" src="{{asset('storage/'.'../images/freelance_profile_images/'.$data->img_1)}}" alt="Card image cap">
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$data->firstname}} {{$data->lastname}}</h5>
                  {{-- <p class="card-text">{{$data->description}}</p> --}}
                <a href="/freelance-service-details/{{$data->job_profile_id}}"><button type="submit" class="btn btn-primary">View Details</button></a>
                </div>
            </div>
          </div>       
         @endforeach
       </div>
   </div>
</section><br>

@endsection

    

