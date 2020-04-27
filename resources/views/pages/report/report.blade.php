@extends('layouts.master')

@section('content-source')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="../public/products">Report</a> <a href="#" class="current">Stock Report</a> </div>
    <h1>Stock Report</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Stock Report</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Main Category</th>
                  <th>Sub Category</th>
                  <th>Quantity</th>
                  
                </tr>
              </thead>
              <tbody>
                @if(count($report)>0)
                @foreach ($report as $reports) 
                <tr class="gradeX">
                  <td>{{$reports->product_name}}</td>
                  
                  
                  
                  @foreach ($sub_category as $sub_categories)
                  
                  
                  @if ($reports->root_id==$sub_categories->id)
                  <td>{{$sub_categories->category_name}}</td>
                  @endif
                  
                  @endforeach
                  
                  <td>{{$reports->category_name}}</td>
                  <td>{{$reports->quantity}}</td>
                  
                  
                  
                  
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
<a href="/AdminPanel/public/getCSV"><button class="btn btn-success">Generate CSV</button>
  <a href="/AdminPanel/public/getPDF"><button class="btn btn-danger">Generate PDF</button>
    <a href="/AdminPanel/public/getPrint" class="btnprn"><button class="btn btn-primary">Print</button>
      
      
    </div>
    
    @endsection