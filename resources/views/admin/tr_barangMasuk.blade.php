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
                        <table id="page-length-option" class="display">
                            <thead>
                                <tr>
                                    <th>Barcode</th>
                                    <th>Nama</th>
                                    <th>Ukuran</th>
                                    <th>Jumlah Masuk</th>
                                    <th>Total Harga</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($dtstok as $dtst)
                                <tr>
                                  <td>{{ $dtst->barang_id }}</td>
                                  <td>{{ $dtst->barang_nama }}</td>
                                  <td>{{ $dtst->stok_ukuran }}</td>
                                  <td>
                                      <a class="modal-trigger waves-effect waves-light btn red white-text" href="#modal{{ $dtst->detiltrans_masuk_id }}">{{ $dtst->detiltrans_masuk_stok }}</a>
                                      <div id="modal{{ $dtst->detiltrans_masuk_id }}" class="modal">
                                        <div class="modal-content">
                                          <p>Masukkan Jumlah Barang</p>
                                          <hr>
                                          <div class="row">
                                            <div class="input-field col s6 l6">
                                              <input placeholder="Jumlah Pembelian" id="updatedetail" type="text" class="validate" required value="{{ $dtst->detiltrans_masuk_stok }}">
                                              <label for="updatedetail">Jumlah Barang</label>
                                            </div>
                                            <div class="input-field col s6 l6">
                                              <button class="btn cyan waves-effect waves-light" type="submit" name="action">
                                                <i class="material-icons left">autorenew</i> update
                                              </button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  </td>
                                  <td>{{ $dtst->detiltrans_masuk_totalHarga }}</td>
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
</div>
<a class="waves-effect waves-light btn modal-trigger" href="#daftarbarang">Modal</a>
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
              <a class="btn-floating mb-1 btn-flat waves-effect waves-light orange accent-2 white-text" href="/admin/tambah-detail-masuk/{{ $dfst->stok_id }}/{{ $lastid }}">
                <i class="material-icons">add_shopping_cart</i>
              </a>
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
