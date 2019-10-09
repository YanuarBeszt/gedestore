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
@endsection