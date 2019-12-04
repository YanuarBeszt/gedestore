@extends('admIndex')


@section('content')

<!-- DataTables example -->
<div class="row">
    <div class="col s12 m12 l12">
        <div id="button-trigger" class="card card card-default scrollspy">
            <div class="card-content">
                <div class="col s12 m6 l7">
                    <h4 class="card-title">Inventori</h4>
                </div>
                <div class="col s12 m6 l5">
                    <a href="/admin/halaman-tambah-barang" class="waves-effect waves-light  btn gradient-45deg-red-pink box-shadow-none border-round mr-1 mb-1">Tambah Baru</a>
                    <a href="/admin/stok-barang" class="waves-effect waves-light  btn gradient-45deg-red-pink box-shadow-none border-round mr-1 mb-1">Detail Stok</a>
                </div>
                <div class="row">
                    <div class="col s12">
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
                                @if(!empty($barang))
                                @foreach($barang as $brg)
                                <tr>
                                    <td>{{ $brg->barang_nama }}</td>
                                    <td>{{ $brg->kategori_nama }}</td>
                                    <td>{{ $brg->barang_harga_beli }}</td>
                                    <td>{{ $brg->barang_harga_jual}}</td>
                                    <td>{{ $brg->total}}</td>

                                    <td>
                                        <a class="mb-6 btn-floating waves-effect waves-light purple lightrn-1 modal-trigger" href="#modaldelete{{ $brg->barang_id }}">
                                            <i class="material-icons">delete_forever</i>
                                        </a>
                                        <a class="btn-floating mb-1 waves-effect waves-light" href="/admin/edit-barang/{{ $brg->barang_id }}">
                                            <i class="material-icons">build</i>
                                        </a>
                                    </td>
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