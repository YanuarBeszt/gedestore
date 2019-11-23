@extends('admIndex')


@section('content')

<!-- DataTables example -->
<div class="row">
    <div class="col s12 m12 l12">
        <div id="button-trigger" class="card card card-default scrollspy">
            <div class="card-content">
                @foreach($nmBarang as $nmbrg)
                <div class="col s12 m6 l10">
                    <h4 class="card-title">Detail Barang - 
                        <strong style="color: orange"> {{ $nmbrg->barang_nama }}   </strong>
                    </h4>
                </div>
                <div class="col s12 m6 l2">
                    <a href="/admin/tambah-detail-stok/{{ Request::segment(3) }}" class="waves-effect waves-light  btn gradient-45deg-red-pink box-shadow-none border-round mr-1 mb-1">Tambah Baru</a>
                </div>
                <div class="row">
                    <div class="col s12">
                        <table id="data-table-simple" class="display">
                            <thead>
                                <tr>
                                    <th>Ukuran Stok</th>
                                    <th>Jumlah</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($stok ))
                                    @foreach($stok as $stk)
                                        <tr>
                                            <td>{{ $stk->stok_ukuran }}</td>
                                            <td>{{ $stk->stok_jumlah_stok }}</td>
                                            <td>
                                                <a class="btn-floating mb-1 waves-effect waves-light modal-trigger" href="#modaledit{{ $stk->stok_id }}">
                                                    <i class="material-icons">build</i>
                                                </a>
                                                <a class="mb-1 btn-floating waves-effect waves-light purple lightrn-1 modal-trigger" href="#modaldelete{{ $stk->stok_id }}">
                                                    <i class="material-icons">delete_forever</i>
                                                </a>
                                            </td>
                                        </tr>
                                    <div id="modaldelete{{ $stk->stok_id }}" class="modal">
                                        <div class="modal-content">
                                            <h5>Apakah Anda Yakin Untuk Menghapus Data Ini?</h5>
                                            <hr>
                                            <h4 class="mt-5"> &ensp; {{ $nmbrg->barang_nama }} - {{ $stk->stok_ukuran }}</h4>
                                            <h6 class="mt-5"> &ensp; Data Ini Tidak Dapat Dikembalikan Setelah Proses Hapus, Apakah Anda Yakin?</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="/admin/delete-stok/{{ $stk->stok_id }}/{{ Request::segment(3) }}" class="modal-action modal-close waves-effect waves-light red accent-2 btn-flat" style="color: white">Delete</a>
                                        </div>
                                    </div>
                                    <div id="modaledit{{ $stk->stok_id }}" class="modal">
                                        <form class="formValidate" id="formValidate" action="/admin/edit-stok" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $stk->stok_id }}" name="idStok" id="idStok">
                                        <input type="hidden" value="{{ Request::segment(3) }}" name="idBrg" id="idBrg">
                                        <div class="modal-content">
                                            <h5>Detail Data Stok {{ $nmbrg->barang_nama }} - {{ $stk->stok_ukuran }}</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="input-field col s4">
                                                    <input name="jumlahStok" id="jumlahStok" type="number" min="0" value="{{ $stk->stok_jumlah_stok }}">
                                                    <label for="jumlahStok">Jumlah Stok</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button href="" class="modal-action modal-close waves-effect waves-light red accent-2 btn-flat submit" style="color: white" type="submit" name="action">Update</button>
                                        </div>
                                        </form>
                                    </div>
                                    @endforeach
                                @endif
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
@section('customjs')

@endsection