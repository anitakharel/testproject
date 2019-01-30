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


Route::get('/', 'news@index'); // default route
Route::get('/listnews', 'news@index'); //load news listing
Route::get('/addnews', 'news@news'); // load add news form
Route::post('/submit', 'news@addnews'); //action add news
Route::get('/deletenews/{id}', 'news@deletenews'); //action delete news
Route::get('editnews/{id}', 'news@editnews'); // load edit form
Route::post('/removeimage', 'news@removeimage'); // action remove featured image from news
Route::post('update', 'news@updatenews'); // action update data post edit form data
Route::get('/addcategory', 'news@category'); // load add category form
Route::post('/submitcat', 'news@addcategory'); //action add news
Route::get('/listcategory', 'news@listcategory'); //load category listing
