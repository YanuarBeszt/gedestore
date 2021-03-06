@extends('admIndex')


@section('content')

            <!-- {{-- menampilkan error validasi --}} -->
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
<!-- form  -->
<div class="row">
    <div class="col s12">
        <div id="custom-error" class="card card-tabs">
            <div class="card-content">
                <div class="card-title">
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab col s6 p-0"><a class="active p-0" href="#view-custom-error">Tambah Stok</a></li>
                                <li class="tab col s6 p-0"><a class="p-0" href="#html-custom-error">Tambah Ukuran Barang</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="view-custom-error">
                    <form id="myform" method="POST" action="/admin/proses-trans-masuk" >
                        @csrf
                        <div class="row">
                            <div class="input-field col s5">
                                <select name="ktgBrg" id="ktgBrg" required>
                                    <option value="1">--Nama Barang--</option>
                                    @if(!empty($barang))
                                    @foreach($barang as $brg)
                                    <option value="{{$brg->barang_id}}">{{ $brg->barang_nama }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <label>Nama Barang</label>
                            </div>
                            <div class="input-field col s4">
                                <input value="" name="hargaBeli" id="hargaBeli" type="text" class="validate">
                                <label for="hargaBeli">Harga Beli</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input name="stokMsk" id="stokMsk" type="text" class="validate">
                                <label for="stokMsk">Stok Masuk</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="deskripsi" name="deskripsi" type="text" class="validate">
                                <label for="deskripsi">Deskripsi</label>
                            </div>
                        </div>
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light right submit" type="submit" name="action">simpan
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </form>
                </div>
                <div id="html-custom-error">
                <form id="myform" method="POST" action="/admin/proses-trans-masuk" >
                    @csrf
                        <div class="row">
                            <div class="input-field col s5">
                                <select name="ktgBrg" id="ktgBrg" required>
                                    <option value="1">--Nama Barang--</option>
                                    @if(!empty($barang))
                                    @foreach($barang as $brg)
                                    <option value="{{$brg->barang_id}}">{{ $brg->barang_nama }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <label>Nama Barang</label>
                            </div>
                            <div class="input-field col s4">
                                <input  name="hargaBeli3" id="hargaBeli2" type="text" class="validate">
                                <label for="hargaBeli">Harga Beli</label>
                            </div>
                        </div>
                        <div class="row">
                            <label>
                                <input class="with-gap" name="ukuran" type="radio" value="S" />
                                <span>S</span>
                            </label>
                            <label>
                                <input class="with-gap" name="ukuran" type="radio" value="M" />
                                <span>M</span>
                            </label>
                            <label>
                                <input class="with-gap" name="ukuran" type="radio" value="L" />
                                <span>L</span>
                            </label>
                            <label>
                                <input class="with-gap" name="ukuran" type="radio" value="XL" />
                                <span>XL</span>
                            </label>
                            <label>
                                <input class="with-gap" name="ukuran" type="radio" value="XXL" />
                                <span>XXL</span>
                            </label>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input name="stok" id="stok" type="text" class="validate">
                                <label for="stokMsk">Stok Masuk</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="deskripsi" name="deskripsi" type="text" class="validate">
                                <label for="deskripsi">Deskripsi</label>
                            </div>
                        </div>
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light right submit-btn"  type="submit" >simpan
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection