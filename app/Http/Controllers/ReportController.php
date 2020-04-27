<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Image;
use App\categories;
use App\products;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CsvExport;
use App\Exports\CsvExport_view;
use PDF;

class ReportController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
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
     

        return view('pages.report.report')->with(compact('report','sub_category'));
    }

    public function getPDF()
    {
        $report=products::all();
        foreach($report as $key=>$val){
            $category=categories::where(['id'=>$val->category_id])->first();
            $main_category= categories::where(['id'=>$report])->first();
            $report[$key]->category_name =optional($category)->category_name;
            $report[$key]->category_id =optional($category)->id;
            $report[$key]->root_id =optional($category)->root_id;
            $report[$key]->maincategory_name =optional($main_category)->category_name;
            $sub_category= categories::where(['root_id'=>'id'])->get();
        }
        $pdf=PDF::loadView('pages.report.stockreport', array('report' => $report,'sub_category'=>$sub_category));
        return $pdf->download('Stock_Report.pdf');
       
    }

    public function getCSV()
    {
        return Excel::download(new CsvExport(), 'CsvExport.xlsx');
        
    }
    
    public function getCSV_view()
    {
        return Excel::download(new CsvExport_view(), 'CsvExport_view.xlsx');
        
    }


    public function getPrint()
    {
        $report=products::all();
        foreach($report as $key=>$val){
            $category=categories::where(['id'=>$val->category_id])->first();
            $main_category= categories::where(['id'=>$report])->first();
            $report[$key]->category_name =optional($category)->category_name;
            $report[$key]->category_id =optional($category)->id;
            $report[$key]->root_id =optional($category)->root_id;
            $report[$key]->maincategory_name =optional($main_category)->category_name;
            $sub_category= categories::where(['root_id'=>'id'])->get();
        }
        
        return view('pages.report.print_report')->with(compact('report','sub_category'));
       
    }
    
    
    
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }
    
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
}
