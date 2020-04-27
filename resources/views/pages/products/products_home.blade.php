@extends('layouts.master')

@section('content-source')
<div class="container">
        
        <div class="row">
                <h1 style="align:center;">Add or Manage Products </h1>
                <hr>
                <div class="col-sm-4">
                        <br>
                        <img src="{{asset('/img/gallery/add_prod.png')}}" class="card-img-top" alt="..."><br>
                        <a href='/AdminPanel/public/product/create'>  <button style="margin-left:30px;" class="btn btn-primary btn-large">Add Product</button></a>
                </div>
                
                <div class="col-sm-4">
                        <br>
                        <br>
                        <img style="width:230px;" src="{{asset('/img/gallery/product_change.png')}}" class="card-img-top" alt="..."><br>
                        <br>
                        <a href='/AdminPanel/public/product'> <button style="margin-left:25px;" class="btn btn-primary btn-large">View / Edit Product</button></a>
                </div>
                
        </div>
</div>


@endsection