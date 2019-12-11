<!-- Menghubungkan dengan view template master -->
@extends('master')
<!-- isi bagian konten -->
@section('codejs')

<!-- isi kode JS -->

@endsection
@section('filejs')

<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/countdown.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="js/gmaps.min.js"></script>
<script src="js/main.js"></script>
@endsection
@section('css')

<title>Gede Shop</title>
<!--
		CSS
		============================================= -->
<link rel="stylesheet" href="css/linearicons.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/themify-icons.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/nice-select.css">
<link rel="stylesheet" href="css/nouislider.min.css">
<link rel="stylesheet" href="css/ion.rangeSlider.css" />
<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="css/main.css">
@endsection
@section('konten')

<!-- start banner Area -->
<section class="banner-area">
	<div class="container">
		<div class="row fullscreen align-items-center justify-content-start">
			<div class="col-lg-12">
				<div class="active-banner-slider owl-carousel">
					<!-- single-slide -->
					<div class="row single-slide align-items-center d-flex">
						<div class="col-lg-4 col-md-6">
							<div class="banner-content">
								<h1>Koleksi Polo<br>Terbaru!</h1>
								<p>Kami menyediakan berbagai jenis dan warna Polo terbaru dan terkeren tahun ini.
									Dengan harga terjangkau dan pengiriman barang yang cepat. Silahkan hubungi kami jika ingin membuat baju dengan desain sesuai keinginan anda pada menu Contact.</p>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="banner-img">
								<img class="img-fluid" src="img/banner/1.png" alt="">
							</div>
						</div>
					</div>
					<!-- single-slide -->
					<div class="row single-slide">
						<div class="col-lg-5">
							<div class="banner-content">
								<h1>Nike New <br>Collection!</h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
									dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
								<div class="add-bag d-flex align-items-center">
									<a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
									<span class="add-text text-uppercase">Add to Bag</span>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="banner-img">
								<img class="img-fluid" src="img/banner/banner-img.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- start features Area -->
<section class="features-area">
	<div class="container">
		<div class="row features-inner">
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon1.png" alt="">
					</div>
					<h6>Fast Delivery</h6>
					<p>Fast Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon2.png" alt="">
					</div>
					<h6>Return Policy</h6>
					<p>Fast Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon3.png" alt="">
					</div>
					<h6>Costumer Support</h6>
					<p>Fast Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon4.png" alt="">
					</div>
					<h6>Secure Payment</h6>
					<p>Fast Shipping on all order</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end features Area -->

<!-- start product Area -->
<section class="owl-carousel active-product-area section_gap">
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Latest Products</h1>
						<p>Barang Terbaru kami yang memiliki kualitas terbaik dengan harga terjangkau.</p>
					</div>
				</div>
			</div>
			<div class="row">
				@if(!empty($barang))
				@foreach($barang as $b)
				<!-- single product -->
				<div class="col-lg-3 col-md-6">
					<div class="single-product">
						<img class="img-fluid" src="{{ url('/gambar_barang/'.$b->barang_gambar) }}" alt="">
						<div class="product-details">
							<a href="{{ route('showProduct', $b->barang_id) }}">
								<h6>{{ $b->barang_nama }}</h6>
							</a>
							<div class="price">
								<h6>Rp. {{ number_format($b->barang_harga_jual) }} </h6>
								<h6 class="l-through">Rp. {{ number_format($b->barang_harga_jual) }} </h6>
							</div>
							<div class="prd-bottom">
								<a href="add-to-cart/{{$b->barang_id}}" class="social-info">
									<span class="ti-bag"></span>
									<p class="hover-text">tambah ke keranjang</p>
								</a>
								<a href="{{ route('showProduct', $b->barang_id) }}" class="social-info">
									<span class="lnr lnr-move"></span>
									<p class="hover-text">detail produk</p>
								</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</div>
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Coming Products</h1>
						<p>Semua barang yang kami jual merupakan adalah produk yang berkualitas terbaik dengan harga yang bersahabat.</p>
					</div>
				</div>
			</div>
			<div class="row">
				@if(!empty($barang))
				@foreach($barang as $b)
				<!-- single product -->
				<div class="col-lg-3 col-md-6">
					<div class="single-product">
						<img class="img-fluid" src="{{ url('/gambar_barang/'.$b->barang_gambar) }}" alt="">
						<div class="product-details">
							<a href="{{ route('showProduct', $b->barang_id) }}">
								<h6>{{ $b->barang_nama }}</h6>
							</a>
							<div class="price">
								<h6>Rp. {{ number_format($b->barang_harga_jual) }} </h6>
								<h6 class="l-through">Rp. {{ number_format($b->barang_harga_jual) }} </h6>
							</div>
							<div class="prd-bottom">
								<a href="add-to-cart/{{$b->barang_id}}" class="social-info">
									<span class="ti-bag"></span>
									<p class="hover-text">tambah ke keranjang</p>
								</a>
								<a href="{{ route('showProduct', $b->barang_id) }}" class="social-info">
									<span class="lnr lnr-move"></span>
									<p class="hover-text">detail produk</p>
								</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</div>
</section>
<!-- end product Area -->


@endsection

<!-- isi bagian konten -->
@section('codejs')

<<<<<<< HEAD=======@endsection <!-- isi bagian konten -->
	@section('codejs')

	>>>>>>> 776f11fd85b462bc8830580d70c22e1be736770e
	<!-- isi kode JS -->

	@endsection

	@section('filejs')
	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
	@endsection