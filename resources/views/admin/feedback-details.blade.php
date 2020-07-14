@extends('layouts.admin_dashboard')

@section('title')
	Feedback Details
@endsection

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Feedback</h6>
          </div>
        </div>
        @if (session('status'))
              <div class="alert alert-primary" role="alert">
                  {{ session('status') }}
              </div>
          @endif
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0"></h3>
          </div>
          <div class="card-body">
              <div class="row">
                  <div class="col-sm-6">
                      <div class="card shadow">                          
                          <div class="card-body">
                            <h4>Feedback ID : {{$feedbacks->feedback_id}}</h4>
                            <h4>Name: {{$feedbacks->name}}</h4>
                            <h4>Submitted On: {{$feedbacks->created_at}}</h4>
                            <h4>Feedback:</h4>
                            <p style="line-height: 30px; font-family: 'Open Sans', Arial;">
                              {{$feedbacks->feedback}}<br>                               
                            </p>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="card shadow">                          
                        <div class="card-body">
                          <h4>Contact Details</h4>
                          <h4>Phone: {{$user->phone}}</h4>
                          <h4>Email: {{$user->email}}</h4>
                        </div>
                    </div>
                </div>
                  
              </div>
              
          </div> 
        </div>
      </div>
    </div>
    @endsection