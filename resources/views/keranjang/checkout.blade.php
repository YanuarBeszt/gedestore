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
                    <h1>Shop Checkout page</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
<section class="checkout_area section_gap">
        <div class="container">


            <div class="billing_details">
                    @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)

                            <p style="color: red;">{{ $error }}</p>
                    @endforeach
                    @endif
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="/proses-checkout" method="post" novalidate="novalidate">
                            @csrf

                            <input type="hidden" value="{{session('user_id')}}"  name="user_id">
                            <input type="hidden" value="{{$kode_trans}}"  name="kode_trans">

                            <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="first" value="{{session('user_nama')}}" placeholder="Nama" name="name">

                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="email" class="form-control" placeholder="Email" id="email" value="{{session('user_email')}}" name="email">
                               
                            </div>
                            <div class="col-md-12 form-group">
                                    <textarea class="form-control" name="alamat" id="alamat" rows="1" placeholder="Alamat"></textarea>
                                </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="number">
                               
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="compemailany">
                               
                            </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a href="#">Product <span>Total</span></a></li>
                                @foreach($cart as $c)
                                <li><a href="#">{{$c->name}} - {{$c->attributes->size}} <span class="middle">x{{$c->quantity}}</span> <span class="last">Rp.{{number_format($c->quantity*$c->price)}}</span></a></li>
                                @endforeach
                            </ul>
                            <ul class="list list_2">
                            <li><a href="#">Subtotal <span>Rp.{{number_format($jml_total)}}</span></a></li>
                                <li><a href="#">Shipping <span>--</span></a></li>
                                <li><a href="#">Total <span>Rp.{{number_format($jml_total)}}</span></a></li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="selector">
                                    <label for="f-option5">Cash</label>
                                    <div class="check"></div>
                                </div>
                                <p>Lakukan pembayaran ke toko secara langsung.</p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector">
                                    <label for="f-option6">Transfer Bank </label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                                <p>Pembayaran Melalui transfer Bisa dilakukan melalui bank yang akan tercantum ketika sudah selesai checout.</p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector">
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div>
                            <button type="submit" class="primary-btn" >Proceed to checkout </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
    @endsection