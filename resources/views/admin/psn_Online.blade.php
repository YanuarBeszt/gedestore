@extends('admIndex')

@section('content')

<div id="cards-extended">
      <div class="card">
            <div class="card-content">
                  <h4 class="card-title">Gradient Card &amp; Gradient Card With Analytics</h4>
                  <p>
                        Here is the gradient card with flat image for all gradient classes please check
                        <a href="css-color.html" target="_blank"> css-color.html</a>.
                  </p>
                  <div class="row">
                        <div class="col s12 l12">
                              
                        </div>
                  </div>
            </div>
      </div>

      <div class="divider mt-2"></div>
</div>


<div class="app-email">
  <div class="content-area" style="margin-top: 10px;">
    <div class="app-wrapper">
      <div class="card card card-default scrollspy border-radius-6 fixed-width">
        <div class="card-content">
          <div class="collection email-collection ps ps--active-y">
            <a href="#" class="collection-item animate fadeUp">
              <div class="list-content">
                <div class="list-title-area">
                  <div class="user-media">
                    <img src="{{ asset('admin/images/user/2.jpg') }}" alt="" class="circle z-depth-2 responsive-img avtar">
                    <div class="list-title">Nama Pembeli</div>
                  </div>
                  <div class="title-right">
                    <span class="badge grey lighten-3"><i class="purple-text material-icons small-icons mr-2">
                        fiber_manual_record </i>Pending</span>
                  </div>
                </div>
                <div class="list-desc">Deskripsi Pemesanan Barang</div>
              </div>
              <div class="list-right">
                <div class="list-date"> 2:03 PM </div>
              </div>
            </a>
            <a href="#" class="collection-item animate fadeUp">
              <div class="list-content">
                <div class="list-title-area">
                  <div class="user-media">
                    <img src="{{ asset('admin/images/user/2.jpg') }}" alt="" class="circle z-depth-2 responsive-img avtar">
                    <div class="list-title">Nama Pembeli</div>
                  </div>
                  <div class="title-right">
                    <span class="badge grey lighten-3"><i class="purple-text material-icons small-icons mr-2">
                        fiber_manual_record </i>Pending</span>
                  </div>
                </div>
                <div class="list-desc">Deskripsi Pemesanan Barang</div>
              </div>
              <div class="list-right">
                <div class="list-date"> 2:03 PM </div>
              </div>
            </a>
            <a href="#" class="collection-item animate fadeUp">
              <div class="list-content">
                <div class="list-title-area">
                  <div class="user-media">
                    <img src="{{ asset('admin/images/user/2.jpg') }}" alt="" class="circle z-depth-2 responsive-img avtar">
                    <div class="list-title">Nama Pembeli</div>
                  </div>
                  <div class="title-right">
                    <span class="badge grey lighten-3"><i class="purple-text material-icons small-icons mr-2">
                        fiber_manual_record </i>Pending</span>
                  </div>
                </div>
                <div class="list-desc">Deskripsi Pemesanan Barang</div>
              </div>
              <div class="list-right">
                <div class="list-date"> 2:03 PM </div>
              </div>
            </a>
            <a href="#" class="collection-item animate fadeUp">
              <div class="list-content">
                <div class="list-title-area">
                  <div class="user-media">
                    <img src="{{ asset('admin/images/user/2.jpg') }}" alt="" class="circle z-depth-2 responsive-img avtar">
                    <div class="list-title">Nama Pembeli</div>
                  </div>
                  <div class="title-right">
                    <span class="badge grey lighten-3"><i class="purple-text material-icons small-icons mr-2">
                        fiber_manual_record </i>Pending</span>
                  </div>
                </div>
                <div class="list-desc">Deskripsi Pemesanan Barang</div>
              </div>
              <div class="list-right">
                <div class="list-date"> 2:03 PM </div>
              </div>
            </a>
            <a href="#" class="collection-item animate fadeUp">
              <div class="list-content">
                <div class="list-title-area">
                  <div class="user-media">
                    <img src="{{ asset('admin/images/user/2.jpg') }}" alt="" class="circle z-depth-2 responsive-img avtar">
                    <div class="list-title">Nama Pembeli</div>
                  </div>
                  <div class="title-right">
                    <span class="badge grey lighten-3"><i class="purple-text material-icons small-icons mr-2">
                        fiber_manual_record </i>Pending</span>
                  </div>
                </div>
                <div class="list-desc">Deskripsi Pemesanan Barang</div>
              </div>
              <div class="list-right">
                <div class="list-date"> 2:03 PM </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('customjs')
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('admin/vendors/sortable/jquery-sortable-min.js') }}"></script>
<script src="{{ asset('admin/vendors/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin/vendors/waypoints/jquery.waypoints.min.js') }}"></script>
<!-- END PAGE VENDOR JS-->
@endsection