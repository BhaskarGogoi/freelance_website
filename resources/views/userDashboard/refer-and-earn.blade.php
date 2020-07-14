@extends('layouts.master')

@section('title')
	Refer & Earn
@endsection

@section('content')
<div class="full-height">
<section style="padding-top: 20px;">
    <section>
        <div class="container my-3">
            <div class="row">
                <div class="col-sm-12">
                    <h4>Refer & Earn</h4>
                    <div class="card shadow-sm p-2 mt-4 mb-3 bg-white rounded" style="border:none;">
                        <div class="card-body">
                            <div style="text-align:center;">
                                <img src="../images/icons/referal.png">
                            </div>
                            @if(!$is_generated)
                                <form action="/generate-referal-code" method="get">
                                    <button type="submit" class="btn btn-primary">Generate Referal Link</button>
                                </form>
                            @else
                                <div style="text-align:center;">
                                    <p class="card-text">Share Generated Link</p>
                                    
                                    /register/{{$referal_code}}
                                </div>                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="full-height">
<section style="padding-top: 20px;">
@endsection