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

//Costomer Routes
Route::get('/', 'IndexController@index');
Route::get('/shop/showProduct/{id}', [
    'as' => 'showProduct',
    'uses' => 'ShopController@showProduct'
]);
Route::get('/shop', 'ShopController@index');
Route::get('/shop', 'ShopController@index');
Route::get('/shop', 'ShopController@index');

//Admin Routes
Route::get('/admin/halaman-dashboard', 'co_admDashboard@index');
Route::get('/admin/halaman-inventory-barang', 'co_admInventory@index');
Route::get('/admin/halaman-laporan-barang-masuk', 'co_admLaporan@lapMasuk');
Route::get('/admin/halaman-laporan-penjualan-barang', 'co_admLaporan@lapKeluar');
Route::get('/admin/halaman-transaksi-barang-masuk', 'co_admTransaksi@transMasuk');
Route::get('/admin/halaman-transaksi-penjualan-barang', 'co_admTransaksi@transKeluar');
Route::get('/admin/halaman-pemesanan-online', 'co_admPemesanan@pesanOnline');
Route::get('/admin/halaman-pemesanan-offline', 'co_admPemesanan@pesanOffline');

//auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

//Public Front ENd
// Route::get('/blog', 'BlogController@blog');
// Route::get('/blog/tentang', 'BlogController@tentang');
// Route::get('/blog/kontak', 'BlogController@kontak');

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
