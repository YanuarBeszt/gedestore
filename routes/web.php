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

//Customer Routes
Route::get('/', 'IndexController@index');
Route::get('/shop/showProduct/{id}', [
    'as' => 'showProduct',
    'uses' => 'ShopController@showProduct'
]);
Route::get('cart', 'CartController@cartView');
Route::get('add-to-cart/{id}', [
    'as' => 'add-to-cart',
    'uses' => 'CartController@addCart'
]);

// Route::get('/pass', 'AuthController@pass');
Route::get('/shop', 'ShopController@index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/login', 'AuthController@index');
Route::get('/cek', 'AuthController@pass');
Route::post('/post-login', 'AuthController@postLogin');

// COSTUMER
Route::get('/customer/login', 'CustAuthController@index');
Route::get('/customer/register', 'CustAuthController@register_user');
Route::post('/proses-register-user', 'CustAuthController@proses_register');
Route::post('/proses-login-user', 'CustAuthController@postLogin');
Route::get('/logout-user', 'CustAuthController@keluar');


// endcostumer

Route::group(['middleware' => 'usersession'], function () {
    //Admin
    Route::get('/admin/halaman-dashboard', 'AdminController@index');
    Route::get('/admin/halaman-profile-admin', 'AdminController@profile');

    //inventory
    Route::get('/admin/halaman-inventory-barang', 'InventoryController@index');
    Route::get('/admin/halaman-tambah-barang', 'InventoryController@addBarang');
    Route::post('/admin/store-barang', 'InventoryController@storeBarang');
    Route::get('/admin/halaman-tambah-kategori', 'InventoryController@addKategori');
    Route::post('/admin/store-kategori', 'InventoryController@storeKategori');

    Route::get('/admin/stok-barang', 'InventoryController@dataStok');
    Route::get('/admin/detail-stok/{id}', 'InventoryController@detailStok')->name('detailStok');
    Route::get('/admin/tambah-detail-stok/{id}', 'InventoryController@tambahStok');
    Route::post('/admin/store-stok', 'InventoryController@storeStok');
    Route::get('/admin/delete-stok/{id}/{detail}', 'InventoryController@deleteStok');
    Route::post('/admin/edit-stok', 'InventoryController@editStok');

    //laporan
    Route::get('/admin/halaman-laporan-barang-masuk', 'LaporanController@lapMasuk');
    Route::get('/admin/halaman-laporan-penjualan-barang', 'LaporanController@lapKeluar');

    //transaksi
    Route::post('/admin/proses-trans-masuk', 'TransaksiController@proses_trans_masuk');
    //    Route::get('/admin/halaman-transaksi-barang-masuk', 'TransaksiController@transMasuk');
    Route::get('/admin/halaman-transaksi-barang-masuk', 'TransaksiMasukController@index');
    Route::get('/admin/cari-barang', 'TransaksiController@loadDataBarang');
    Route::get('/admin/halaman-transaksi-penjualan-barang', 'TransaksiKeluarController@index');
    Route::post('/admin/add-cart', 'TransaksiKeluarController@add_cart');


    Route::get('/admin/halaman-pemesanan-online', 'PemesananController@pesanOnline');
    Route::get('/admin/halaman-pemesanan-offline', 'PemesananController@pesanOffline');

    //Route Proses
    Route::post('/admin/edit-data-admin', 'co_admAdmin@edit');
});

//Wishlist and Cart
Route::get('/wishlists', 'WishlistsController@index');

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
