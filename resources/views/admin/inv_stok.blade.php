@extends('admIndex')


@section('content')

<!-- DataTables example -->
<div class="row">
    <div class="col s12 m12 l12">
        <div id="button-trigger" class="card card card-default scrollspy">
            <div class="card-content">
                <div class="row">
                    <div class="col s12">
                        <table id="data-table-simple" class="display">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($barang ))
                                    @foreach ($barang as $brg)
                                    <tr>
                                        <td>{{ $brg->barang_id }}</td>
                                        <td>{{ $brg->barang_nama }}</td>
                                        <td>
                                            <a class="btn-floating mb-1 waves-effect waves-light" href="/admin/detail-stok/{{ $brg->barang_id }}">
                                                <i class="material-icons">build</i>
                                            </a>
                                        </td>
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
@section('customjs')

@endsection