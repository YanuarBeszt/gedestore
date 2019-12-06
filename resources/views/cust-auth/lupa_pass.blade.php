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
	</div>
</section>
<!--================Login Box Area =================-->
<section class="login_box_areaprodu">
	<div class="container">

		<div class="col-lg-12">
			<div class="login_form_inner">
				<!-- {{-- menampilkan error validasi --}} -->
				@if (count($errors) > 0)
				@foreach ($errors->all() as $error)
				<div class="card-alert card red">
					<div class="card-content white-text">
						<p>{{ $error }}</p>
					</div>
					<button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				@endforeach
				@endif
				<h3>verifikasi dengan email & no telp yg terdaftar</h3>
				<form class="row login_form" action="/proses-lupa-user" method="post" id="contactForm" novalidate="novalidate">
					@csrf

					<div class="col-md-12 form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
					</div>
					<div class="col-md-12 form-group">
						<input type="number" class="form-control" id="telpon" name="telpon" placeholder="No telpon" onfocus="this.placeholder = ''" onblur="this.placeholder = 'No Telp'">
					</div>

					<div class="col-md-12 form-group">
						<button type="submit" value="submit" class="primary-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</section>
<!--================End Login Box Area =================-->

<!-- End related-product Area -->
@endsection