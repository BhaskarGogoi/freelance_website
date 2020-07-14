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
         @foreach($packageItems as $data)
          <div class="col-6 col-md-3">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="{{asset('storage/'.'../images/package/package-item-image/'.$data->package_item_id.'.jpg')}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$data->package_item_name}}</h5>
                  <p class="card-text">{{$data->description}}</p>
                  <form action="{{$action}}" method="GET">
                    <input type="hidden" name="category" value="{{$category->category_name}}">
                    <input type="hidden" name="package_item_id" value="{{$data->package_item_id}}">
                    <button type="submit" class="btn btn-primary">Book Now</button>
                  </form>  
                </div>
              </div>
          </div>       
         @endforeach
       </div>
   </div>
</section><br>

@endsection

    

