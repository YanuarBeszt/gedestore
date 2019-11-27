@extends('admIndex')

@section('content')

    <!-- BEGIN: Page Main-->
            <div class="section">
    <div class="card">
        <div class="card-content">
  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">book</i>
          <input id="icon_prefix" value="{{$kode_trans}}" readonly="" type="text" class="validate">
          <label for="icon_prefix">Kode Transaksi</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">people</i>
          <input id="icon_telephone" type="tel" class="validate">
          <label for="icon_telephone">Member</label>
        </div>
      </div>
    </form>
  </div>
  
        </div>
    </div>
</div>
            <div class="seaction">
  <!--Invoice-->

  <div class="row">

    <div class="col s12 m12 l12">

      <div id="basic-tabs" class="card card card-default scrollspy">
 <a href="#modal1" class="waves-effect waves-light btn gradient-45deg-amber-amber gradient-shadow mt-2 modal-trigger">CARI BARANG<i class="material-icons right">search</i></a>
        <div class="card-content pt-3 pr-3 pb-3 pl-3">

          <div id="invoice">

            <div class="invoice-table">
              <div class="row">
                <div class="col s12 m12 l12">
                  <table class="highlight responsive-table">
                    <thead>
                      <tr>
                        <th data-field="no">No</th>
                        <th data-field="item">Kode Barang</th>
                        <th data-field="item">Nama</th>
                        <th data-field="uprice">Ukuran</th>
                        <th data-field="price">Jumlah</th>
                        <th data-field="price">Harga</th>
                        <th data-field="price">Sub Harga</th>

                        <th data-field="price">Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php $i = 1; ?>
@if( $jml_crt > 0)
	@foreach($cart as $c)
	                      <tr>
	                        <td>{{$i++}}</td>
	                        <td>{{$c->attributes->kode_brg}}</td>
	                        <td>{{$c->name}}</td>
	                        <td>{{$c->attributes->size}}</td>
	                        <td>{{number_format($c->quantity)}}</td>
	                        <td>Rp.{{number_format($c->price)}}</td>

	                        <td>Rp.{{number_format($c->quantity*$c->price)}}</td>

	                        <td> <a href="#">EDIT</a> | <a href="/admin/delete-cart/{{$c->id}}">DELETE</a></td>

	                      </tr>
	@endforeach
@else
<td style="text-align: center;" colspan="8" >Keranjang Kosong , Pilih Barang Terlebih Dahulu !</td>
@endif
 
                      <tr class="border-none">
                        <td>Sub Total:</td>
                        <td>$ 5,290.00</td>

                      </tr>
                      <tr class="border-none">
                        <td>Service Tax</td>
                        <td>11.00%</td>
                      </tr>
                      <tr class="border-none">
                        <td class="cyan white-text pl-1">Grand Total</td>
                        <td class="cyan strong white-text">$ 5,871.90</td>
                        <td></td>
                        <td></td>
                        <td></td>
	                   <td></td>
<td>                <a href="#" class="mb-6 btn btn-large waves-effect waves-light btn gradient-45deg-deep-purple-blue mt-2">PROSES TRANSAKSI</a>
</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>



  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer open">
    <div class="modal-content">
      <h5>Pilih Barang</h5>
<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <div class="row">
            <div class="col s12">
              <table id="page-length-option" class="display">
                <thead>
                  <tr>
                    <th>No</th>

                    <th>Barcode</th>
                    <th>Nama Barang</th>
                    <th>Ukuran</th>
                    <th>Stok</th>
                    <th>Harga</th>

                    <th>Action</th>                   

                  </tr>
                </thead>
                <tbody>
@if(!empty($barang))
              <?php $no = 1; ?>
                @foreach($barang as $b)


                  <tr>
                 <form id="form{{$b->barang_id}}{{$b->stok_ukuran}}" action="/admin/add-cart" method="post">
					@csrf

					<input type="hidden" name="id" value="{{$b->barang_id}}">
					<input type="hidden" name="nama" value="{{$b->barang_nama}}">
					<input type="hidden" name="ukuran" value="{{$b->stok_ukuran}}">
					<input type="hidden" name="qty" value="1">
					<input type="hidden" name="harga" value="{{$b->barang_harga_jual}}">
					<input type="hidden" name="total_stok" value="{{$b->stok_jumlah_stok}}">
                    <td>{{$no++}}</td>

                    <td>{{$b->barang_id}}</td>
                    <td>{{$b->barang_nama}} - {{$b->stok_ukuran}}</td>
                    <td>{{$b->stok_ukuran}}</td>
                    <td>{{$b->stok_jumlah_stok}}</td>
                    <td>Rp.{{number_format($b->barang_harga_jual)}}</td>

                    <td>
<input id="{{$b->barang_id}}{{$b->stok_ukuran}}" type='button' class="waves-effect waves-light btn gradient-45deg-green-teal box-shadow-none mr-1 mb-2" value='Pilih' onclick="addFunction('{{$b->barang_id}}{{$b->stok_ukuran}}');" >
</td>

				</form>
                  </tr>
               @endforeach
@endif
                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>



@endsection
