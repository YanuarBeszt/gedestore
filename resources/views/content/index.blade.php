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
								<h1>Polo New <br>Collection!</h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
									dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
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
					<h6>Free Delivery</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon2.png" alt="">
					</div>
					<h6>Return Policy</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon3.png" alt="">
					</div>
					<h6>24/7 Support</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon4.png" alt="">
					</div>
					<h6>Secure Payment</h6>
					<p>Free Shipping on all order</p>
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
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($latest as $b)
				<!-- single product -->
				<div class="col-lg-3 col-md-6">
					<div class="single-product">
						<img class="img-fluid" src="img/product/{{ $b->gambarBrg }}" alt="">
						<div class="product-details">
							<a href="{{ route('showProduct', $b->idBrg) }}">
								<h6>{{ $b->namaBrg }}</h6>
							</a>
							<div class="price">
								<h6>Rp. {{ number_format($b->hargaJual) }} </h6>
								<h6 class="l-through">Rp. {{ number_format($b->hargaJual) }} </h6>
							</div>
							<div class="prd-bottom">
								<a href="" class="social-info">
									<span class="ti-bag"></span>
									<p class="hover-text">tambah ke keranjang</p>
								</a>
								<a href="{{ route('showProduct', $b->idBrg) }}" class="social-info">
									<span class="lnr lnr-move"></span>
									<p class="hover-text">detail produk</p>
								</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<!-- end singgle product -->

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
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- single product -->
				<div class="col-lg-3 col-md-6">
					<div class="single-product">
						<img class="img-fluid" src="img/product/36.png" alt="">
						<div class="product-details">
							<h6>addidas New Hammer sole
								for Sports person</h6>
							<div class="price">
								<h6>$150.00</h6>
								<h6 class="l-through">$210.00</h6>
							</div>
							<div class="prd-bottom">

								<a href="" class="social-info">
									<span class="ti-bag"></span>
									<p class="hover-text">add to bag</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-heart"></span>
									<p class="hover-text">Wishlist</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-sync"></span>
									<p class="hover-text">compare</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-move"></span>
									<p class="hover-text">view more</p>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- single product -->
				<div class="col-lg-3 col-md-6">
					<div class="single-product">
						<img class="img-fluid" src="img/product/38.png" alt="">
						<div class="product-details">
							<h6>addidas New Hammer sole
								for Sports person</h6>
							<div class="price">
								<h6>$150.00</h6>
								<h6 class="l-through">$210.00</h6>
							</div>
							<div class="prd-bottom">

								<a href="" class="social-info">
									<span class="ti-bag"></span>
									<p class="hover-text">add to bag</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-heart"></span>
									<p class="hover-text">Wishlist</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-sync"></span>
									<p class="hover-text">compare</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-move"></span>
									<p class="hover-text">view more</p>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- single product -->
				<div class="col-lg-3 col-md-6">
					<div class="single-product">
						<img class="img-fluid" src="img/product/33.png" alt="">
						<div class="product-details">
							<h6>addidas New Hammer sole
								for Sports person</h6>
							<div class="price">
								<h6>$150.00</h6>
								<h6 class="l-through">$210.00</h6>
							</div>
							<div class="prd-bottom">

								<a href="" class="social-info">
									<span class="ti-bag"></span>
									<p class="hover-text">add to bag</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-heart"></span>
									<p class="hover-text">Wishlist</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-sync"></span>
									<p class="hover-text">compare</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-move"></span>
									<p class="hover-text">view more</p>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- single product -->
				<div class="col-lg-3 col-md-6">
					<div class="single-product">
						<img class="img-fluid" src="img/product/35.png" alt="">
						<div class="product-details">
							<h6>addidas New Hammer sole
								for Sports person</h6>
							<div class="price">
								<h6>$150.00</h6>
								<h6 class="l-through">$210.00</h6>
							</div>
							<div class="prd-bottom">

								<a href="" class="social-info">
									<span class="ti-bag"></span>
									<p class="hover-text">add to bag</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-heart"></span>
									<p class="hover-text">Wishlist</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-sync"></span>
									<p class="hover-text">compare</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-move"></span>
									<p class="hover-text">view more</p>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- single product -->
				<div class="col-lg-3 col-md-6">
					<div class="single-product">
						<img class="img-fluid" src="img/product/31.png" alt="">
						<div class="product-details">
							<h6>addidas New Hammer sole
								for Sports person</h6>
							<div class="price">
								<h6>$150.00</h6>
								<h6 class="l-through">$210.00</h6>
							</div>
							<div class="prd-bottom">

								<a href="" class="social-info">
									<span class="ti-bag"></span>
									<p class="hover-text">add to bag</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-heart"></span>
									<p class="hover-text">Wishlist</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-sync"></span>
									<p class="hover-text">compare</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-move"></span>
									<p class="hover-text">view more</p>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- single product -->
				<div class="col-lg-3 col-md-6">
					<div class="single-product">
						<img class="img-fluid" src="img/product/34.png" alt="">
						<div class="product-details">
							<h6>addidas New Hammer sole
								for Sports person</h6>
							<div class="price">
								<h6>$150.00</h6>
								<h6 class="l-through">$210.00</h6>
							</div>
							<div class="prd-bottom">

								<a href="" class="social-info">
									<span class="ti-bag"></span>
									<p class="hover-text">add to bag</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-heart"></span>
									<p class="hover-text">Wishlist</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-sync"></span>
									<p class="hover-text">compare</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-move"></span>
									<p class="hover-text">view more</p>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- single product -->
				<div class="col-lg-3 col-md-6">
					<div class="single-product">
						<img class="img-fluid" src="img/product/31.png" alt="">
						<div class="product-details">
							<h6>addidas New Hammer sole
								for Sports person</h6>
							<div class="price">
								<h6>$150.00</h6>
								<h6 class="l-through">$210.00</h6>
							</div>
							<div class="prd-bottom">

								<a href="" class="social-info">
									<span class="ti-bag"></span>
									<p class="hover-text">add to bag</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-heart"></span>
									<p class="hover-text">Wishlist</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-sync"></span>
									<p class="hover-text">compare</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-move"></span>
									<p class="hover-text">view more</p>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- single product -->
				<div class="col-lg-3 col-md-6">
					<div class="single-product">
						<img class="img-fluid" src="img/product/38.png" alt="">
						<div class="product-details">
							<h6>addidas New Hammer sole
								for Sports person</h6>
							<div class="price">
								<h6>$150.00</h6>
								<h6 class="l-through">$210.00</h6>
							</div>
							<div class="prd-bottom">

								<a href="" class="social-info">
									<span class="ti-bag"></span>
									<p class="hover-text">add to bag</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-heart"></span>
									<p class="hover-text">Wishlist</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-sync"></span>
									<p class="hover-text">compare</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-move"></span>
									<p class="hover-text">view more</p>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end product Area -->

<!-- Start brand Area -->
<section class="brand-area section_gap">
	<div class="container">
		<div class="row">
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/1.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/2.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/3.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/4.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/5.png" alt="">
			</a>
		</div>
	</div>
</section>
<!-- End brand Area -->

<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 text-center">
				<div class="section-title">
					<h1>Deals of the Week</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
						magna aliqua.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-9">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
						<div class="single-related-product d-flex">
							<a href="#"><img src="img/r1.jpg" alt=""></a>
							<div class="desc">
								<a href="#" class="title">Black lace Heels</a>
								<div class="price">
									<h6>$189.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
						<div class="single-related-product d-flex">
							<a href="#"><img src="img/r2.jpg" alt=""></a>
							<div class="desc">
								<a href="#" class="title">Black lace Heels</a>
								<div class="price">
									<h6>$189.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
						<div class="single-related-product d-flex">
							<a href="#"><img src="img/r3.jpg" alt=""></a>
							<div class="desc">
								<a href="#" class="title">Black lace Heels</a>
								<div class="price">
									<h6>$189.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
						<div class="single-related-product d-flex">
							<a href="#"><img src="img/r5.jpg" alt=""></a>
							<div class="desc">
								<a href="#" class="title">Black lace Heels</a>
								<div class="price">
									<h6>$189.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
						<div class="single-related-product d-flex">
							<a href="#"><img src="img/r6.jpg" alt=""></a>
							<div class="desc">
								<a href="#" class="title">Black lace Heels</a>
								<div class="price">
									<h6>$189.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
						<div class="single-related-product d-flex">
							<a href="#"><img src="img/r7.jpg" alt=""></a>
							<div class="desc">
								<a href="#" class="title">Black lace Heels</a>
								<div class="price">
									<h6>$189.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="single-related-product d-flex">
							<a href="#"><img src="img/r9.jpg" alt=""></a>
							<div class="desc">
								<a href="#" class="title">Black lace Heels</a>
								<div class="price">
									<h6>$189.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="single-related-product d-flex">
							<a href="#"><img src="img/r10.jpg" alt=""></a>
							<div class="desc">
								<a href="#" class="title">Black lace Heels</a>
								<div class="price">
									<h6>$189.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="single-related-product d-flex">
							<a href="#"><img src="img/r11.jpg" alt=""></a>
							<div class="desc">
								<a href="#" class="title">Black lace Heels</a>
								<div class="price">
									<h6>$189.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="ctg-right">
					<a href="#" target="_blank">
						<img class="img-fluid d-block mx-auto" src="img/category/c5.jpg" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

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