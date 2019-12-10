@extends('admIndex')

@section('content')
<!-- DataTables example -->
<div class="row">
    <div class="col s12 m12 l12">
        <div id="button-trigger" class="card card card-default scrollspy">
            <div class="card-content">
                <div class="col s12 m6 l7">
                    <h4 class="card-title">Laporan Transaksi Keluar</h4>
                </div>
                <div class="row">
                    <div class="col s12">
                        <a href="/admin/cetak-laporan-penjualan-barang" class="btn btn-primary" target="_blank">CETAK PDF</a>
                        <table id="data-table-simple" class="display">
                            <thead>
                                <tr style="background-color: orange">
                                    <th>Nomor Transaksi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Jumlah Barang</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($laporan_keluar))
                                @foreach($laporan_keluar as $lap)
                                <tr>
                                    <td>{{ $lap->transaksi_nomor }}</td>
                                    <td>{{ $lap->transaksi_tanggal }}</td>
                                    <td>{{ $lap->total_sales }}</td>
                                    <td>{{ $lap->total }}</td>
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

@endsection