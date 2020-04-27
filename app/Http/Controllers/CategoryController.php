<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use Auth;
use Session;

class CategoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $categories=categories::get();
        //$categories=json_decode(json_encode($categories));
        //  echo "<pre>"; print_r($categories); die;
        return view('pages.categories.view_category')->with('category',$categories);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $levels = categories::where(['root_id'=>0])->get();
        return view('pages.categories.add_category')->with('levels',$levels);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        
        if($request->ismethod('post')){
            
            $add_category_validation = $request->validate([
                'category_name' => 'required',
                'root_id' => 'required',
                'description' => 'required',
                'url' => 'required',
                
                
                ]);
                $data=$request->all();
                // echo "<pre>"; print_r($data); die;
                $category = new categories();
                $category->category_name=$data['category_name'];
                $category->root_id=$data['root_id'];
                $category->description=$data['description'];
                $category->url=$data['url'];
                $category->save();
                
                
            }
            return redirect()->back()->with('success','Category Added');;
        }
        
        /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
            
        }
        
        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        { 
            // $categoryDetails= categories::where(['id'=>$id])->first();
            $categoryDetails=categories::find($id);
            $levels = categories::where(['root_id'=>0])->get();
            return view('pages.categories.edit_category')->with(compact('categoryDetails','levels'));
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
            
            if($request->isMethod('PATCH')){
                $edit_category_validation = $request->validate([
                    'category_name' => 'required',
                    'root_id' => 'required',
                    'description' => 'required',
                    'url' => 'required',
                    
                    
                    ]);
                    
                    $data = request()->all();
                    // echo '<pre>'; print_r($input); die;
                    categories::where(['id'=>$id])->update(['category_name'=>$data['category_name'],'description'=>$data['description'],'url'=>$data['url']]);
                    return redirect ('/category')->with('success','Category Updated');;
                }
                
                
                
            }
            
            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function destroy($id)
            {
                
                if(!empty($id)){
                    categories::where(['id'=>$id])->delete();
                    return redirect ('/category')->with('success','Category Deleted');;
                }
            }
        }
