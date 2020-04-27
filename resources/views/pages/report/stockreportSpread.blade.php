<!DOCTYPE html>
<html>
<head>
  <title>Stock Report</title>
  <style>
    table, th, td {
      padding: 10px;
      border: 1px solid black; 
      border-collapse: collapse;
      width:100%;
    }
  </style>
</head>
<body>
  
  <table class="table table-bordered data-table">
    <thead>
      <tr>
        <th><b>Product Name</b></th>
        <th><b>Main Category</b></th>
        <th><b>Sub Category</b></th>
        <th><b>Quantity</b></th>
        
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
  
  
  
</body>

</html>