@extends('admIndex')


@section('content')

<!-- form  -->
<div class="row">
    <div class="col s12 m12 l12">
        <div id="button-trigger" class="card card card-default scrollspy">
            <div class="card-content">
                <form class="formValidate" id="formValidate" action="/admin/store-kategori" method="post">
                    @csrf
                    <div class="row">
                        <div class="input-field col s5">
                            <input value="" name="namaKtg" id="namaKtg" type="text" required>
                            <label for="namaKtg">Nama Kategori</label>
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