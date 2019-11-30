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
                                @if(!empty($laporan_masuk))
                                @foreach($laporan_masuk as $lap)
                                <tr>
                                    <td>{{ $lap->detiltrans_masuk_idtrans }}</td>
                                    <td>{{ $lap->trans_masuk_tanggal }}</td>
                                    <td>{{ $lap->trans_masuk_suplier }}</td>
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