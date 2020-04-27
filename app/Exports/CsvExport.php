<?php

namespace App\Exports;

use App\products;
use App\categories;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class CsvExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $report=products::all('product_name','quantity');
        
            $category=categories::where(['id'=>$val->category_id])->first();
             $main_category= categories::where(['id'=>$report])->first();
            //$main_category= categories::where(['id'=>$report])->get(['category_name'])->first();
           
            $report[$key]->category_name =optional($category)->category_name;
            $report[$key]->category_id =optional($category)->id;
            $report[$key]->root_id =optional($category)->root_id;
            $report[$key]->maincategory_name =optional($main_category)->category_name;
            $sub_category= categories::where(['root_id'=>'id'])->get(['category_name']);
            
                  
          
        
        
     
        return view('pages.report.stockreport', [
            'report' => $report
        ]);

    
        

         
    }
}
