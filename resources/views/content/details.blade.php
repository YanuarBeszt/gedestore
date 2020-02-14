<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian konten -->
@section('codejs')

<!-- isi kode JS -->

@endsection
@section('filejs')

<script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>
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
                <h1>Product Details Page</h1>
                <nav class="d-flex align-items-center">
                    <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                    <a href="">product-details</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Single Product Area =================-->
<div class="product_image_area">

    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">
                    <div class="single-prd-item">
						<img class="img-fluid" src="{{ url('/gambar_barang/'.$barang_gambar) }}" alt="">
                    </div>
                    <div class="single-prd-item">
						<img class="img-fluid" src="{{ url('/gambar_barang/'.$barang_gambar) }}" alt="">
                    </div>
                    <div class="single-prd-item">
						<img class="img-fluid" src="{{ url('/gambar_barang/'.$barang_gambar) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $barang_nama }}</h3>
                    {{-- <h3>{{ $stok_ukuran }}</h3>
                    <h3>{{ $stok_id }}</h3> --}}
                    <h2>Rp.{{ number_format($price) }}</h2>
                    <ul class="list">
                        <li><a class="active" href="#"><span>Category</span> : {{ $kategori_nama }}</a></li>
                        <li><a href="#"><span>Availibility</span> : In Stock</a></li>
                    </ul>
                    <p>{{ $barang_deskripsi }}</p>
                    {{-- <div class="product_count">
						<label for="qty">Quantity:</label>
						<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
						<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
						<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
					</div> --}}
                    <div class="card_area d-flex align-items-center">
                        <div class="row">
                            <form action="/tambah-cart" method="POST">
                                <!--						@csrf -->
                                {{ csrf_field()}}

                                <input type="hidden" name="price" value="{{ $price }}" />
                                <input type="hidden" name="barang_nama" value="{{ $barang_nama }}" />
                                <input type="hidden" name="barang_id" value="{{ $barang_id }}" />
                                <input type="hidden" name="barang_gambar" value="{{ $barang_gambar }}" />
                                <input type="hidden" name="stok_id" value="{{$stok_id}}">
                                <input type="hidden" name="stok_gudang" value="{{$stok_gudang}}">


                                <select name="stok_ukuran" id="stok_ukuran">

                                    @foreach($ukuran_stok as $u)

                                    <option value="{{$u->stok_id}}">{{$u->stok_ukuran}} - stok {{$u->stok_jumlah_stok}}</option>

                                    @endforeach
                                </select>
                                <input type="submit" value="Tambah ke Keranjang" class="btn btn-outline-info ml-2">
                            </form>
                            <!-- add to wishlist -->
                            <a href="{{ url('wishlists/addToWishlists/'.$barang_id.'/'.session('user_id')) }}" class="btn btn-outline-info ml-2">Tambah ke Wishlist</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->
<br>
<br>
<br>
<br>
@endsection