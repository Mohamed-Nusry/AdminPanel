@extends('layouts.master')


@section('content-source')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../../home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="../../category">Categories</a> <a href="#" class="current">Edit Categories</a> </div>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)  <!--Check for errors-->
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <h1>Edit Category</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Form validation</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="POST"  action="{{url('category/'.$categoryDetails->id)}}" name="edit_category" id="edit_category" novalidate="novalidate">{{csrf_field()}} 
                {{method_field('PATCH')}} <!-- this version of laravel update method is PATCH-->
                {{ csrf_field() }}
                <div class="control-group">
                  <label class="control-label">Category Name</label>
                  <div class="controls">
                    <input type="text" name="category_name" id="category_name" value="{{$categoryDetails->category_name}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Category Level</label>
                  <div class="controls">
                    <select name="root_id" style="width:220px">
                      <option value="0">Main Category</option>
                      @foreach ($levels as $level)
                      <option value="{{$level->id}}" @if($level->id == $categoryDetails->root_id) selected @endif>{{$level->category_name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                
                <div class="control-group">
                  <label class="control-label">Description</label>
                  <div class="controls">
                    <textarea name="description" id="description">{{$categoryDetails->description}}</textarea>
                  </div>
                </div>
                
                
                <div class="control-group">
                  <label class="control-label">URL</label>
                  <div class="controls">
                    <input type="text" name="url" id="url" value="{{$categoryDetails->url}}">
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Edit category" class="btn btn-success">
                </div>
              </form> 
          
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  @endsection
