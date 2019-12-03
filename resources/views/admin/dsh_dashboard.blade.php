@extends('admIndex')

@section('content')
<div id="card-stats">
   <div class="row">
      <div class="col s12 m6 l6 xl6">
         <a href="/admin/halaman-inventory-barang" style="text-decoration: none">
            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="col s7 m7">
                     <i class="material-icons background-round mt-5">widgets</i>
                     <p>Orders</p>
                  </div>
                  <div class="col s5 m5 right-align">
                     <h5 class="mb-0 white-text">{{ Session::get('user_nama') }}</h5>
                     <h8 class="white-text">Inventori</h8>
                  </div>
               </div>
            </div>
         </a>
      </div>
      <div class="col s12 m6 l6 xl3">
         <a href="/admin/halaman-transaksi-barang-masuk" style="text-decoration: none">
            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="col s7 m7">
                     <i class="material-icons background-round mt-5">file_download</i>
                     <p>Orders</p>
                  </div>
                  <div class="col s5 m5 right-align">
                     <h8 class="white-text">Barang Masuk</h8>
                  </div>
               </div>
            </div>
         </a>
      </div>
      <div class="col s12 m6 l6 xl3">
         <a href="/admin/halaman-transaksi-penjualan-barang" style="text-decoration: none">
            <div class="card gradient-45deg-purple-deep-orange gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="col s7 m7">
                     <i class="material-icons background-round mt-5">file_upload</i>
                     <p>Orders</p>
                  </div>
                  <div class="col s5 m5 right-align">
                     <h8 class="white-text">Penjualan</h8>
                  </div>
               </div>
            </div>
         </a>
      </div>
   </div>
   <div class="row">
      <div class="col s12 m6 l6 xl3">
         <a href="/admin/halaman-pemesanan-online" style="text-decoration: none">
            <div class="card gradient-45deg-purple-light-blue gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="col s7 m7">
                     <i class="material-icons background-round mt-5">cloud_queue</i>
                     <p>Orders</p>
                  </div>
                  <div class="col s5 m5 right-align">
                     <h8 class="white-text">Pesan Online</h8>
                  </div>
               </div>
            </div>
         </a>
      </div>
      <div class="col s12 m6 l6 xl3">
         <a href="/admin/halaman-pemesanan-offline" style="text-decoration: none">
            <div class="card gradient-45deg-purple-deep-orange gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="col s7 m7">
                     <i class="material-icons background-round mt-5">cloud_off</i>
                     <p>Orders</p>
                  </div>
                  <div class="col s5 m5 right-align">
                     <h8 class="white-text">Pesan Offline</h8>
                  </div>
               </div>
            </div>
         </a>
      </div>
      <div class="col s12 m6 l6 xl3">
         <a href="/admin/halaman-laporan-barang-masuk" style="text-decoration: none">
            <div class="card gradient-45deg-purple-amber gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="col s7 m7">
                     <i class="material-icons background-round mt-5">comment</i>
                     <p>Orders</p>
                  </div>
                  <div class="col s5 m5 right-align">
                     <h8 class="white-text">Laporan Pembelian</h8>
                  </div>
               </div>
            </div>
         </a>
      </div>
      <div class="col s12 m6 l6 xl3">
         <a href="/admin/halaman-laporan-penjualan-barang" style="text-decoration: none">
            <div class="card gradient-45deg-deep-orange-orange gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="col s7 m7">
                     <i class="material-icons background-round mt-5">comment</i>
                     <p>Orders</p>
                  </div>
                  <div class="col s5 m5 right-align">
                     <h8 class="white-text">Laporan Penjualan</h8>
                  </div>
               </div>
            </div>
         </a>
      </div>
   </div>
</div>
@endsection