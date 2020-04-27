@extends('layouts.master')

@section('content-source')

<div class="container">
  
  <div class="row">
    <h1 style="align:center;"> Welcome to Admin Panel </h1>
    <div class="col-sm-4">
      <br>
      
      <div class="card" style="width: 18rem;">
        <img src="{{asset('/img/gallery/products.jpg')}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Manage Products</h5>
          <p class="card-text">Click this button to Add/View/Edit or Delete Products which included in the current system. </p>
          <a href="/AdminPanel/public/products" class="btn btn-primary">Manage Products</a>
        </div>
      </div>
      {{-- <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        
        <div class="panel-body">
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
          
          You are logged in!
        </div>
      </div> --}}
    </div>
    <div class="col-sm-4">
      <br>
      
      <div class="card" style="width: 18rem;">
        <img src="{{asset('/img/gallery/category.png')}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Manage Categories</h5>
          <p class="card-text">Click here to Add/View/Edit or Delete Product categories or sub categories which assigned to product identification. </p>
          <a href="/AdminPanel/public/category" class="btn btn-primary"> Manage Categories</a>
        </div>
      </div>
      
    </div>
    <div class="col-sm-4">
      <br>
      
      <div class="card" style="width: 18rem;">
        <img src="{{asset('/img/gallery/report.png')}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Generate Report</h5>
          <p class="card-text">Click here to view or generate a report about the overall products in CSV or PDF format.</p>
          <a href="/AdminPanel/public/report" class="btn btn-primary">Generate Reports</a>
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection
