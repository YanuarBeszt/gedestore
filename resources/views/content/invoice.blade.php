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

@section('konten')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Confirmation page</h1>
				<nav class="d-flex align-items-center">
					<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="#">Checkout<span class="lnr lnr-arrow-right"></span></a>
					<a href="category.html">Confirmation</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<section class="order_details section_gap">
	<div class="container">
		<h3 class="title_confirmation">Thank you. Your order has been received.</h3>
		<div class="row order_d_inner">
			<div class="col-lg-4">
				<div class="details_item">
					<h4>Order Info</h4>
					<ul class="list">
						<li><a href="#"><span>Order number</span> : {{$kode}}</a></li>
						<li><a href="#"><span>Date</span> : {{$tgl}}</a></li>
						<li><a href="#"><span>Total</span> : Rp.{{number_format($jml_total)}}</a></li>
						<li><a href="#"><span>Payment method</span> : Transfer</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="details_item">
					<h4>Billing Address</h4>
					<ul class="list">
						<li><a href="#"><span>Street</span> : {{$alamat}}</a></li>
						{{-- <li><a href="#"><span>City</span> : Los Angeles</a></li>
							<li><a href="#"><span>Country</span> : United States</a></li>
							<li><a href="#"><span>Postcode </span> : 36952</a></li> --}}
					</ul>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="details_item">
					<h4>Shipping </h4>
					<ul class="list">
						<li><a href="#"><span>Ongkir</span> : Rp.{{number_format($ongkir)}}</a></li>

						{{-- <li><a href="#"><span>Street</span> : 56/8</a></li>
							<li><a href="#"><span>City</span> : Los Angeles</a></li>
							<li><a href="#"><span>Country</span> : United States</a></li>
							<li><a href="#"><span>Postcode </span> : 36952</a></li> --}}
					</ul>
				</div>
			</div>
			<div class="col-lg-4">

			</div>
			<div class="col-lg-4">
				<div class="details_item">
					<h4 style="text-align: center;">Hubungi Penjual Untuk Kirim Bukti Transfer</h4>
					<h6 style="text-align: center;">Melalui Link Whatsapp Berikut :
						<a href="https://api.whatsapp.com:/send?phone=+6285330630656&text=Kode Transaksi: {{ $kode }}">085330630656</a>

					</h6>

				</div>
			</div>
			<div class="col-lg-4">

			</div>
		</div>
		<div class="order_details_table">
			<h2>Order Details</h2>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Product</th>
							<th scope="col">Ukuran</th>

							<th scope="col">Quantity</th>
							<th scope="col">Berat</th>

							<th scope="col">Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach($brg_trans as $br)
						<tr>
							<td>
								<p>{{$br->barang_nama}}</p>
							</td>
							<td>
								<h5>{{$br->dt_barang_ukuran}}</h5>
							</td>
							<td>
								<h5> x {{$br->dt_jumlah_barang}}</h5>
							</td>
							<td>
								<h5>{{$br->berat_barang*$br->dt_jumlah_barang}}g</h5>
							</td>
							<td>
								<p>Rp.{{number_format($br->dt_jumlah_harga)}}</p>
							</td>
						</tr>
						@endforeach
						<tr>
							<td>
								<h4>Subtotal</h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<p>Rp.{{number_format($jml_total)}}</p>
							</td>
						</tr>
						<tr>
							<td>
								<h4>Ongkir</h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<p>Rp.{{number_format($ongkir)}}</p>
							</td>
						</tr>
						<tr>
							<td>
								<h4>Total</h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<p>Rp.{{number_format($jml_total)}}</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
@endsection