<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="author" content="Triplets">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title }} | Gede Store - Grosir Textile Jember</title>

  <link rel="apple-touch-icon" href="{{ asset('admin/images/favicon/apple-touch-icon-152x152.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/images/favicon/favicon-32x32.png') }}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- BEGIN: VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/vendors.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/jquery-jvectormap/jquery-jvectormap.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendors/flag-icon/css/flag-icon.min.css') }}">

  <!-- END: VENDOR CSS-->
  <!-- BEGIN: Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/themes/vertical-menu-nav-dark-template/materialize.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/themes/vertical-menu-nav-dark-template/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/data-tables/css/jquery.dataTables.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/data-tables/css/select.dataTables.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/pages/data-tables.css') }}">
  <!-- Dashboard CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/pages/dashboard.css') }}">
  <!-- Pemesanan Online CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/pages/app-sidebar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/pages/app-email.css') }}">
  <!-- END: Page Level CSS-->
  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom/custom.css') }}">
  <!-- END: Custom CSS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<!-- END: Head-->

<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-menu-nav-dark 2-columns  " data-open="click" data-menu="vertical-menu-nav-dark" data-col="2-columns">
  <div class="row">

    @if(Session('alert'))
    <div class="flash-alert" data-flashalert="{{Session('alert')}}"></div>
    @elseif (Session('success'))
    <div class="flash-data" data-flashdata="{{Session('success')}}"></div>
    @endif

  </div>
  <!-- BEGIN: Header-->
  <header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
      <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-deep-orange-orange gradient-shadow">
        <div class="nav-wrapper">
          <ul class="navbar-list right">
            <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none<small class="notification-badge">5</small></i></a></li>
            <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="{{ asset('admin/images/avatar/avatar-7.png') }}" alt="avatar"><i></i></span></a></li>
          </ul>
          <!-- notifications-dropdown-->
          <ul class="dropdown-content" id="notifications-dropdown">
            <li>
              <h6>NOTIFICATIONS<span class="new badge">5</span></h6>
            </li>
            <li class="divider"></li>
            <li><a class="grey-text text-darken-2" href="#!"><span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
              <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
            </li>
            <li><a class="grey-text text-darken-2" href="#!"><span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
              <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
            </li>
            <li><a class="grey-text text-darken-2" href="#!"><span class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
              <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
            </li>
            <li><a class="grey-text text-darken-2" href="#!"><span class="material-icons icon-bg-circle deep-orange small">today</span> Director meeting started</a>
              <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
            </li>
            <li><a class="grey-text text-darken-2" href="#!"><span class="material-icons icon-bg-circle amber small">trending_up</span> Generate monthly report</a>
              <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
            </li>
          </ul>
          <!-- profile-dropdown-->
          <ul class="dropdown-content" id="profile-dropdown">
            <li><a class="grey-text text-darken-1" href="/admin/logout"><i class="material-icons">keyboard_tab</i> Logout</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <!-- END: Header-->

  <!-- BEGIN: SideNav-->
  <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light navbar-full sidenav-active-rounded">
    <div class="brand-sidebar">
      <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="/admin/halaman-dashboard"><img src="{{ asset('admin/images/logo/materialize-logo.png') }}" alt="materialize logo" /><span class="logo-text hide-on-med-and-down">GEDE STORE</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
      <li class="navigation-header"><a class="navigation-header-text">Main Navigation</a><i class="navigation-header-icon material-icons">more_horiz</i>
      </li>
      <li class="bold"><a class="waves-effect waves-cyan " href="/admin/halaman-dashboard"><i class="material-icons">home</i><span class="menu-title" data-i18n="">Home</span></a>
      </li>
      <li class="bold"><a class="waves-effect waves-cyan " href="/admin/halaman-inventory-barang"><i class="material-icons">widgets</i><span class="menu-title" data-i18n="">Inventory</span></a>
      </li>
      <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">shopping_cart</i><span class="menu-title" data-i18n="">Transaksi</span></a>
        <div class="collapsible-body">
          <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li><a class="collapsible-body" href="/admin/halaman-transaksi-barang-masuk" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Barang Masuk</span></a>
            </li>
            <li><a class="collapsible-body" href="/admin/halaman-transaksi-penjualan-barang" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Penjualan</span></a>
            </li>
          </ul>
        </div>
      </li>
      <li class="bold"><a class="waves-effect waves-cyan " href="/admin/halaman-pemesanan-online"><i class="material-icons">call</i><span class="menu-title" data-i18n="">Pemesanan</span></a></li>
      <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">library_books</i><span class="menu-title" data-i18n="">Laporan</span></a>
        <div class="collapsible-body">
          <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li><a class="collapsible-body" href="/admin/halaman-laporan-barang-masuk" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Laporan Barang Masuk</span></a>
            </li>
            <li><a class="collapsible-body" href="/admin/halaman-laporan-penjualan-barang" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Laporan Penjualan</span></a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
  </aside>
  <!-- END: SideNav-->

  <!-- BEGIN: Page Main-->
  <div id="main">
    <div class="row">
      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 breadcrumbs-left">
              <h5 class="breadcrumbs-title display-inline">{{ $breadcrumb }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12">

        <div class="container">
          <!-- card stats start -->
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  <!-- END: Page Main-->

  <!-- BEGIN: Footer-->

  <footer class="page-footer footer footer-static cyan navbar-border navbar-shadow">
    <div class="page-footer pt-0 footer-dark gradient-45deg-deep-orange-orange gradient-shadow">
      <div class="footer-copyright">
        <div class="container"><span></span>&copy; 2019 <span class="right hide-on-small-only"></span>Rebuild by <a href="#">TRIPLETS</a></div>
      </div>
    </div>
  </footer>

  <!-- END: Footer-->
  <!-- BEGIN VENDOR JS-->
  <script src="{{ asset('admin/js/vendors.min.js') }}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  @yield('customjs')
  <!-- BEGIN THEME  JS-->
  <script src="{{ asset('admin/js/plugins.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/js/custom/custom-script.js') }}" type="text/javascript"></script>
  <!-- END THEME  JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{ asset('admin/js/scripts/advance-ui-modals.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/js/scripts/app-email.js') }}" type="text/javascript"></script>

  <script src="{{ asset('admin/js/scripts/sweetalert2/sweetalert2.all.min.js') }}"></script>
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('admin/vendors/data-tables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/vendors/data-tables/js/dataTables.select.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/js/scripts/data-tables.js') }}" type="text/javascript"></script>

  <!-- script sweetalert2 -->
  <script type="text/javascript">
    const flash = $('.flash-data').data('flashdata');
    if (flash) {
      Swal.fire({
        title: 'Data',
        text: 'Berhasil ' + flash,
        type: 'success',
        showConfirmButton: false,
        timer: 1500
      });
    }
  </script>
  <!-- script sweetalert2 -->
  <script type="text/javascript">
    const alert = $('.flash-alert').data('flashalert');
    if (alert) {
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Gagal ' + alert,
        showConfirmButton: false,
        timer: 1500
      });
    }
  </script>
  <!-- <script type="text/javascript"> 
function addFunction(e) {

  console.log(e);
document.getElementById('form'+e).submit();   
}
</script> -->

</body>

</html>