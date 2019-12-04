@extends('admIndex')


@section('content')

<!-- form  -->
<div class="row">
    <!-- {{-- menampilkan error validasi --}} -->
    @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <div class="card-alert card red">
        <div class="card-content white-text">
            <p>{{ $error }}</p>
        </div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endforeach
    @endif
    <div class="col s12 m12 l12">
        <div id="button-trigger" class="card card card-default scrollspy">
            <div class="card-content">
                <form class="formValidate" id="formValidate" action="/admin/edit-barang" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input value="{{ $barang_nama }}" name="namaBrg" id="namaBrg" type="text" required>
                            <input value="{{ $barangId }}" name="barangId" id="barangId" type="hidden" required>
                            <label for="namaBrg">Nama Barang</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s5">
                            <select name="ktgBrg" id="ktgBrg" required>
                                <option value="1">--Kategori--</option>
                                @if(!empty($kategori))
                                @foreach($kategori as $ktg)
                                <option value="{{$ktg->kategori_id}}" @if($ktg->kategori_id==$barang_kategori)Selected @endif>{{ $ktg->kategori_nama }}</option>
                                @endforeach
                                @endif
                            </select>
                            <label>Kategori Barang</label>
                        </div>
                        <div class="input-field col s4">
                            <a href="/admin/halaman-tambah-kategori" class="waves-effect waves-light btn-small">Tambah kategori</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input value="{{ $barang_harga_beli }}" name="hargaBeli" id="hargaBeli" type="text" class="validate">
                            <label for="hargaBeli">Harga Beli</label>
                        </div>
                        <div class="input-field col s4">
                            <input value="{{ $barang_harga_jual }}" name="hargaJual" id="hargaJual" type="text" class="validate">
                            <label for="hargaJual">Harga Jual</label>
                        </div>
                        <div class="input-field col s4">
                            <input  value="{{ $berat }}" name="berat" id="berat" type="text" class="validate">
                            <label for="berat">Berat Satuan(gram)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input value="{{ $barang_deskripsi }}" id="deskripsi" name="deskripsi" type="text" class="validate">
                            <label for="deskripsi">Deskripsi</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Gambar</span>
                                <input type="file" name="file">
                                <input type="hidden" name="gambarlama" value="{{$barang_gambar}}">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate col s6" type="text" id="gambar" name="gambar">
                                <img class="img-fluid col s6" style="width: 200px" src="{{ url('/gambar_barang/'.$barang_gambar) }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light right submit" type="submit" name="action">simpan
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection