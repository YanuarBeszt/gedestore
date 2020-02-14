<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	

	<!--
	CSS & Site Title ============================================= -->
	<title>Gede Jember</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
	<!--	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">-->
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.skinFlat.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">

	<!--Untuk Contact-->
	<link rel="stylesheet" href="{{ asset('src/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('https://unpkg.com/leaflet@1.6.0/dist/leaflet.css') }}">



	<!--	<script src="http://maps.google.com/maps/api/js"></script>-->
	<!--	<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>-->





	<style type="text/css">
		#mymap {
			border: 3px solid orange;
			width: 800px;
			height: 500px;
		}

		#mapdiv {
			#mapdiv {
				border: 3px solid red;
				width: 800px;
				height: 500px;

			}

		}
	</style>
</head>

<body>
	<div class="row">
		<!-- session login -->
		@if(Session('alert'))
		<div class="flash-alert" data-flashalert="{{Session('alert')}}"></div>
		@elseif (Session('success'))
		<div class="flash-data" data-flashdata="{{Session('success')}}"></div>
		@endif

	</div>
	<!-- konten -->
	<!-- Start Header Area -->
	<header class="header_area fixed-header">
		<div class="main_menu">
			<nav id="navBar1" class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="/"><img style="height:40px; width:auto; margin:10px;" src="{{ url('/img/logogede.png')}}" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto ">
							<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
							<li class="nav-item"><a class="nav-link" href="/shop">Shop</a></li>
							<li class="nav-item"><a class="nav-link" href="/contactUs">Contact</a></li>
							<!-- Customer Login -->
							@if (session('login_user'))
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>Profil</span></a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="/profil">{{session('user_nama')}}</a></li>
									<li class="nav-item"><a class="nav-link" href="{{ url('/orders-history') }}">Histori Belanja</a></li>
									<li class="nav-item"><a class="nav-link" href="{{ url('/wishlists') }}">Wishlist</a></li>
									<li class="nav-item"><a class="nav-link" href="/logout-user">Logout</a></li>
								</ul>
							</li>
						</ul>
						@else
						<li class="nav-item"><a class="nav-link" href="{{ url('/customer/register') }}">Daftar</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ url('/customer/login') }}">Masuk</a></li>
						@endif
							<li style="list-style: none;" class="nav-item ml-3"><a href="{{ url('/keranjang-shop') }}" class="cart"><span class="ti-bag"></span></a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- End Header Area -->
	@yield('konten')
	<!-- End related-product Area -->

	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>About Us</h6>
						<div class="contact_info">
							<div class="info_item">
								<i class="lnr lnr-home"></i>
								<p style="color:white">Jl karimata V/E 6</p>
								<p style="color:white">Gumuk Kerang, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121</p>
							</div>
							<div class="info_item">
								<i class="lnr lnr-phone-handset"></i>
								<p style="color:white"><a href="#">0822-3101-0999</a></p>
								<p style="color:white">Buka 09.00 ⋅ Tutup 17.00</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6></h6>
						<div class="contact_info">
						<div class="info_item">
							<i class="lnr lnr-envelope"></i>
							<p style="color:white"><a href="#">kamarwanta@gmail.com</a></p>
							<p style="color:white"></p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-camera"></i>
							<p style="color:white"><a href="https://www.instagram.com/kamarwanta/">Instagram : Kamarwanta</a></p>
							<p style="color:white"></p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-users"></i>
							<p style="color:white"><a href="https://www.facebook.com/pg/GEDEPUSATBUSANA/about/?ref=page_internal">Facebook : Toko Gede</a></p>
							<p style="color:white"></p>
						</div>
					</div>
				</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget mail-chimp">
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->

	<!-- file js -->
	@yield('filejs')
	<!-- code js -->
	@yield('codejs')
	<script src="{{ asset('admin/js/scripts/sweetalert2/sweetalert2.all.min.js') }}"></script>
	<!-- <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.js') }}"></script> -->

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

	<script>
		$(document).ready(function() {

			function fetch_item_data() {
				$.ajax({
					url: "{{ route('province.fetch') }}",
					method: "GET",
					success: function(data) {
						$('.fetch_prov').html(data);
						var provid = $('input[name="prov-edit"]').val();
						$('.fetch_prov').val(provid).trigger('change');

					}
				})
			}

			// setInterval(function(){ 
			fetch_item_data();;
			// }, 500);
		});
	</script>
	<!-- <script>
$(document).ready(function(){

   function fetch_city_data()
 {
  $.ajax({
   url:"{{ route('city.fetch') }}",
   method:"GET",
   success:function(data)
   {
    $('.fetch_city').html(data);
   }
  })
 }

  // setInterval(function(){ 
  fetch_city_data();; 
 // }, 500);
});
</script> -->
	<!-- ajax dropdown  -->
	<script type="text/javascript">
		$(document).ready(function() {

			const halo = function() {
				var prov = $('.fetch_prov').val();
				var _token = $('input[name="_token"]').val();


				if (prov === 'belum') {
					$('.fetch_city').html(`<option data-display="Select" value="">--pilih provinsi dulu--</option>`);
					$('.service').html(`<option data-display="Select" value="">--pilih kota dulu--</option>`);

					return;
				}
				$.ajax({

					url: "{{ route('city.fetch') }}",
					method: 'post',
					data: {
						prov: prov,
						_token: _token
					},
					// dataType: 'json',
					success: function(response) {
						var cityid = $('input[name="city-edit"]').val();
						var provid = $('input[name="prov-edit"]').val();


						if (prov === provid) {
							$('.fetch_city').html(response);
							$('.fetch_city').val(cityid).trigger('change');
						} else {
							$('.fetch_city').html(response);
						}



					}

				});
				var berat = $('input[name="berat_brg"]').val();
				var kota = $('#city').val();
				var _token = $('input[name="_token"]').val();

				// console.log({kota,berat});

				$.ajax({
					url: "{{ route('cost.fetch') }}",
					method: "POST",
					data: {
						berat: berat,
						kota: kota,
						_token: _token
					},
					success: function(data) {
						$('.service').html(data);
						$('.service').html(`<option data-display="Select" value="">--pilih kota dulu--</option>`);

					}
				});
			};
			$('.fetch_prov').on('change', halo);

		});
	</script>
	<!-- ajax dropdown  -->
	<script type="text/javascript">
		$(document).ready(function() {

			const hai = function() {

				var berat = $('input[name="berat_brg"]').val();
				var kota = $('#city').val();
				var _token = $('input[name="_token"]').val();
				// var _ongkir = $('.service').val(); 
				// console.log({
				// 	kota,
				// 	berat
				// });

				$.ajax({
					url: "{{ route('cost.fetch') }}",
					method: "POST",
					data: {
						berat: berat,
						kota: kota,
						_token: _token
					},
					success: function(data) {

						$('.service').html(data);
						// $('.ongkir-gan').html(_ongkir);

					}
				});
			};
			$('.fetch_city').on('change', hai);

		});
	</script>

</body>

</html>