@extends('layouts.master')
@section('content-source')

<div id="content">
  
  <div id="content-header">
    <div id="breadcrumb"> <a href="../../home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="../">Products</a> <a href="#" class="current">Edit Product</a> </div>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error) <!--Check for errors-->
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <h1>Edit Product</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit existing Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('product/'.$prod_data->id)}}" name="edit_product" id="edit_product" novalidate="novalidate">{{csrf_field()}}
              {{method_field('PATCH')}} <!-- this version of laravel update method is PATCH-->
              {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Product Category Name</label>
                <div class="controls">
                  <select name="category_id" style="width:220px;" >
                    <?php echo $category_select;?>
                  </select>
                </div>
              </div>
              
              
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name" value="{{$prod_data->product_name}}">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Price (LKR)</label>
                <div class="controls">
                  <input type="number" name="product_price" id="product_price" value="{{$prod_data->price}}">
                </div>
              </div>
              
              
              <div class="control-group">
                <label class="control-label">Quantity</label>
                <div class="controls">
                  <input type="number" name="product_qnty" id="product_qnty" value="{{$prod_data->quantity}}">
                </div>
              </div>
              
              
              
              
              <div class="control-group">
                <label class="control-label">Short Description</label>
                <div class="controls">
                  <textarea style="width:600px; height:250px;" name="p_shortDescription" id="p_shortDescription">{{$prod_data->short_description}}</textarea>
                </div>
              </div>
              
              
              
              
              <div class="control-group">
                <label class="control-label">Long Description</label>
                <div class="controls">
                  <textarea name="p_longDescription" id="article-ckeditor" id="p_longDescription">{!!$prod_data->long_description!!}</textarea>
                </div>
              </div>
              
              
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  
                  <input type="file" name="product_image" id="product_image">
                  <input type="hidden" name="current_img" value="{{$prod_data->product_image}}">
                  <img style="width:80px;" src="{{asset('img/products/small/'.$prod_data->product_image)}}">
                </div>
              </div>
              
              
              <div class="control-group">
                <label class="control-label">Inner Images (Max-5)</label>
                <div class="controls">
                  <label for="exampleInputFile">Input images</label>
                  
                  <input type="file" name="inner_images[]" id="exampleInputFile" multiple>
                  
                  @for ($i = 0; $i < count($inner_img); $i++)
                  
                  
                  <img width="80px;"  src="{{asset('/img/products/inner_images/'.$inner_img[$i])}}" alt="image">
                  
                  @endfor
                  
                </div>
              </div>
              
              
              <div class="form-actions">
                <input type="submit" value="Update product" class="btn btn-success btnvalidate">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>

@endsection