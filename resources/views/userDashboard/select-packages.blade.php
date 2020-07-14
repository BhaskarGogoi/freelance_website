@extends('layouts.package')

@section('title')
	Select Packages
@endsection
@section('header-text')
    {{$category}}
@endsection

@section('content')
<section>
    <div class="package-banner-image" style="background-image: url(../images/package/{{$url_category}}.jpg);">
    </div>
    <div class="container my-3">
        <div class="row">        
            <div class="card package-card shadow">
                <ul class="list-group list-group-flush">
                @foreach($packages as $data) 
                    <a href="/select-package-items/{{$url_category}}/{{$data->package_id}}">
                        <li class="list-group-item">{{$data->package_name}} <i class="fas fa-chevron-right"></i></li><br>
                    </a>
                @endforeach
                </ul>            
            </div> 
        </div>
    </div>
</section>
<section class="package-bottom-ribbon">
    <div class="container">
        <div class="row">
            {!!html_entity_decode($bullet_point_content)!!}
            <div class="col-sm-12">
                <p><i class="far fa-hand-point-right"></i> High quality products and equipment.</p>
            </div>
            <div class="col-sm-12">
                <p><i class="far fa-hand-point-right"></i> Wide range of options and services.</p>
            </div>
            <div class="col-sm-12">
                <p><i class="far fa-hand-point-right"></i> Experienced professionals.</p>
            </div>
            <div class="col-sm-12">
                <p><i class="far fa-hand-point-right"></i> Value for money service.</p>
            </div> 
        </div>
    </div>
</section>
@if($reviews != '[]')
    <section class="package-review">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="heading">Customer Reviews</div>
                </div>
                @foreach($reviews as $review)
                        <div class="col-sm-12">
                            <p><div class="avatar">{{$review->name[0]}}</div>
                                <div class="name">{{$review->name}}</div>
                                <div class="review">{{$review->review}}</div>
                            </p>
                        </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
<section style="background-color: #8B78E6;">
    <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="row">
            <div style="text-align: center; width: 100%;">
                <h5 style="font-size: 16px;">These Services are currently available only in Jorhat</h5>
            </div>
        </div>
    </div>
</section>

@endsection

    

