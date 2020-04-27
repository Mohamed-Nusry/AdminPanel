@extends('layouts.master')

@section('content-source')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="category">Categories</a> <a href="#" class="current">View Categories</a> </div>
    <h1>View Category</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Category</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>Category Level</th>
                  <th>Category URL</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if(count($category)>0)
                @foreach ($category as $categories)
                <tr class="gradeX">
                  <td>{{$categories->id}}</td>
                  <td>{{$categories->category_name}}</td>
                  <td>{{$categories->root_id}}</td>
                  <td>{{$categories->url}}</td>
                  <td class="center"><a href="category/{{$categories->id}}/edit" class="btn btn-primary btn-mini">
                    Edit</a> 
                    
                    <form style="display:inline" action="{{url('category', [$categories->id])}}" method="POST">
                      <input type="submit" class="btn btn-danger btn-mini" value="Delete" id="delCat"/>
                      {{method_field('DELETE')}}
                      {{ csrf_field() }}
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
  @endsection