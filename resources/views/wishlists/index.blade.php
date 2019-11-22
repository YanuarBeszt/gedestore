@extends('layout.main')

@section('title','Halaman Wishlist')

@section('container')
    
    <div class="container">
        <div class="row">
            <?php if($wishlists->isEmpty()) { ?>
                <h4>Maaf, Barang tidak ditemukan.</h4>
            <?php } else { ?>
                @foreach($wishlists as $wishlist)
                    <div class="col-md-4 col-sm-4">
                        <div class="text-center">
                            <a href="{{url('shop/showProduct/{id}',$wishlist->$id)}}">
                                <img src="" alt="TEST">
                            </a>
                        </div>
                        <h2>Rp.{{$wishlist->barang_harga_jual}}</h2>
                        <p>
                            <a href="{{url('/showProduct',$wishlist->id}}">
                                <img src="" alt="">
                            </a>
                        </p>
                    </div>
                @endforeach
        </div>
    </div>        
@endsection