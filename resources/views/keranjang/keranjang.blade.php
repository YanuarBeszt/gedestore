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
                <h1>Shop Cart page</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Cart</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<!--================Login Box Area =================-->
<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Berat</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $tot_berat = 0;
                        @endphp
                        @if($jml_crt > 0)

                        @foreach($cart as $c)
                        @php
                        $berat_brg = $c->attributes->berat*$c->quantity;
                        $tot_berat += $berat_brg;

                        @endphp

                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img width="100" height="100" src="/gambar_barang/{{ $c->attributes->gambar }}" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p>{{$c->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>Rp.{{number_format($c->price)}}</h5>
                            </td>
                            <td>
                                <h5>{{$c->attributes->size}}</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input type="text" name="qty" id="sst" maxlength="12" value="{{$c->quantity}}" title="Quantity:" readonly>
                                </div>
                            </td>
                            <td>
                                <h5>{{$c->attributes->berat*$c->quantity}} gram</h5>
                            </td>
                            <td>
                                <h5>Rp.{{number_format($c->price*$c->quantity)}}</h5>
                            </td>
                            <td>
                                <h5><a href="#" data-toggle="modal" data-target="#edit{{$c->id}}">Edit</a> | <a href="/hapus-cart/{{$c->id}}">Delete</a></h5>
                            </td>
                        </tr>


                        <!-- Modal Edit-->
                        <div id="edit{{$c->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Masukkan Jumlah {{$c->name}} - {{$c->attributes->size}}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <form action="/edit-cart" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="hidden" name="stok_id" value="{{$c->attributes->stok_id}}">
                                                    <input type="hidden" name="jml_skrg" value="{{$c->quantity}}">
                                                    <input type="hidden" name="id_row" value="{{$c->id}}">

                                                </div>
                                                <div class="col-md-4"><input type="number" value="" name="qty_edit" placeholder="Masukkan Jumlah"></div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                        @endforeach
                        @else
                        <td colspan="6" style="text-align:center;">Keranjang Kosong. </td>
                        @endif

                        <tr>

                            <td>
                                <a class="gray_btn" href="/destroy-cart">Kosongkan Keranjang</a>
                            </td>
                            <td></td>
                            <td></td>

                            <td>
                                <h5>Total Berat</h5>

                            </td>
                            <td>
                                {{$tot_berat}}
                            </td>
                            <td>
                                <h5>Total Harga</h5>

                            </td>
                            <td>
                                <h5>Rp.{{number_format($total)}}</h5>

                            </td>
                            <td>
                            </td>
                        </tr>
                        {{-- <tr class="shipping_area">
                                    <td></td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li><a href="#">Flat Rate: $5.00</a></li>
                                            <li><a href="#">Free Shipping</a></li>
                                            <li><a href="#">Flat Rate: $10.00</a></li>
                                            <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                        </ul>
                                        <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                        <select class="shipping_select">
                                            <option value="1">Bangladesh</option>
                                            <option value="2">India</option>
                                            <option value="4">Pakistan</option>
                                        </select>
                                        <select class="shipping_select">
                                            <option value="1">Select a State</option>
                                            <option value="2">Select a State</option>
                                            <option value="4">Select a State</option>
                                        </select>
                                        <input type="text" placeholder="Postcode/Zipcode">
                                        <a class="gray_btn" href="#">Update Details</a>
                                    </div>
                                </td>
                                <td></td>

                            </tr> --}}
                        <tr class="out_button_area">
                            <td></td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="/shop">Continue Shopping</a>
                                    @if(session('login_user'))
                                    <a class="primary-btn" href="/checkout-shop">Proceed to checkout</a>
                                    @else
                                    <a class="primary-btn" href="/customer/login">Login to checkout</a>

                                    @endif
                                </div>
                            </td>
                            <td></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
@endsection