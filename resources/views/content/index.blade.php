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
								<h1>We Love All and<br>Serve All</h1>
								<p>Garment And Textile in Jember.</p>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="banner-img">
								<img class="img-fluid" src="img/banner/Asset6.png" alt=""  style="padding-left:30px; margin-left:350px; height:300px; width:300px;">
							</div>
						</div>
					</div>
					<!-- single-slide -->
					<div class="row single-slide align-items-center d-flex">
						<div class="col-lg-4 col-md-6">
							<div class="banner-content">
								<h1>We Love All and<br>Serve All</h1>
								<p>Garment And Textile in Jember.</p>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="banner-img">
								<img class="img-fluid" src="img/banner/Asset6.png" alt="" style="padding-left:30px; margin-left:350px; height:300px; width:300px;">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

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