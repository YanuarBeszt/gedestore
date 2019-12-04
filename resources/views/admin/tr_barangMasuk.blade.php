@extends('admIndex')

@section('content')
<!-- DataTables example -->
<div class="row">
  <div class="col s12 m8 l8">
    <div id="button-trigger" class="card card card-default scrollspy">
      <a class="waves-effect waves-light btn gradient-45deg-amber-amber gradient-shadow mt-2 modal-trigger" href="#daftarbarang" style="margin-left: 0px">Cari Barang <i class="material-icons right">search</i></a>
      <div class="card-content">
        <div class="row">
          <div class="col s12" style="height: 300px; overflow: scroll;">
            <table>
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Ukuran</th>
                  <th>Jumlah Masuk</th>
                  <th>Harga Satuan</th>
                  <th>Total Harga</th>
                  <th style="text-align: center">#</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1 ?>
                @foreach($dtstok as $dtst)
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td>{{ $dtst->barang_nama }}</td>
                  <td>{{ $dtst->stok_ukuran }}</td>
                  <td>
                    <a class="modal-trigger waves-effect waves-light btn red white-text" href="#modal{{ $dtst->detiltrans_masuk_id }}">{{ $dtst->detiltrans_masuk_stok }}</a>
                    <div id="modal{{ $dtst->detiltrans_masuk_id }}" class="modal">
                      <div class="modal-content">
                        <p>Masukkan Jumlah Barang</p>
                        <hr>
                        <form class="formValidate" id="formValidate" action="/admin/update-detail-masuk" method="post">
                          <div class="row">
                            <div class="input-field col s6 l6">
                              @csrf
                              <input type="hidden" name="iddetail" value="{{ $dtst->detiltrans_masuk_id }}">

                              <input placeholder="Jumlah Pembelian" name="updatedetail" type="number" class="validate" required value="{{ $dtst->detiltrans_masuk_stok }}" autocomplete="off" min="1">
                              <label for="updatedetail">Jumlah Barang</label>
                            </div>
                            <div class="input-field col s6 l6">
                              <button class="btn cyan waves-effect waves-light" type="submit" name="action">
                                <i class="material-icons left">autorenew</i> update
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </td>
                  <td>Rp. {{ number_format($dtst->barang_harga_beli) }}</td>
                  <td>Rp. {{ number_format($dtst->detiltrans_masuk_totalHarga) }}</td>
                  <td>
                    <a class="btn-floating mb-1 btn-flat waves-effect waves-light red accent-2 white-text" href="/admin/delete-detail-masuk/{{ $dtst->detiltrans_masuk_id }}">
                      <i class="material-icons">delete</i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col s12 m4 l4">
    <div id="button-trigger" class="card card card-default scrollspy">
      <div class="card-content" style="padding-top: 0px">
        <form method="post" action="/admin/transaksi-selesai">
          @csrf
          <div class="row">
            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
              <div class="padding-4">
                <div class="col s12 m12 l12">
                  <h8 class="white-text">Total Pembelian</h8>
                  <input type="hidden" name="transaksi" value="{{ $lastid }}">
                  <input type="hidden" name="total" id="total" value="{{ $totalbayar->total }}">
                  <p style="font-size: 35px;">Rp. {{ number_format($totalbayar->total) }}.00</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">monetization_on</i>
              <input id="bayar" type="text" name="bayar">
              <label for="bayar" class="">Bayar</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12 l12">
              <button class="modal-trigger waves-effect waves-light btn red white-text right" type="submit">Selesai</button>
            </div>
          </div>
          <br>
          <hr>
          <div class="row">
            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
              <div class="padding-4">
                <div class="col s12 m12 l12">
                  <h6 class="white-text">Kembali</h6>
                  <h4 style="font-size: 27px; color: white" id="kembalian"></h4>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Barang -->
<div id="daftarbarang" class="modal modal-fixed-footer">
  <div class="modal-content">
    <div class="row">
      <div class="col s12 l12">
        <table id="data-table-simple" class="dataTables" style="margin-left: 0px; margin-right: 0px; width: 100%">
          <thead>
            <tr>
              <th>Barcode</th>
              <th>Nama Barang</th>
              <th>Ukuran</th>
              <th>Stok</th>
              <th>#</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dfstok as $dfst)
            <tr>
              <td>{{ $dfst->barang_id }}</td>
              <td>{{ $dfst->barang_nama }}</td>
              <td>{{ $dfst->stok_ukuran }}</td>
              <td>{{ $dfst->stok_jumlah_stok }}</td>
              <td>
                <a class="btn-floating mb-1 btn-flat waves-effect waves-light orange accent-2 white-text" href="/admin/tambah-detail-masuk/{{ $dfst->stok_id }}/{{ $lastid }}">
                  <i class="material-icons">add_shopping_cart</i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
@section('customjs')
<script>
  //function bayar() {
  //    var inpbayar = document.getElementById('bayar').value;
  //    var inptotal = document.getElementById('total').value;
  //    var kurang = 'Pembayaran Tidak Mencukupi';
  //    var kosong = '';
  //    
  //    var inphasil = parseFloat(inptotal) - parseFloat(inpbayar);
  //    
  //    if (inpbayar == ''){
  //        document.getElementById('kembalian').value = kosong;
  //    } else if (inpbayar != ''){
  //        if (inphasil >= 0){
  //            document.getElementById('kembalian').value = inphasil;
  //        } else if (inphasil < 0){
  //            document.getElementById('kembalian').value = kurang;
  //        } 
  //    } 
  //}

  $(document).ready(function() {
    $('#bayar').keyup(function() {

      var total = $('#total').val();
      var bayar = $('#bayar').val();
      var kurang = 'Tidak Mencukupi';
      var kosong = '';

      var hasil = bayar - total;
      if (bayar == '') {
        $('#kembalian').html(kosong);
      } else if (bayar != '') {
        if (hasil >= 0) {
          $('#kembalian').html("Rp. " + hasil.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        } else if (hasil < 0) {
          $('#kembalian').html(kurang);
        }
      }
    });
  });
</script>
@endsection