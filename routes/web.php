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
Route::get('/profil', 'ProfilController@index');
Route::post('/update-profil', 'ProfilController@updateProfil');
Route::get('/contact', 'ContactController@index');


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
    Route::get('/admin/edit-barang/{id}', 'InventoryController@editBarang');
    Route::post('/admin/edit-barang', 'InventoryController@updateBarang');
    Route::post('/admin/edit-stok', 'InventoryController@editStok');

    //laporan
    Route::get('/admin/halaman-laporan-barang-masuk', 'LaporanController@lapMasuk');
    Route::get('/admin/halaman-laporan-penjualan-barang', 'LaporanController@lapKeluar');

    //transaksi
    Route::post('/admin/proses-trans-masuk', 'TransaksiController@proses_trans_masuk');
    //    Route::get('/admin/halaman-transaksi-barang-masuk', 'TransaksiController@transMasuk');
    Route::get('/admin/halaman-transaksi-barang-masuk', 'TransaksiMasukController@index');
    Route::get('/admin/tambah-detail-masuk/{id}/{idtr}', 'TransaksiMasukController@tambah_detail');
    Route::get('/admin/delete-detail-masuk/{id}', 'TransaksiMasukController@delete_detail');
    Route::post('/admin/update-detail-masuk', 'TransaksiMasukController@update_detail');
    Route::post('/admin/transaksi-selesai', 'TransaksiMasukController@transaksi_baru');

    Route::get('/admin/cari-barang', 'TransaksiController@loadDataBarang');

    // transaksi keluar
    Route::get('/admin/add-cart/{id}', 'TransaksiKeluarController@add_cart');
    Route::get('/admin/destroy-cart', 'TransaksiKeluarController@destroy_cart');
    Route::get('/admin/delete-cart/{id}', 'TransaksiKeluarController@delete_cart');
    Route::post('/admin/edit-cart', 'TransaksiKeluarController@edit_cart');
    Route::get('/admin/halaman-transaksi-penjualan-barang', 'TransaksiKeluarController@index');
    Route::post('/admin/proses-transaksi-keluar', 'TransaksiKeluarController@proses_transaksi');


    Route::get('/admin/halaman-pemesanan-online', 'PemesananController@pesanOnline');
    Route::get('/admin/halaman-pemesanan-offline', 'PemesananController@pesanOffline');

    //Route Proses
    Route::post('/admin/edit-data-admin', 'co_admAdmin@edit');
});


//Wishlist 
Route::get('/wishlists', 'WishlistsController@index');
Route::post('/wishlists/addToWishlists', 'WishlistsController@addToWishlists');
Route::delete('/wishlists/delWishlists/{wishlists}', 'WishlistsController@delWishlists');

//Cart
Route::post('/tambah-cart', 'KeranjangController@tambah_cart');
Route::get('/keranjang-shop', 'KeranjangController@index');

Route::get('/destroy-cart', 'KeranjangController@destroy_cart');
Route::get('/hapus-cart/{id}', 'KeranjangController@delete_cart');
Route::post('/edit-cart', 'KeranjangController@edit_cart');
Route::get('/checkout-shop', 'CheckoutController@index');
Route::post('/proses-checkout', 'CheckoutController@proses_transaksi');
Route::get('/invoice/{id}', 'CheckoutController@invoice');



// ajax provinsi kota
Route::get('/province/fetch', 'ProfilController@fetch_province')->name('province.fetch'); //provinsi raja
Route::post('/city/fetch', 'ProfilController@fetch_city')->name('city.fetch'); //kota
// end ajax provinsi kota

Route::get('/ongkir', 'RajaController@index');

Route::get('/kota', 'RajaController@province');
Route::post('/cost', 'RajaController@cost')->name('cost.fetch');
