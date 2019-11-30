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

<!-- <script type="text/javascript">
    function do_change(){
    document.getElementById("save").style.display = "block";
    document.getElementById("change").style.display = "block";
    document.getElementById("cancel").style.display = "block";
    }
</script> -->

<style>
    #btn-submit
    {
      
        background: none;
        padding: 0px;
        border: none;
        margin-bottom: 13px;
    }

    #hover-delete
    {
        margin-left: 6px;
    }
</style>

@endsection


@section('konten')


    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Wishlist</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Wishlist</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
        <div class="single-product-slider">
			<div class="container">
				<div class="row">
    
                @if($wishlists->isEmpty())
                    
                    <h4>Maaf, Barang tidak ditemukan!</h4>
                    
                @else
                
                @foreach($wishlists as $w)                    
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="img/product/{{ $w->barang_gambar }}" alt="">
							<div class="product-details">
                            <a href="{{ route('showProduct', $w->barang_id) }}">
									<h6>{{ $w->barang_nama }}</h6>
								</a>
								<div class="price">
									<h6>{{ number_format($w->barang_harga_jual) }}</h6>
									<h6 class="l-through">{{ number_format($w->barang_harga_jual) }}</h6>
								</div>
								<div class="prd-bottom">
                                <a href="{{ route('showProduct', $w->barang_id) }}" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">beli</p>
									</a>

                                    <form action="/wishlists/delWishlists/{{ $w->wishlist_id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        
                                        <button type="submit" value="hapus" id="btn-submit" class=button5" onclick="do_change(); return false;">                                           
                                            <a class="social-info">
                                                <span class="ti-trash"></span>    
                                                <p class="hover-text" id="hover-delete">hapus</p>
                                            </a>
                                        </button>


                                         <!-- <a class="social-info" id="btn-submit" type="submit" onclick="do_change(); return false;"> 
                                            <span class="ti-trash"></span>                                                
                                            <p class="hover-text">hapus</p>
                                        </a> -->

                                    </form>
								</div>
							</div>
						</div>
                    </div>
                @endforeach
                    
                    @endif
				</div>
			</div>
		</div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection