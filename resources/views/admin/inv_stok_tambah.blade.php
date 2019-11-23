@extends('admIndex')


@section('content')

<!-- form  -->
<div class="row">
    <div class="col s12 m12 l12">
        <div id="button-trigger" class="card card card-default scrollspy">
            <div class="card-content">
                <form class="formValidate" id="formValidate" action="/admin/store-stok" method="post">
                    @csrf
                    @foreach($nmBarang as $nm)
                        <h5>Detail Stok Barang - <strong style="color: orange">{{ $nm->barang_nama }}</strong></h5>
                    @endforeach
                    <hr>
                    <input name="idBrg" id="idBrg" type="hidden" value="{{ Request::segment(3) }}">
                    <div class="row">
                        <div class="input-field col s5">
                            <select name="ukrBrg" id="ukrBrg" required>
                                <option value="">-- Ukuran --</option>
                                <option value="XL">XL</option>
                                <option value="L">L</option>
                                <option value="M">M</option>
                                <option value="S">S</option>
                            </select>
                            <label>Ukuran Barang</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input name="jumlahStok" id="jumlahStok" type="number" min="0">
                            <label for="hargaBeli">Jumlah Stok</label>
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