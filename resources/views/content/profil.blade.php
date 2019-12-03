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
				<h3>Data Pribari Anda</h3>
				<form class="row login_form" action="/update-profil" method="post" id="contactForm" novalidate="novalidate">
					@csrf
					@if(!empty($profil))
					@foreach($profil as $prf)
					<div class="col-md-6 form-group">
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{$prf->namaUser}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'">
						<input type="hidden" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{$prf->created_at}}">
					</div>
					<div class="col-md-6 form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{$prf->emailUser}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" readonly>
					</div>
					<div class="col-md-12 form-group">
						<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" value="{{$prf->alamatUser}}" required>
					</div>
					<div class="col-md-12 form-group">
						<input type="number" class="form-control" id="telpon" name="telpon" placeholder="Nomor Telepon" value="{{$prf->telponUser}}" required>
					</div>
					<div class="col-md-12 form-group">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
					</div>
					<div class="col-md-12 form-group">
						<input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
					</div>
					<div class="col-md-6 form-group">
						<a href="/shop" style="padding:0px">
							<button class="genric-btn danger-border radius">Batal</button>
						</a>
					</div>
					<div class="col-md-6 form-group">
						<button type="submit" value="submit" class="primary-btn">Simpan</button>
					</div>
					@endforeach
					@endif
				</form>
			</div>
		</div>

	</div>
</section>
<!--================End Login Box Area =================-->

<!-- End related-product Area -->
@endsection