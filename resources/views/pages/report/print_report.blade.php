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
  <h1>  Stock Report </h1>
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
  
  
  
</body>

</html>