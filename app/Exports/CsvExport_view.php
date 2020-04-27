<?php

namespace App\Exports;

use App\products;
use App\categories;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class CsvExport_view implements FromView
{
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $report=products::all();
        //$cat=categories::get();
        //$product=json_decode(json_encode($product));
        foreach($report as $key=>$val){
            $category=categories::where(['id'=>$val->category_id])->first();
            $main_category= categories::where(['id'=>$report])->first();
            $report[$key]->category_name =optional($category)->category_name;
            $report[$key]->category_id =optional($category)->id;
            $report[$key]->root_id =optional($category)->root_id;
            $report[$key]->maincategory_name =optional($main_category)->category_name;
            $sub_category= categories::where(['root_id'=>'id'])->get();
                  
        }
        
     
        return view('pages.report.stockreportSpread', [
            'report' => $report
            ,'sub_category'=>$sub_category
        ]);

    
        

         
    }
    }
