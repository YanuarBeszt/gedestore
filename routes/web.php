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

// Route::get('/pass', 'AuthController@pass');
Route::get('/shop', 'ShopController@index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/login', 'AuthController@index');
Route::get('/cek', 'AuthController@pass');
Route::post('/post-login', 'AuthController@postLogin');


Route::group(['middleware' => 'usersession'], function () {
    //Admin
    Route::get('/admin/halaman-dashboard', 'co_admAdmin@index');
    Route::get('/admin/halaman-profile-admin', 'co_admAdmin@profile');

    //inventory
    Route::get('/admin/halaman-inventory-barang', 'InventoryController@index');
    Route::get('/admin/halaman-tambah-barang', 'InventoryController@addBarang');
    Route::post('/admin/store-barang', 'InventoryController@storeBarang');
    Route::get('/admin/halaman-tambah-kategori', 'InventoryController@addKategori');
    Route::post('/admin/store-kategori', 'InventoryController@storeKategori');

    //laporan
    Route::get('/admin/halaman-laporan-barang-masuk', 'co_admLaporan@lapMasuk');
    Route::get('/admin/halaman-laporan-penjualan-barang', 'co_admLaporan@lapKeluar');

    //transaksi
    Route::get('/admin/halaman-transaksi-barang-masuk', 'TransaksiController@transMasuk');
    Route::get('/admin/cari-barang', 'TransaksiController@loadDataBarang');
    Route::get('/admin/halaman-transaksi-penjualan-barang', 'TransaksiController@transKeluar');


    Route::get('/admin/halaman-pemesanan-online', 'co_admPemesanan@pesanOnline');
    Route::get('/admin/halaman-pemesanan-offline', 'co_admPemesanan@pesanOffline');

    //Route Proses
    Route::post('/admin/edit-data-admin', 'co_admAdmin@edit');
});
//auth
// Auth::routes();

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
