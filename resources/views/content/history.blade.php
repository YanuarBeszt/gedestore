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
                <h1>Histori Belanja</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Histori</a>
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
                            <th scope="col">Nomor Transaksi</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Jumlah Barang</th>
                            <th scope="col">Total Harga</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if($trans->count() != 0 )
@foreach($trans as $tr) 
                        <tr>
                            <td>
                                <a href="/invoice/{{$tr->transaksi_nomor}}">{{$tr->transaksi_nomor}}</a>
                            </td>
                            <td>
                                <h5>asaasasd</h5>
                            </td>
                            <td>
                                <h5>{{$tr->transaksi_nomor}}</h5>
                            </td>
                            <td>
                                <h5>{{$tr->transaksi_nomor}}</h5>
                            </td>
                        </tr>
        
@endforeach


                        @else
<tr>
    <td style="text-align: center;" colspan="4">
        Transaksi Kamu Masih Kosong :) 
    </td>
</tr>
                        @endif


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- <hr>
<hr>
<hr>
<hr> -->
<!--================End Cart Area =================-->
@endsection