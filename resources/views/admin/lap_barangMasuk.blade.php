@extends('admIndex')

@section('content')
<!-- DataTables example -->
<div class="row">
    <div class="col s12 m12 l12">
        <div id="button-trigger" class="card card card-default scrollspy">
            <div class="card-content">
                <div class="col s12 m6 l7">
                    <h4 class="card-title">Laporan Transaksi Masuk</h4>
                </div>
                <div class="row">
                    <div class="col s12">
                        <table id="data-table-simple" class="display">
                            <thead>
                                <tr style="background-color: orange">
                                    <th>Nomor Transaksi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Suplier/Toko</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($lap_masuk))
                                @foreach($lap_masuk as $lap)
                                <tr>
                                    <td>{{ $lap->trans_masuk_id }}</td>
                                    <td>{{ $lap->trans_masuk_tanggal }}</td>
                                    <td>{{ $lap->trans_masuk_suplier }}</td>
                                    <td>{{ $lap->trans_masuk_totalharga }}</td>
                                </tr>
                                <!-- Modal Icons -->
                                <div id="modaldelete{{ $brg->barang_id }}" class="modal">
                                    <div class="modal-content">
                                        <h5>Apakah Anda Yakin Untuk Menghapus Data Ini?</h5>
                                        <hr>
                                        <h4 class="mt-5"> &ensp; {{ $brg->barang_nama }}</h4>
                                        <h6> &ensp; Data Ini Tidak Dapat Dikembalikan Setelah Proses Hapus, Apakah Anda Yakin?</h6>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/admin/delete-grafik/{{ $brg->barang_id }}" class="modal-action modal-close waves-effect waves-light red accent-2 btn-flat" style="color: white">Delete</a>
                                    </div>
                                </div>
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

@endsection