@extends('layouts.master')

@section('title')
	Free Hair Cut
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="quota-completed">
                <div class="col-sm-12">
                    <div class="photo">
                        <img src="../images/quota-completed.png" alt=""><br><br>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="description">
                            <p>
                                <h3>Oops! Daily quota for free hair cut service is over.</h3>
                                Your can try book on an another day.<br>
                                Or you can avail our paid hair cut service(s) at any time.<br><br>
                                <a href="/select-packages/Hair-Cut" ><button>Book Now</button></a>
                            </p>
                    </div>
                </div>
                
            </div>            
        </div>
    </div>
</section>
@endsection
