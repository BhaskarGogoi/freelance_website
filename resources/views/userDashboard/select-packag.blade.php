@extends('layouts.package')

@section('title')
	Select Packages
@endsection
@section('header-text')
    {{$category}}
@endsection

@section('content')
<section>
    <div class="container my-3">
        <div class="row">
            <div class="col-sm-12 packages">
                <form action="/get-packages" method="GET">
                @csrf
                @foreach($packageItems as $data)                                           
                    <div class="form-group form-check">
                        <input type="checkbox" name="package_list[]" class="form-check-input" id="{{$data->package_item_name}}" value="{{$data->package_item_id}}">
                        <label class="checkbox" for="{{$data->package_item_name}}">
                            <p> <img src="../images/package/package-item-image/3.jpg">
                                {{$data->package_item_name}}<br>
                                <i class="fas fa-rupee-sign"></i> {{$data->package_item_id}}
                                
                            </p></label>
                        <input type="hidden" name="category" class="form-control" value="{{$url_category}}" >
                    </div>                              
                @endforeach
                {{-- @foreach($packageItems as $data)                                           
                    <div class="form-group form-check">
                        <input type="checkbox" name="package_list[]" class="form-check-input" id="{{$data->package_item_name}}" value="{{$data->package_item_id}}">
                        <label class="checkbox" for="{{$data->package_item_name}}">{{$data->package_item_name}} - Price: {{$data->package_item_id}}</label>
                        <input type="hidden" name="category" class="form-control" value="{{$url_category}}" >
                    </div>                              
                @endforeach --}}
                <button type="submit" class="continueButton">Continue</button>
                </form>
            </div>
                
        </div>
    </div>
</section>

@endsection