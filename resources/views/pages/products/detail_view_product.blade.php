@extends('layouts.master')

@section('content-source')
<img style="margin:auto;display:block;" src="{{asset('/img/products/small/'.$detail_prod->product_image)}}">
<br>

<div class="container">
        <div class="row">
                
                
                <div class="col-sm-3">
                </div>
                
                <div class="row">
                        
                        
                        <div class="col-sm">
                                @for ($i = 0; $i < count($inner_img); $i++)
                                <img width="80px;"  src="{{asset('/img/products/inner_images/'.$inner_img[$i])}}" alt="image">
                                @endfor
                                
                                
                        </div>
                </div>
                
        </div>
        <br>
        <p><span style="font-weight:bold;">Product Name -  </span>{{$detail_prod->product_name}}</p> 
        <br>
        <p><span style="font-weight:bold;">SKU -  </span>#{{$detail_prod->product_sku}}</p>
        <br> 
        
        @foreach ($categories as $category)
        <p><span style="font-weight:bold;">Category -  </span>{{$category->category_name}}</p>
        <br> 
        @endforeach
        
        <p><span style="font-weight:bold;">Price (LKR) -  </span>{{$detail_prod->price}} </p>
        <br>
        <p><span style="font-weight:bold;">Quantity -  </span>{{$detail_prod->quantity}}</p>
        <br>
        <p><span style="font-weight:bold;">Short Description - </span>{{$detail_prod->short_description}}</p>
        <br>
        <p style="display:inline-block"><span style="font-weight:bold;">Long Description -  </span>{!!$detail_prod->long_description!!}</p>
        <br>
        
        
        <a href="../product" class="btn btn-success ">Go Back</a> 
        <a href="../product/{{$detail_prod->id}}/edit" class="btn btn-success ">Edit</a> 
        
        
        @endsection