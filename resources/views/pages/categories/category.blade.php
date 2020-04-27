@extends('layouts.master')
@section('content-source')
<div class="container">
    
    <div class="row">
        <h1 style="align:center;">Add or Manage Categories </h1>
        <hr>
        <div class="col-sm-4">
            <br>
            <img style="width:210px;" src="{{asset('/img/gallery/add_cat.png')}}" class="card-img-top" alt="..."><br><br><br>
            <a href='/AdminPanel/public/category/create'>  <button style="margin-left:30px;" class="btn btn-primary btn-large">Add Category</button></a>
        </div>
        
        <div class="col-sm-4">
            <br>
            <img style="width:250px;" src="{{asset('/img/gallery/category_change.png')}}" class="card-img-top" alt="..."><br>
            
            <a href='/AdminPanel/public/category'> <button style="margin-left:25px;" class="btn btn-primary btn-large">View / Edit Category</button></a>
        </div>
        
    </div>
</div>


@endsection