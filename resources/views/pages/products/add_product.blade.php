@extends('layouts.master')
@section('content-source')

<!-- Add product page-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="../products">Products</a> <a href="#" class="current">Add Product</a> </div>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error) <!--Check for errors-->
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <h1>Add Product</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add New Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('product')}}" name="add_product" id="add_product" novalidate="novalidate">{{csrf_field()}}
              
              
              
              <div class="control-group">
                <label class="control-label">Product Category Name</label>
                <div class="controls">
                  <select name="category_id" style="width:220px;" >
                    <?php echo $category_select;?>
                  </select>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Product SKU</label>
                <div class="controls">
                  <input type="number" name="product_sku" id="product_sku">
                </div>
              </div>
              
              
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Price (LKR)</label>
                <div class="controls">
                  <input type="number" name="product_price" id="product_price">
                </div>
              </div>
              
              
              <div class="control-group">
                <label class="control-label">Quantity</label>
                <div class="controls">
                  <input type="number" name="product_qnty" id="product_qnty">
                </div>
              </div>
              
              
              
              
              <div class="control-group">
                <label class="control-label">Short Description</label>
                <div class="controls">
                  <textarea  style="width:600px; height:250px;" name="p_sortDescription" id="p_sortDescription"></textarea>
                </div>
              </div>
              
              
              
              
              <div class="control-group">
                <label class="control-label">Long Description</label>
                <div class="controls">
                  <textarea name="p_longDescription" id="article-ckeditor" id="p_longDescription"></textarea>
                </div>
              </div>
              
              
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <input type="file" name="product_image" id="product_image">
                </div>
              </div>
              
              <div class="control-group">
               <!-- Inner images-->
                <div class="controls">
                  <label for="exampleInputFile">Inner Images (Max-5)</label>
                  <input type="file" name="inner_images[]" id="exampleInputFile" multiple>
                </div>
              </div>
              
              <div class="form-actions">
                <input type="submit" value="Add product" class="btn btn-success btnvalidate">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>

@endsection