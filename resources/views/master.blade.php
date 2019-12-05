<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
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
	<meta charset="UTF-8">

	<!--
	CSS & Site Title ============================================= -->
	<title>Gede Shop</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.skinFlat.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<script src="http://maps.google.com/maps/api/js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>


	<style type="text/css">
		#mymap {
			border: 1px solid red;
			width: 800px;
			height: 500px;
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
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
							<li class="nav-item"><a class="nav-link" href="/shop">Shop</a></li>
							<li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>
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
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="{{ url('/keranjang-shop') }}" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->
	@yield('konten')
	<!-- End related-product Area -->

	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>About Us</h6>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
							magna aliqua.
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Newsletter</h6>
						<p>Stay update with our latest</p>
						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

								<div class="d-flex flex-row">

									<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">


									<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
									<div style="position: absolute; left: -5000px;">
										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
									</div>

									<!-- <div class="col-lg-4 col-md-4">
												<button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
											</div>  -->
								</div>
								<div class="info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">Instragram Feed</h6>
						<ul class="instafeed d-flex flex-wrap">
							<li><img src="img/i1.jpg" alt=""></li>
							<li><img src="img/i2.jpg" alt=""></li>
							<li><img src="img/i3.jpg" alt=""></li>
							<li><img src="img/i4.jpg" alt=""></li>
							<li><img src="img/i5.jpg" alt=""></li>
							<li><img src="img/i6.jpg" alt=""></li>
							<li><img src="img/i7.jpg" alt=""></li>
							<li><img src="img/i8.jpg" alt=""></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Follow Us</h6>
						<p>Let us be social</p>
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>
						document.write(new Date().getFullYear());
					</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
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