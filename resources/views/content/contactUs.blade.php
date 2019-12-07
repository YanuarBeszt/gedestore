<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian konten -->
@section('codejs')

<!-- isi kode JS -->

@endsection
<!--Contact-->
<script src='https://unpkg.com/leaflet@1.6.0/dist/leaflet.js'></script>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>


@section('filejs')

<script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
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
                <h1>Contact us</h1>
                <nav class="d-flex align-items-center">

                    <a href="#">Contact Us</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Content =================-->
<section class="contact_area section_gap_bottom">
    <div class="container mt-5">

        
        

        <div class="row">
        <div id="mymap"></div>
        <!-- style="z-index: 2; position: absolute; top: 120px; left: 0px;" -->
            <div class="col-md-3"></div>
            <div class="col-md-6"></div>
            <div class="col-md-3"></div>
        </div>

    
        <script>
            var mymap;
            var lyrOSM;
            
            $(document).ready(function(){
            mymap = L.map('mymap').setView([51.505, -0.09], 13);
            lyrOSM = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png');
            mymap.addLayer(lyrOSM);
            var strPopup ='<h6>Toko Gede Jember</h6>';
                strPopup += '<img src="{{ url('/gambar_barang/p1.jpg') }}" height="160px" alt="">'
            L.marker([51.5, -0.09]).addTo(mymap)
            .bindPopup(strPopup)
            .openPopup();
            });
            
            
            
        </script>

       
        <br>

    <br>
    <div class="row">
        <div class="col-lg-3">
            <div class="contact_info">
                <div class="info_item">
                    <i class="lnr lnr-home"></i>
                    <h6>Jl karimata V/E 6</h6>
                    <p>Gumuk Kerang, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121</p>
                </div>
                <div class="info_item">
                    <i class="lnr lnr-phone-handset"></i>
                    <h6><a href="#">0822-3101-0999</a></h6>
                    <p>Buka ⋅ Tutup pukul 17.00</p>
                </div>
                <div class="info_item">
                    <i class="lnr lnr-envelope"></i>
                    <h6><a href="#">support@colorlib.com</a></h6>
                    <p>Send us your query anytime!</p>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <form class="row contact_form" action="contact_process.php" method="post" id="contactForm"
                novalidate="novalidate">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter email address" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter email address'">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="primary-btn">Send Message</button>
                </div>
            </form>
        </div>
    </div>
    </div>

</section>
<!--================End Content =================-->
@endsection
