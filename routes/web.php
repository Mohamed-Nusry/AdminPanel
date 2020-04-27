<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('home');
});
Route::get('products', function () {
    return view('pages.products.products_home');
});

Route::get('categories', function () {
    return view('pages.categories.category');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//Products
Route::Resource('/product','ProductsController');

//Report
Route::Resource('/report','ReportController');

//Category
Route::Resource('/category','CategoryController');

Route::get('/getPDF', 'ReportController@getPDF');

Route::get('/getCSV', 'ReportController@getCSV_view')->name('CsvExport_view.export_view');

Route::get('/getPrint', 'ReportController@getPrint');


