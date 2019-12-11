<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian konten -->
@section('codejs')

<!-- isi kode JS -->

@endsection
@section('filejs')

<script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/jquery.sticky.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{{ asset('js/gmaps.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@endsection
@section('css')

<title>Gede Shop</title>

<!--CSS ============================================= -->
<link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
<link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection
@section('konten')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Shop Category</h1>
				<nav class="d-flex align-items-center">
					<a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="#">Shop</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->
<div class="container">
	<div class="row">
		<div class="col-xl-3 col-lg-4 col-md-5">
			<div class="sidebar-categories">
				<div class="head">Browse Categories</div>
				<ul class="main-categories">
					@if(!empty($kategori))
					@foreach($kategori as $k)
					<li class="main-nav-list">
						<a href="/shop/{{$k->kategori_id}}"><span class="lnr lnr-arrow-right"></span>{{$k->kategori_nama}}<span class="number">{{$k->kategoriTotal}}</span></a>
					</li>
					@endforeach
					@endif
				</ul>
			</div>
		</div>
		<div class="col-xl-9 col-lg-8 col-md-7">
			<!-- Start Filter Bar -->
			<div class="filter-bar d-flex flex-wrap align-items-center">
				<div class="pagination">
					{{ $barang->links() }}
				</div>
			</div>
			<!-- End Filter Bar -->
			<!-- Start Best Seller -->
			<section class="lattest-product-area pb-40 category-list">
				<div class="row">
					@if(!empty($barang))
					@foreach($barang as $b)
					<!-- single product -->
					<div class="col-lg-4 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ url('/gambar_barang/'.$b->barang_gambar) }}" alt="">
							<div class="product-details">
								<a href="{{ route('showProduct', $b->barang_id) }}">
									<h6>{{ $b->barang_nama }}</h6>
								</a>
								<div class="price">
									<h6>{{ number_format($b->barang_harga_jual) }}</h6>
									<h6 class="l-through">{{ number_format($b->barang_harga_jual) }}</h6>
								</div>
								<div class="prd-bottom">

									{{-- <a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">+ cart</p>
									</a> --}}
									<a href="{{ route('showProduct', $b->barang_id) }}" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">detail</p>
									</a>
									<a href="{{ url('wishlists/addToWishlists/'.$b->barang_id.'/'.session('user_id')) }}" class="social-info">
										<span class="ti-heart"></span>
										<p class="hover-text">+ wishlist</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					@endif
				</div>
			</section>
			<!-- End Best Seller -->
			<!-- Start Filter Bar -->
			<div class="filter-bar d-flex flex-wrap align-items-center">
				<div class="pagination">
					{{ $barang->links() }}
				</div>
			</div>
			<!-- End Filter Bar -->
		</div>
	</div>
</div>
<br>
<br>
<br>
@endsection
<!-- End related-product Area -->