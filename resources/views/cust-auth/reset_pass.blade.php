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

						<p style="color: red;">{{ $error }}</p>

				@endforeach
				@endif
				<h3>isi Form di bawah me reset password</h3>
				<form class="row login_form" action="/proses-reset" method="post" id="contactForm" novalidate="novalidate">
                    @csrf
                    
                    <input type="hidden" value="{{request()->route('id')}}" name="token">
					<div class="col-md-12 form-group">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
					</div>
					<div class="col-md-12 form-group">
						<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
					</div>

					<div class="col-md-12 form-group">
						<button type="submit" value="submit" class="primary-btn">Prosess</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</section>
<!--================End Login Box Area =================-->

<!-- End related-product Area -->
@endsection