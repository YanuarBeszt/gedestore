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
<!-- <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script> -->
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
				<h3>Data Pribari Anda</h3>
				<form class="row login_form" action="/update-profil" method="post" id="contactForm" novalidate="novalidate">
					@csrf
					<div class="col-md-6 form-group">
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{$namaUser}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'">
						<input type="hidden" class="form-control" id="created_at" name="created_at" placeholder="created_at" value="{{$created_at}}">
						<input type="hidden" class="form-control" id="created_at" name="prov-edit" placeholder="created_at" value="{{$prov}}">
						<input type="hidden" class="form-control" id="created_at" name="city-edit" placeholder="created_at" value="{{$city}}">
					</div>
					<div class="col-md-6 form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{$emailUser}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" readonly>
					</div>
					<div class="col-md-12 form-group">
						<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" value="{{$alamatUser}}" required>
					</div>
					<div class="col-md-12 form-group">
						<select name="prov" class="fetch_prov form-control">
							<option value="">--pilih provinsi--</option>
						</select>
					</div>
					<div class="col-md-12 form-group">
						<select name="city" class="fetch_city form-control">
							<option value="">--pilih kota--</option>
						</select>
					</div>
					<div class="col-md-12 form-group">
						<input type="number" class="form-control" id="telpon" name="telpon" placeholder="Nomor Telepon" value="{{$telponUser}}" required>
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
				</form>
			</div>
		</div>

	</div>
</section>
<!--================End Login Box Area =================-->

<!-- End related-product Area -->
@endsection