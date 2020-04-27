@extends('layouts.master')
@section('content-source')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="../public/products">Products</a> <a href="#" class="current">View Products</a> </div>
    <h1>View Products</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Main Category</th>
                  <th>Sub Category</th>
                  <th>Product Name</th>
                  <th>Product Quantity</th>
                  <th>Product Price (LKR)</th>
                  <th>Product Short Description</th>
                  <th>Product Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if(count($product)>0)
                @foreach ($product as $products)
                <tr class="gradeX">
                  <td>{{$products->id}}</td>
                  
                  @foreach ($sub_category as $sub_categories)
                  @if ($products->root_id==$sub_categories->id)
                  <td>{{$sub_categories->category_name}}</td>
                  @endif
                  @endforeach
                  
                  <td>{{$products->category_name}}</td>
                  <td>{{$products->product_name}}</td>
                  <td>{{$products->quantity}}</td>
                  <td>{{$products->price}}</td>
                  <td>{{$products->short_description}}</td>
                  <td>
                    
                    <img width="170px" src="{{asset('/img/products/small/'.$products->product_image)}}" alt="No image">
                    
                  </td>
                  
                  <td class="center"><a href="product/{{$products->id}}" class="btn btn-success btn-mini">
                    View details</a> 
                    
                    
                    <a href="product/{{$products->id}}/edit" class="btn btn-primary btn-mini">
                      Edit</a>                      
                      <form style="display:inline" action="{{url('product', [$products->id])}}" method="POST">
                        {{method_field('DELETE')}}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger btn-mini" value="Delete" id="delProd"/>      
                      </form>    
                    </tr>
                    
                    @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  @endsection