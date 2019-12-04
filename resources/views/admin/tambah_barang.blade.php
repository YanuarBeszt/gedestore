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
                <form class="formValidate" id="formValidate" action="/admin/store-barang" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input value="" name="namaBrg" id="namaBrg" type="text" required>
                            <label for="namaBrg">Nama Barang</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s5">
                            <select name="ktgBrg" id="ktgBrg" required>
                                <option value="1">--Kategori--</option>
                                @if(!empty($kategori))
                                @foreach($kategori as $ktg)
                                <option value="{{$ktg->kategori_id}}">{{ $ktg->kategori_nama }}</option>
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
                            <input value="" name="hargaBeli" id="hargaBeli" type="text" class="validate">
                            <label for="hargaBeli">Harga Beli</label>
                        </div>
                        <div class="input-field col s4">
                            <input name="hargaJual" id="hargaJual" type="text" class="validate">
                            <label for="hargaJual">Harga Jual</label>
                        </div>
                        <div class="input-field col s4">
                            <input name="berat" id="berat" type="text" class="validate">
                            <label for="berat">Berat Satuan(gram)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="deskripsi" name="deskripsi" type="text" class="validate">
                            <label for="deskripsi">Deskripsi</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn">
                              <span>Gambar</span>
                              <input type="file" name="file"> 
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text" id="gambar" name="gambar">
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