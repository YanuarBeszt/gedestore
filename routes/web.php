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
Route::get('/', 'IndexController@index');



// Route::get('/', function () {
//     return view('welcome');
// });

//Public Front ENd
Route::get('/blog', 'BlogController@blog');
Route::get('/blog/tentang', 'BlogController@tentang');
Route::get('/blog/kontak', 'BlogController@kontak');

// Route::get('halo', function () {
// 	return "Halo ini gede store kita ";
// });



// // get data dari form
// Route::get('/formulir', 'TestController@formulir');
// Route::post('/formulir/proses', 'TestController@proses');
// // get data uri
// Route::get('/test/{uri}','TestController@index');
// //route irfan controller
// Route::get('/irfan','IrfanController@index');

//auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
