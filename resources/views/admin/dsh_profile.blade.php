@extends('admIndex')

@section('content')
<div class="row user-profile mt-1">
  <img class="responsive-img" alt="" src="{{ asset('admin/images/gallery/profile-bg.png') }}">
</div>
<div class="section" id="user-profile">
  <div class="row">
    <!-- User Profile Feed -->
    <div class="col s12 m4 l3 user-section-negative-margin">
      <div class="row">
        <div class="col s12 center-align">
          <img class="responsive-img circle z-depth-5" width="200" src="{{ asset('admin/images/user/12.jpg') }}" alt="">
          <br>
          <a class="waves-effect waves-light btn mt-5 border-radius-4 btn modal-trigger" href="#updatedata"> Update</a>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col s6">
          <h6 style="text-align: center">Barang</h6>
          <h5 class="m-0" style="text-align: center"><a href="#">{{ $jmlbarang }}</a></h5>
        </div>
        <div class="col s6">
          <h6 style="text-align: center">Pengguna</h6>
          <h5 class="m-0" style="text-align: center"><a href="#">{{ $jmlcust }}</a></h5>
        </div>
      </div>
      <hr>
    </div>
    <!-- User Post Feed -->
    <div class="col s12 m8 l6">
      <div class="row">
        <div class="card user-card-negative-margin z-depth-0" id="feed">
          <div class="card-content card-border-gray">
            <div class="row">
              <div class="col s12">
                <h5>Gede Store - Grosir Textile Jember</h5>
                <hr>
                @foreach($dataAdmin as $dtadm)
                <div class="row">
                  <div class="col s9 l9" style="padding-bottom: 10px">
                    <a>
                      <p class="m-0">Nama</p>
                    </a>
                    <p class="m-0 grey-text lighten-3">- {{ $dtadm->namaAdmin }}</p>
                  </div>
                  <div class="col s9 l9" style="padding-bottom: 10px">
                    <a>
                      <p class="m-0">Username</p>
                    </a>
                    <p class="m-0 grey-text lighten-3">- {{ $dtadm->usernameAdm }}</p>
                  </div>
                  <div class="col s9 l9" style="padding-bottom: 10px">
                    <a>
                      <p class="m-0">Status</p>
                    </a>
                    <p class="m-0 grey-text lighten-3">- Admin</p>
                  </div>
                </div>
                @endforeach
              </div>
            </div>         
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="updatedata" class="modal">
  <form action="/admin/edit-data-admin" method="post">
  <div class="modal-content">
    <h5>Update Data Admin</h5>
        {{ csrf_field() }} 
        @foreach($dataAdmin as $dtadmm)
        <input type="hidden" value="{{ $dtadmm->idAdmin }}" name="edtidadmin" id="edtidadmin">
        <div class="row">
          <div class="input-field col s12">
            <input id="edtnama" name="edtnama" type="text" class="validate" value="{{ $dtadmm->namaAdmin }}" required>
            <label for="edtnama">Nama</label>
          </div>
        </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="edtusername" name="edtusername" type="text" class="validate" value="{{ $dtadmm->usernameAdm }}" required>
          <label for="edtusername">Username</label>
        </div>
        <div class="input-field col s6">
          <input id="edtpassword" name="edtpassword" type="password" class="validate">
          <label for="edtpassword">Password</label>
        </div>
      </div>
      @endforeach
  </div>
  <div class="modal-footer">
    <button class="modal-action modal-close waves-effect waves-green btn-flat" type="submit">Update</button>
  </div>
  </form>
</div>
@endsection