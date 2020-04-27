<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Image;
use App\categories;
use App\products;



class ProductsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $product=products::all();
       // $cat=categories::get();
      //  $product=json_decode(json_encode($product));
        foreach($product as $key=>$val){
            
            $category=categories::where(['id'=>$val->category_id])->first();
            //echo '<pre>'; print_r($val->product_name); die; 
            $main_category= categories::where(['id'=>$product])->first();
            
          
            
           
            $product[$key]->category_name =optional($category)->category_name;
            $product[$key]->category_names ="abc";
          
            $product[$key]->category_id =optional($category)->id;
            $product[$key]->root_id =optional($category)->root_id;
            $product[$key]->maincategory_name =optional($main_category)->category_name;
         
            $sub_category= categories::where(['root_id'=>'id'])->get();
        }
        $sub_category= categories::where(['root_id'=>'id'])->get(['id','category_name']);
        
        //echo '<pre>'; print_r($sub_category); die;
        return view('pages.products.view_products')->with(compact('product','sub_category'));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //return products::all();
        $categories=categories::where(['root_id'=>0])->get();
        $category_select="<option selected disabled>Select</option>";
        foreach($categories as $category){
            $category_select.="<option value='".$category->id."'>".$category->category_name."</option>";
            $sub_category_select= categories::where(['root_id'=>$category->id])->get();
            foreach($sub_category_select as $sub_ctgry){
                $category_select .="<option value='".$sub_ctgry->id."'>&nbsp;--&nbsp;".$sub_ctgry->category_name."</option>";
            }
        }
        return view('pages.products.add_product')->with('category_select',$category_select);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
       
        if($request->isMethod('post')){

            $messages = [
                "inner_images.max" => "Maximum image upload limit is 5."
             ];
            
            $add_product_validation = $request->validate([
                'product_sku' => 'required|unique:products',
                'category_id' => 'required',
                'product_name' => 'required',
                'product_price' => 'required',
                'product_qnty' => 'required',
                'p_longDescription' => 'required',
                'product_image.*' => 'mimes:jpg,jpeg,bmp,png|max:2000',
                'inner_images.*' => 'max:2000',
                'inner_images' => 'max:5',
                   
                ],$messages);
                    
                
                
                
                $data=$request->all();
              
                    $products=new products();
                    $products->product_sku=$data['product_sku'];
                    $products->category_id=$data['category_id'];
                    $products->product_name=$data['product_name'];
                    $products->quantity=$data['product_qnty'];
                    $products->price=$data['product_price'];
                    $products->short_description=$data['p_sortDescription'];
                    $products->long_description=$data['p_longDescription'];
                    
                    
                    if($request->hasFile('product_image')){
                        $img_tmp=Input::file('product_image');
                        if($img_tmp->isValid()){
                            $img_extension=$img_tmp->getClientOriginalExtension();
                            $img_filename=rand(111,9999).'.'.$img_extension;
                            $large_img_dir='img/products/large/'.$img_filename;
                            $medium_img_dir='img/products/medium/'.$img_filename;
                            $small_img_dir='img/products/small/'.$img_filename;
                            
                            //make images
                            
                            Image::make($img_tmp)->save($large_img_dir);
                            Image::make($img_tmp)->resize(600,600)->save($medium_img_dir);
                            Image::make($img_tmp)->resize(300,300)->save($small_img_dir);
                            
                            $products->product_image=$img_filename;
                        }
                        
                    }
                    
                    
                    
                    // Inner Images upload
                    
                    
                    if ($request->hasFile('inner_images')) {
                        
                        foreach($request->file('inner_images') as $file){
                            $extension = $file->getClientOriginalExtension();
                            $inner_img_filename=rand(111,9999).'.'.$extension;
                            
                            $inner_img_dir='img/products/inner_images/'.$inner_img_filename;
                            
                            Image::make($file)->save($inner_img_dir);
                            $inner_img[] = $inner_img_filename;  
                            
                            
                            
                            
                            
                            
                            
                        }
                    }else{
                        echo "insert";
                    }
                    $products->inner_images=json_encode($inner_img);
                    
                    
                    $products->save();
                    return redirect()->back()->with('success','Product Added');
                    
                    
                    
                }
            }
            
            /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function show($id)
            {
                $detail_prod=products::find($id);
                $inner_img=json_decode($detail_prod->inner_images);
                $categories=categories::select('category_name')->where(['id'=>$detail_prod->category_id])->get();
               
               
                return view('pages.products.detail_view_product')->with(compact('detail_prod','inner_img','categories'));
            }
            
            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function edit($id)
            {
                //fetch product information
                $prod_data=products::find($id);
                
                //category select
                
                
                $categories=categories::where(['root_id'=>0])->get();
                $category_select="<option selected disabled>Select</option>";
                foreach($categories as $category){
                    if($category->id==$prod_data->category_id){
                        $selected="selected";
                    }else{
                        $selected="";
                    }
                    $category_select.="<option value='".$category->id."' ".$selected.">".$category->category_name."</option>";
                    $sub_category_select= categories::where(['root_id'=>$category->id])->get();
                    foreach($sub_category_select as $sub_ctgry){
                        if($sub_ctgry->id==$prod_data->category_id){
                            $selected="selected";
                        }else{
                            $selected="";
                        }
                        $category_select .="<option value='".$sub_ctgry->id."' ".$selected.">&nbsp;--&nbsp;".$sub_ctgry->category_name."</option>";
                    }
                }
                
                $inner_img=json_decode($prod_data->inner_images);
                //echo '<pre>'; print_r($inner_img); die;
                
                return view('pages.products.edit_product')->with(compact('prod_data','category_select','inner_img'));
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
                $messages = [
                    "inner_images.max" => "Maximum image upload limit is 5."
                 ];
                
                $edit_product_validation = $request->validate([
                    'product_name' => 'required',
                    'product_price' => 'required',
                    'product_qnty' => 'required',
                    'p_shortDescription' => 'required',
                    'p_longDescription' => 'required',
                    'product_image.*' => 'mimes:jpg,jpeg,bmp,png|max:2000',
                    'inner_images.*' => 'max:2000',
                    'inner_images' => 'max:5',
                   
                    ],$messages);
                    
                    
                    
                    $inner_img_name=products::find($id);
                    if($request->isMethod('PATCH')){
                        $prod_data = request()->all();
                      
                        if($request->hasFile('product_image')){
                            $img_tmp=Input::file('product_image');
                            if($img_tmp->isValid()){
                                $img_extension=$img_tmp->getClientOriginalExtension();
                                $img_filename=rand(111,9999).'.'.$img_extension;
                                $large_img_dir='img/products/large/'.$img_filename;
                                $medium_img_dir='img/products/medium/'.$img_filename;
                                $small_img_dir='img/products/small/'.$img_filename;
                                
                                //make images
                                
                                Image::make($img_tmp)->save($large_img_dir);
                                Image::make($img_tmp)->resize(600,600)->save($medium_img_dir);
                                Image::make($img_tmp)->resize(300,300)->save($small_img_dir);
                                
                                
                            }
                            
                        }else{
                            $img_filename=$prod_data['current_img'];
                        }
                        
                        if ($request->hasFile('inner_images')) {
                           // echo '<pre>'; print_r($inner_images); die;
                            
                            foreach($request->file('inner_images') as $file){
                                $extension = $file->getClientOriginalExtension();
                                $inner_img_filename=rand(111,9999).'.'.$extension;
                                
                                $inner_img_dir='img/products/inner_images/'.$inner_img_filename;
                                
                                Image::make($file)->save($inner_img_dir);
                                $inner_img[] = $inner_img_filename;  
                                
                                
                              
                                
                                
                                
                            }
                            $inner_img_filename=json_encode($inner_img);
                           
                        }else{
                            $inner_img_filename=$inner_img_name->inner_images;
                        }
                       
                        products::where(['id'=>$id])->update(['category_id'=>$prod_data['category_id']
                        ,'product_name'=>$prod_data['product_name'],'price'=>$prod_data['product_price']
                        ,'quantity'=>$prod_data['product_qnty'],'short_description'=>$prod_data['p_shortDescription']
                        ,'long_description'=>$prod_data['p_longDescription'],'product_image'=>$img_filename,'inner_images'=>$inner_img_filename]);
                        return redirect ('/product')->with('success','Product Updated');;
                        
                        
                        
                        
                        
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
                    products::find($id)->delete();
                    return redirect()->back()->with('success','Product Deleted');;
                }
            }
