@extends('layouts.master')

@section('title')
	View Freelance Profile
@endsection
@section('content')
<section style="background-color: #fafafa;">
<section>
<div class="container py-3">
    <div class="row">     
    <div class="col-md-12">
      <div class="card shadow-sm">
        <div class="card-header">
          Freelance Profile Images
        </div>
        <div class="card-body freelance-profile" style="font-size: 17px;">
            <div class="row" style="margin: 0 auto;">
                <div class="col-sm-12">
                    <div class="canvas">
                        <img src="../images/Freelance-Profile-Images/{{$img_1}}" alt="">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="canvas">
                        <img src="../images/Freelance-Profile-Images/{{$img_2}}" alt="">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="canvas">
                        <img src="../images/Freelance-Profile-Images/{{$img_3}}" alt="">
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
</div>
</section>
</section>
@endsection