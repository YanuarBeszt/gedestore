<div class="row">
    <div class="col s12 m12 l12">
        <div id="button-trigger" class="card card card-default scrollspy">
            <div class="card-content">
                <div class="col s12 m6 l7">
                    <h2 class="card-title">Laporan Penjualan Barang</h2>
                </div>
                <div class="row">
                    <div class="col s12">
                        <table id="data-table-simple" class="display">
                            <thead>
                                <tr style="background-color: orange">
                                    <th>Nomor Transaksi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Nama Pembeli</th>
                                    <th>Jumlah Barang</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <style type="text/css">
                                    table tr td,
                                    table tr th {
                                        font-size: 12pt;
                                    }
                                </style>

                                @if(!empty($lap))
                                @foreach($lap as $lap)
                                <tr>
                                    <td>{{ $lap->transaksi_nomor }}</td>
                                    <td>{{ $lap->transaksi_tanggal }}</td>
                                    <td>{{ $lap->transaksi_status }}</td>
                                    <td>{{ $lap->totalbrg }}</td>
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