@extends('admIndex')

@section('content')
<!-- DataTables example -->
<div class="row">
    <div class="col s12 m12 l12">
        <div id="button-trigger" class="card card card-default scrollspy">
            <div class="card-content">
                <div class="col s12 m6 l7">
                    <h4 class="card-title">Barang</h4>
                </div>
                <div class="row">
                    <div class="col s12">
                        {{ $lastid }}
                        <input type="text" name="search"><a class="waves-effect waves-light btn modal-trigger" href="#daftarbarang">Modal</a>
                        <table id="data-table-simple" class="display">
                            <thead>
                                <tr style="background-color: orange">
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Total Stok</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($dtstok as $dtst)
                                <tr>
                                  <td>{{ $dtst->barang_id }}</td>
                                  <td>{{ $dtst->barang_nama }}</td>
                                  <td>{{ $dtst->stok_ukuran }}</td>
                                  <td>{{ $dtst->detiltrans_masuk_stok }}</td>
                                  <td>{{ $dtst->detiltrans_masuk_totalHarga }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Barang -->
<div id="daftarbarang" class="modal">
    <div class="modal-content">
      <table id="data-table-simple" class="display">
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
              <a href="">tambah</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Close</a>
    </div>
  </div>
  
@endsection
@section('customjs')

@endsection
