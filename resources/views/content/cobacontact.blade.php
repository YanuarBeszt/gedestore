<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
<link rel="stylesheet" href="{{ asset('src/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('https://unpkg.com/leaflet@1.6.0/dist/leaflet.css') }}">
<script src="{{ asset('https://unpkg.com/leaflet@1.6.0/dist/leaflet.js') }}"></script>
<script src="{{ asset('src/jquery-3.4.1.min.js') }}"></script>
<style>
            #mapdiv {
            border: 3px solid red;
			width: 800px;
			height: 500px;
                
            }
/*
            #mapdiv {
            height: 550px;
            background-color: salmon;
            }
*/
        </style>
</head>
<body>
   
<div class="row">
            

            <div class="col-md-3 col-md-pull-9"></div>
            <div id="mapdiv" class="col-md-9 col-md-push-3"></div>
        </div>
       <h1></h1>
        
        <script>
            var mymap;
            var lyrOSM;
            
            $(document).ready(function(){
            mymap = L.map('mapdiv').setView([51.505, -0.09], 13);
            lyrOSM = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png');
            mymap.addLayer(lyrOSM);
            var strPopup ='<h6>Toko Gede Jember</h6>';
                strPopup += '<img src="{{ url('/gambar_barang/p1.jpg') }}" height="140px" alt="">'
            L.marker([51.5, -0.09]).addTo(mymap)
            .bindPopup(strPopup)
            .openPopup();
            });
            
            
            
        </script>
    
</body>
</html>