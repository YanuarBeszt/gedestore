@extends('admIndex')

@section('content')

    <!-- BEGIN: Page Main-->

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

	                        <td> <a href="#modaledit{{$c->id}}" class="modal-trigger">EDIT</a> | <a href="/admin/delete-cart/{{$c->id}}">DELETE</a></td>

	                      </tr>
						<!-- modal edit -->
						  <div id="modaledit{{$c->id}}" class="modal">
						    <div class="modal-content">
						      <h4>Edit Barang {{$c->name}} - {{$c->attributes->size}}</h4>
						     <form action="/admin/edit-cart" method="post">
						      	@csrf
								      <input value="{{$c->id}}" id="id_row" name="id_row" type="hidden" class="validate">
								      <input value="{{$c->quantity}}" id="jml_skrg" name="jml_skrg" type="hidden" class="validate">

						      	  <div class="row">
								    <div class="input-field col s12">
								      <input  id="qty" name="qty" value="" type="number" class="validate">
								      <label class="active" for="qty">Tambahkan Jumlah Barang</label>
								    </div>
								  </div>
						    </div>
						    <div class="modal-footer">
						<button type='submit' class="waves-effect waves-light btn gradient-45deg-deep-purple-blue  box-shadow-none mr-1 mb-2" value='Submit' >SUBMIT</button> 					
    						</div>
						  </form>

						  </div>
						  <!-- End Modal Edit -->

	@endforeach
@else
<td style="text-align: center;" colspan="8" >Keranjang Kosong , Pilih Barang Terlebih Dahulu !</td>
@endif
 
<!--                       <tr class="border-none">
                        <td>Sub Total:</td>
                        <td>$ 5,290.00</td>

                      </tr> -->
<!--                       <tr class="border-none">
                        <td>Service Tax</td>
                        <td>11.00%</td>
                      </tr> -->
                      <tr class="border-none">
                        <td class="cyan white-text pl-1">Grand Total</td>
                        <td class="cyan strong white-text">Rp.{{number_format($jml_total)}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
	                   <td></td>
<td>                
</td>
<td>                <a href="/admin/destroy-cart" class="mb-6 btn btn-large waves-effect waves-light red accent-2">RESET<i class="material-icons dp48 right">refresh</i></a>
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
            <div class="section">
    <div class="card">
        <div class="card-content">
  <div class="row">
    <form action="/admin/proses-transaksi-keluar" id="form_trans" method="post" class="col s12">
    	@csrf
      <div class="row">
        <div class="input-field col s5">
          <i class="material-icons prefix">book</i>
          <input id="icon_prefix" name="kode_trans" value="{{$kode_trans}}" readonly="" type="text" class="validate">
          <label for="icon_prefix">Kode Transaksi</label>
        </div>
        <div class="input-field col s4">
          <i class="material-icons prefix">people</i>
          <input id="icon_telephone" name="member" type="tel" class="validate">
          <label for="icon_telephone">Member</label>
        </div>
        <div class="input-field col s3">
<button type="submit" value="submit" class="mb-6 btn btn-large waves-effect waves-light btn gradient-45deg-deep-purple-blue mt-2">PROSES TRANSAKSI<i class="material-icons dp48 right">check</i></button>
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
