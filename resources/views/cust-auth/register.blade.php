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
				</div>
				@endforeach
				@endif
				<h3>isi Form di bawah untuk daftar</h3>
				<form class="row login_form" action="/proses-register-user" method="post" id="contactForm" novalidate="novalidate">
					@csrf

					<div class="col-md-6 form-group">
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'">
					</div>
					<div class="col-md-6 form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
					</div>
					<div class="col-md-12 form-group">
						<input type="number" class="form-control" id="nohp" name="nohp" placeholder="No Handphone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'No Handphone'">
					</div>
					<div class="col-md-12 form-group">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
					</div>
					<div class="col-md-12 form-group">
						<input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
					</div>
					<div class="col-md-1 form-group">
						<input type="checkbox" id="f-option2" name="privacy" required>
					</div>
					<div class="col-md-11 form-group">
						<label style="font-size:14px;" for="f-option2"><a href="/privacy-policy">Saya setuju dengan ketentuan layanan dan kebijakan pribadi.</a></label>
					</div>
					<div class="col-md-12 form-group">
						<button type="submit" value="submit" class="primary-btn">Daftar</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</section>
<!--================End Login Box Area =================-->

<!-- End related-product Area -->
@endsection