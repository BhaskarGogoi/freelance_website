@extends('layouts.package')

@section('title')
	Select Packages Items
@endsection
@section('header-text')
    {{$showcategory}}
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="otherPackagesLinks">
                @foreach($packages as $data)  
                    <a href="/select-package-items/{{$category}}/{{$data->package_id}}">
                        <button>{{$data->package_name}}</button>
                    </a>                  
                @endforeach
            </div>            
        </div>
    </div>
</section>
<section style="background-image: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);">
    <div class="container my-3">
        <div class="row">
            <div class="col-sm-12 package-item">
                <div class="package-name">{{$packageName}}</div>
                <form action="/checkout" method="GET">
                {{-- <button id="btn" type="submit" class="continueButton">Book Now</button><br><br> --}}
                @foreach($packageItems as $data)                                           
                    <div class="form-group form-check">
                        <?php
                            $dynamicID = preg_replace("/[^a-zA-Z]+/", "", $data->package_item_name); //to use as id for javascript operations

                        ?>
                        <input type="checkbox" name="package_list[]" class="form-check-input" id="{{$dynamicID}}" onchange="myFunction(this)" value="{{$data->package_item_id}}">
                        <label class="checkbox" for="{{$dynamicID}}">
                            <div class="row">
                                <div class="col-sm-8">
                                    <p>  <img src='{{asset('storage/'.'../images/package/package-item-image/'.$data->package_item_id.'.jpg')}}' onerror="this.style.display='none'">
                                        {{$data->package_item_name}}<br>
                                        @if($data->package_item_offer_price == $data->package_item_price)
                                            <span class="offer_price"><i class="fas fa-rupee-sign"></i> {{$data->package_item_offer_price}}</span>
                                        @else
                                            <span class="offer_tag"><i class="fas fa-tag"></i> {{$data->discount}}% off</span><br>
                                            <span class="offer_price"><i class="fas fa-rupee-sign"></i> {{$data->package_item_offer_price}}</span>
                                            <span class="original_price"><i class="fas fa-rupee-sign"></i> {{$data->package_item_price}} </span> 
                                         @endif                       
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    QTY &nbsp;
                                    <select name="package_item_qty[]" id="{{$data->package_item_id}}" disabled>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>                            
                            {{$data->description}}
                        </label>
                        <input type="hidden" name="category" class="form-control" value="{{$category}}" >
                    </div>                              
                 @endforeach
                 <button type="submit" id="cont" class="cont">Book Now</button>
                </form>
            </div>
            
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            
        </div>
    </div>
</section>
@endsection

{{-- Show the continue button on selecting any package --}}
@section('script')
<script type="text/javascript">
    $('#btn').hide();
    $( ".form-check-input" ).on( "click", function() {
        if($( ".form-check-input:checked" ).length > 0)
        {
            $('#btn').show();
        }
        else
        {
            $('#btn').hide();
        }  
    });
    $('#cont').hide();
    $( ".form-check-input" ).on( "click", function() {
        if($( ".form-check-input:checked" ).length > 0)
        {
            $('#cont').show();
        }
        else
        {
            $('#cont').hide();
        }  
    });

    function myFunction(checkObject) {
        let value = checkObject.value;
        let value1 = checkObject.id;
        if ($("#" + value1).is(":checked")) {
            console.log("Kam korise");
            $('#' + value).removeAttr("disabled")
        }
        else {
            $('#' + value).prop('disabled', 'disabled');
        }
    };
    var img = document.getElementById("myImg");
        img.onerror = function () { 
        this.style.display = "none";
    }
</script>
@endsection