@extends('layouts.base.front.main')


@section('content')
    <div class="btc_tittle_main_wrapper">
        <div class="btc_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                    <div class="btc_tittle_left_heading">
                        <h1>Cari Mobil</h1>
                    </div>
                </div>
                {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                    <div class="btc_tittle_right_heading">
                        <div class="btc_tittle_right_cont_wrapper">
                            <ul>
                                <li><a href="#">Beranda</a> <i class="fa fa-angle-right"></i></li>
                                <li><a href="#">Cari Mobil</a> <i class="fa fa-angle-right"></i></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="x_offer_car_main_wrapper float_left padding_tb_100">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="mapCanvas" style="width: 100%;height: 500px">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="border-radius: 30px">
                        <div class="card-header">
                            <h4 class="text-primary"><b>Cari Lokasi Mobil Terdekat</b></h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="control-label">Masukkan Lokasi</label>
                                        <textarea placeholder="Pilih tempat yang anda inginkan" class="form-control" name="alamat" onFocus="initializeAutocomplete()" id="locality" autocomplete></textarea>

                                        {{-- <textarea placeholder="Enter Area name to populate Latitude and Longitude" class="form-control" name="alamat" onFocus="initializeAutocomplete()" id="locality" autocomplete></textarea> --}}

                                        {{-- <input type="text" class="form-control"placeholder="Enter Area name to populate Latitude and Longitude" onFocus="initializeAutocomplete()" id="locality" autocomplete > --}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="button" class="form-control" onClick="initMap()" id="cari">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="tab-content">
                        <div id="home" class="tab-pane active">
                            <div class="row justify-content-center" id="gridhome">
                                {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="x_car_offer_main_boxes_wrapper float_left">
                                        <div class="x_car_offer_img float_left">
                                            <img src="http://127.0.0.1:8000/images/mobil/1684997863fortuner.png" class="img-fluid" style="max-height: 150px;" alt="img" />
                                        </div>
                                        <div class="x_car_offer_price float_left">
                                            <div class="x_car_offer_price_inner">
                                                <h3 style="font-size: 20px;">Rp. 1500</h3>
                                                <p>
                                                    <span>K</span> <br />
                                                    / hari
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Fortuner</a></h2>
                                            <p>SUV</p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-users"></i> &nbsp;8</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                </li>
                                                <li>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current"><i class="fa fa-bars"></i></span>
                                                        <ul class="list">
                                                            <li class="dpopy_li">
                                                                <a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                            </li>
                                                            <li class="dpopy_li">
                                                                <a href="#"><i class="fa fa-code-fork"></i>Manual Transmission</a>
                                                            </li>
                                                            <li class="dpopy_li">
                                                                <a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="x_car_offer_bottom_btn float_left">
                                            <ul class="">
                                                <li><a href="#">NEW</a></li>
                                                <li><a href="http://127.0.0.1:8000/1/detail">Details</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="x_car_offer_main_boxes_wrapper float_left">
                                        <div class="x_car_offer_img float_left">
                                            <img src="http://127.0.0.1:8000/images/mobil/1684997940inova reborn.png" class="img-fluid" style="max-height: 150px;" alt="img" />
                                        </div>
                                        <div class="x_car_offer_price float_left">
                                            <div class="x_car_offer_price_inner">
                                                <h3 style="font-size: 20px;">Rp. 600</h3>
                                                <p>
                                                    <span>K</span> <br />
                                                    / hari
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Inova Reborn</a></h2>
                                            <p>SUV</p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-users"></i> &nbsp;8</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                </li>
                                                <li>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current"><i class="fa fa-bars"></i></span>
                                                        <ul class="list">
                                                            <li class="dpopy_li">
                                                                <a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                            </li>
                                                            <li class="dpopy_li">
                                                                <a href="#"><i class="fa fa-code-fork"></i>Manual Transmission</a>
                                                            </li>
                                                            <li class="dpopy_li">
                                                                <a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="x_car_offer_bottom_btn float_left">
                                            <ul class="">
                                                <li><a href="#">NEW</a></li>
                                                <li><a href="http://127.0.0.1:8000/2/detail">Details</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="card">
                    <div class="col-md-12"></div>
                </div>
            </div> --}}
        </div>
    </div>
        
@endsection


@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDbOpBHYiou-5YwdLAN6yLg554NwQ8ciSc&callback=initMap"></script>
    <script>
        function initializeAutocomplete(){
            var input = document.getElementById('locality');
            // var options = {
            //   types: ['(regions)'],
            //   componentRestrictions: {country: "IN"}
            // };
            var options = {}

            var autocomplete = new google.maps.places.Autocomplete(input, options);

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                var lat = place.geometry.location.lat();
                var lng = place.geometry.location.lng();
                var placeId = place.place_id;
                // to set city name, using the locality param
                var componentForm = {
                    locality: 'short_name',
                };
                for (var i = 0; i < place.address_components.length; i++) {
                    var addressType = place.address_components[i].types[0];
                    if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById("city").value = val;
                    }
                }
                // if (localStorage.getItem('latitude') != null && localStorage.getItem('longitude') != null) {
                //     localStorage.setItem("latitude", latitude);
                //     localStorage.setItem("longitude", longitude);
                // }
                localStorage.setItem("latitude", lat);
                localStorage.setItem("longitude", lng);

                $('#latitude').val(lat);
                $('#longitude').val(lng);


                // await initialize()
                // initialize()
                
            });
            // window.initMap = initMap();

        }
        function initMap(){
                var map;
                var radius = 1500
                var myCenter=new google.maps.LatLng(localStorage.getItem("latitude"),localStorage.getItem("longitude"));
                var bounds = new google.maps.LatLngBounds();
                var mapOptions = {
                    center: myCenter,
                    zoom: 14,
                    mapTypeId: 'roadmap'
                };

                
                // Display a map on the web page
                map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
                
                const regionCircle = new google.maps.Circle({
                        strokeColor: "#FF0000",
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: "#FF0000",
                        fillOpacity: 0.19,
                        map: map,
                        center: myCenter,
                        radius: radius,
                        clickable: false
                });
                // map.setTilt(50);
                var marker = new google.maps.Marker({
                    position: myCenter,
                    map: map,
                    title: 'Your Location',
                    icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
                });
                    
                var markers = [
                    // ['Brooklyn Museum, NY', -0.0372848, 109.3142381],
                    // ['Pontianak', -0.0362484, 109.4142181],
                    // ['Prospect Park Zoo, NY', 40.66427511834109, -73.96512605857858],
                    // ['Barclays Center, Brooklyn, NY', 40.68268267107631, -73.97546296241961]
                ];
                                    
                // Info window content
                var infoWindowContent = [
                    // ['<div class="info_content">' +
                    // '<h2>Brooklyn Museum</h2>' +
                    // '<h3>200 Eastern Pkwy, Brooklyn, NY 11238</h3>' +
                    // '<p>The Brooklyn Museum is an art museum located in the New York City borough of Brooklyn.</p>' + 
                    // '</div>'],
                    // ['<div class="info_content">' +
                    // '<h2>Central Library</h2>' +
                    // '<h3>10 Grand Army Plaza, Brooklyn, NY 11238</h3>' +
                    // '<p>The Central Library is the main branch of the Brooklyn Public Library, located at Flatbush Avenue.</p>' +
                    // '</div>']
                
                ];

                $.ajax({
                    url: "{{ url('api/cars') }}",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        // console.log(data.data.length);
                        let listData = data.data;
                        console.log(listData);
                        listData.forEach(element => {
                            // console.log('element')
                            // console.log(element.nama_mobil);
                        });
                        $.each(data.data, function(key, value) {
                            // console.log(value);
                            
                            // console.log(value);
                            let mark = [
                                value.nama_mobil,
                                parseFloat(value.rental.latitude),
                                parseFloat(value.rental.longitude)
                            ];

                            // let myData = new google.maps.LatLng(parseFloat(value.latitude), parseFloat(value.longitude));
                            let myData = [value.rental.latitude, value.rental.longitude]

                            // console.log("myData"+myData[1])
                            // console.log("myCenter"+myCenter)
                            let centerLocation = [localStorage.getItem("latitude"),localStorage.getItem("longitude")]
                            let check = checkCircleInMarker(centerLocation, myData, radius)
                            // console.log("check"+check)

                            if(check){
                                // console.log('ada')
                                // console.log(mark)
            
                                markers.push(mark);
            
            
                                let content = [
                                    '<div class="info_content">' +
                                        '<img src="http://127.0.0.1:8000/images/mobil/'+value.foto_mobil+'" style="widht: 200px;height:100px" alt="">' +
                                    '<h2>'+value.nama_mobil+'</h2>' +
                                    '<h4>'+value.tipe_mobil+'</h4>'+
                                    '<p>'+value.rental.alamat+'</p>' +
                                    `<a href="{{ url("`+value.id+`") }}/detail" class="btn btn-sm btn-outline-primary">Detail</a>`+
                                    '</div>',
                                ]
                                infoWindowContent.push(content);

                                // $('#gridhome').append(`
                                //     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                //         <div class="x_car_offer_main_boxes_wrapper float_left">
                                //             <div class="x_car_offer_img float_left">
                                //                 <img src="http://127.0.0.1:8000/images/mobil/1684997863fortuner.png" class="img-fluid" style="max-height: 150px;" alt="img" />
                                //             </div>
                                //             <div class="x_car_offer_price float_left">
                                //                 <div class="x_car_offer_price_inner">
                                //                     <h3 style="font-size: 20px;">Rp. 1500</h3>
                                //                     <p>
                                //                         <span>K</span> <br />
                                //                         / hari
                                //                     </p>
                                //                 </div>
                                //             </div>
                                //             <div class="x_car_offer_heading float_left">
                                //                 <h2><a href="#">`+value.nama_mobil+`</a></h2>
                                //                 <p>SUV</p>
                                //             </div>
                                //             <div class="x_car_offer_heading float_left">
                                //                 <ul>
                                //                     <li>
                                //                         <a href="#"><i class="fa fa-users"></i> &nbsp;8</a>
                                //                     </li>
                                //                     <li>
                                //                         <a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                //                     </li>
                                //                     <li>
                                //                         <a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                //                     </li>
                                //                     <li>
                                //                         <div class="nice-select" tabindex="0">
                                //                             <span class="current"><i class="fa fa-bars"></i></span>
                                //                             <ul class="list">
                                //                                 <li class="dpopy_li">
                                //                                     <a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                //                                 </li>
                                //                                 <li class="dpopy_li">
                                //                                     <a href="#"><i class="fa fa-code-fork"></i>Manual Transmission</a>
                                //                                 </li>
                                //                                 <li class="dpopy_li">
                                //                                     <a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                //                                 </li>
                                //                             </ul>
                                //                         </div>
                                //                     </li>
                                //                 </ul>
                                //             </div>
                                //             <div class="x_car_offer_bottom_btn float_left">
                                //                 <ul class="">
                                //                     <li><a href="#">NEW</a></li>
                                //                     <li><a href="http://127.0.0.1:8000/1/detail">Details</a></li>
                                //                 </ul>
                                //             </div>
                                //         </div>
                                //     </div>
                                // `)

                            }else{
                                // console.log('tidak ada')
                            }


                        });

                    }
                })
                // Multiple markers location, latitude, and longitude


                // console.log(markers)
                // console.log(infoWindowContent+"infowindow")
            

                setTimeout(() => {
                    // Add multiple markers to map

                    // console.log(markers)
                    var infoWindow = new google.maps.InfoWindow(), marker, i;
                    
                    // Place each marker on the map  
                    for( i = 0; i < markers.length; i++ ) {
                        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                        bounds.extend(position);
                        marker = new google.maps.Marker({
                            position: position,
                            map: map,
                            title: markers[i][0]
                        });
                        
                        // Add info window to marker    
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infoWindow.setContent(infoWindowContent[i][0]);
                                infoWindow.open(map, marker);
                            }
                        })(marker, i));
                
                        // Center the map to fit all markers on the screen
                        map.fitBounds(bounds);
                    }
                
                    // Set zoom level
                    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                        this.setCenter(myCenter);
                        this.setZoom(14);
                        google.maps.event.removeListener(boundsListener);
                    });
                    
                }, 5000);
                    
                function checkCircleInMarker(markerPosition, circlePosition, radius) {
                    // console.log("circle"+circlePosition[1])
                    // console.log("marker"+markerPosition)
                    var km = radius/1000;
                    var kx = Math.cos(Math.PI * circlePosition[0] / 180) * 111;
                    var dx = Math.abs(circlePosition[1] - markerPosition[1]) * kx;
                    var dy = Math.abs(circlePosition[0] - markerPosition[0]) * 111;
                    // console.log("dy"+dy)
                    return Math.sqrt(dx * dx + dy * dy) <= km;
                }

            }

        $('#cari').on('click',function(){
            $('#gridhome').html('')
                // window.initMap = initMap();/

            function initMap(){
                var map;
                var radius = 1500
                var myCenter=new google.maps.LatLng(localStorage.getItem("latitude"),localStorage.getItem("longitude"));
                var bounds = new google.maps.LatLngBounds();
                var mapOptions = {
                    center: myCenter,
                    zoom: 14,
                    mapTypeId: 'roadmap'
                };

                
                // Display a map on the web page
                map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
                
                const regionCircle = new google.maps.Circle({
                        strokeColor: "#FF0000",
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: "#FF0000",
                        fillOpacity: 0.19,
                        map: map,
                        center: myCenter,
                        radius: radius,
                        clickable: false
                });
                // map.setTilt(50);
                var marker = new google.maps.Marker({
                    position: myCenter,
                    map: map,
                    title: 'Your Location',
                    icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
                });
                    
                var markers = [
                    // ['Brooklyn Museum, NY', -0.0372848, 109.3142381],
                    // ['Pontianak', -0.0362484, 109.4142181],
                    // ['Prospect Park Zoo, NY', 40.66427511834109, -73.96512605857858],
                    // ['Barclays Center, Brooklyn, NY', 40.68268267107631, -73.97546296241961]
                ];
                                    
                // Info window content
                var infoWindowContent = [
                    // ['<div class="info_content">' +
                    // '<h2>Brooklyn Museum</h2>' +
                    // '<h3>200 Eastern Pkwy, Brooklyn, NY 11238</h3>' +
                    // '<p>The Brooklyn Museum is an art museum located in the New York City borough of Brooklyn.</p>' + 
                    // '</div>'],
                    // ['<div class="info_content">' +
                    // '<h2>Central Library</h2>' +
                    // '<h3>10 Grand Army Plaza, Brooklyn, NY 11238</h3>' +
                    // '<p>The Central Library is the main branch of the Brooklyn Public Library, located at Flatbush Avenue.</p>' +
                    // '</div>']
                
                ];

                $.ajax({
                    url: "{{ url('api/cars') }}",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        // console.log(data.data.length);
                        let listData = data.data;
                        console.log(listData[0]);
                        
                        for (let index = 0; index < listData.length; index++) {

                            let mark = [
                                listData[index].nama_mobil,
                                parseFloat(listData[index].rental.latitude),
                                parseFloat(listData[index].rental.longitude)
                            ];
    
                            // let myData = new google.maps.LatLng(parseFloat(value.latitude), parseFloat(value.longitude));
                            let myData = [listData[index].rental.latitude, listData[index].rental.longitude]
    
                            // console.log("myData"+myData[1])
                            // console.log("myCenter"+myCenter)
                            let centerLocation = [localStorage.getItem("latitude"),localStorage.getItem("longitude")]
                            let check = checkCircleInMarker(centerLocation, myData, radius)
                            // console.log("check"+check)
    
                            if(check){
                                // console.log('ada')
                                // console.log(mark)
            
                                markers.push(mark);
            
            
                                let content = [
                                    '<div class="info_content">' +
                                        '<img src="http://127.0.0.1:8000/images/mobil/'+listData[index].foto_mobil+'" style="widht: 200px;height:100px" alt="">' +
                                    '<h2>'+listData[index].nama_mobil+'</h2>' +
                                    '<h4>'+listData[index].tipe_mobil+'</h4>'+
                                    '<p>'+listData[index].rental.alamat+'</p>' +
                                    `<a href="{{ url("`+listData[index].id+`") }}/detail" class="btn btn-sm btn-outline-primary">Detail</a>`+
                                    '</div>',
                                ]
                                infoWindowContent.push(content);
    
                                $('#gridhome').append(`
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            
                                            <div class="x_car_offer_img float_left">
                                                <img src="{{ asset('images/mobil/') }}`+listData[index].foto_mobil+`" class="img-fluid" style="max-height: 150px" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3 style="font-size: 16px">Rp. `+listData[index].harga_sewa_mobil+`</h3>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">`+listData[index].nama_mobil+`</a></h2>
                                                <p>`+listData[index].tipe_mobil+`</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li> <a href="#">`+listData[index].merk_mobil+`</a>
                                                    </li>
                                                    <li> <a href="#">`+listData[index].kapasitas_mobil+` Seat</a>
                                                    </li>
                                                    <li> <a href="#">`+listData[index].transmisi_mobil+`</a>
                                                    </li>
                                                    <li> <a href="#">`+listData[index].jenis_bbm+`</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul class="">
                                                    <li><a href="#">NEW</a>
                                                    </li>
                                                    <li><a href="{{ url('`+listData[index].id+`/detail') }}">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                `)
    
                            }else{
                                // console.log('tidak ada')
                            }

                        }

                    }
                })
                // Multiple markers location, latitude, and longitude


                // console.log(markers)
                // console.log(infoWindowContent+"infowindow")
            

                setTimeout(() => {
                    // Add multiple markers to map

                    // console.log(markers)
                    var infoWindow = new google.maps.InfoWindow(), marker, i;
                    
                    // Place each marker on the map  
                    for( i = 0; i < markers.length; i++ ) {
                        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                        bounds.extend(position);
                        marker = new google.maps.Marker({
                            position: position,
                            map: map,
                            title: markers[i][0]
                        });
                        
                        // Add info window to marker    
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infoWindow.setContent(infoWindowContent[i][0]);
                                infoWindow.open(map, marker);
                            }
                        })(marker, i));
                
                        // Center the map to fit all markers on the screen
                        map.fitBounds(bounds);
                    }
                
                    // Set zoom level
                    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                        this.setCenter(myCenter);
                        this.setZoom(14);
                        google.maps.event.removeListener(boundsListener);
                    });
                    
                }, 5000);
                    
                function checkCircleInMarker(markerPosition, circlePosition, radius) {
                    // console.log("circle"+circlePosition[1])
                    // console.log("marker"+markerPosition)
                    var km = radius/1000;
                    var kx = Math.cos(Math.PI * circlePosition[0] / 180) * 111;
                    var dx = Math.abs(circlePosition[1] - markerPosition[1]) * kx;
                    var dy = Math.abs(circlePosition[0] - markerPosition[0]) * 111;
                    // console.log("dy"+dy)
                    return Math.sqrt(dx * dx + dy * dy) <= km;
                }

            }
        
        
            window.initMap = initMap();
        })


        function initialMap() {
        var map;
        var radius = 1500
        var myCenter=new google.maps.LatLng(localStorage.getItem("latitude"),localStorage.getItem("longitude"));
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            center: myCenter,
            zoom: 14,
            mapTypeId: 'roadmap'
        };

        
        // Display a map on the web page
        map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
        
        const regionCircle = new google.maps.Circle({
                strokeColor: "#FF0000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#FF0000",
                fillOpacity: 0.19,
                map: map,
                center: myCenter,
                radius: radius,
                clickable: false
        });
        // map.setTilt(50);
        var marker = new google.maps.Marker({
            position: myCenter,
            map: map,
            title: 'Your Location',
            icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
        });
            
        var markers = [
            // ['Brooklyn Museum, NY', -0.0372848, 109.3142381],
            // ['Pontianak', -0.0362484, 109.4142181],
            // ['Prospect Park Zoo, NY', 40.66427511834109, -73.96512605857858],
            // ['Barclays Center, Brooklyn, NY', 40.68268267107631, -73.97546296241961]
        ];
                            
        // Info window content
        var infoWindowContent = [
            // ['<div class="info_content">' +
            // '<h2>Brooklyn Museum</h2>' +
            // '<h3>200 Eastern Pkwy, Brooklyn, NY 11238</h3>' +
            // '<p>The Brooklyn Museum is an art museum located in the New York City borough of Brooklyn.</p>' + 
            // '</div>'],
            // ['<div class="info_content">' +
            // '<h2>Central Library</h2>' +
            // '<h3>10 Grand Army Plaza, Brooklyn, NY 11238</h3>' +
            // '<p>The Central Library is the main branch of the Brooklyn Public Library, located at Flatbush Avenue.</p>' +
            // '</div>']
        
        ];

        $.ajax({
            url: "{{ url('api/cars') }}",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                // console.log(data);
                $.each(data.data, function(key, value) {
                    let mark = [
                        value.nama_mobil,
                        parseFloat(value.rental.latitude),
                        parseFloat(value.rental.longitude)
                    ];

                    // let myData = new google.maps.LatLng(parseFloat(value.latitude), parseFloat(value.longitude));
                    let myData = [value.rental.latitude, value.rental.longitude]

                    // console.log("myData"+myData[1])
                    // console.log("myCenter"+myCenter)
                    let centerLocation = [localStorage.getItem("latitude"),localStorage.getItem("longitude")]
                    let check = checkCircleInMarker(centerLocation, myData, radius)
                    // console.log("check"+check)

                    if(check){
                        // console.log('ada')
                        // console.log(mark)
    
                        markers.push(mark);
    
    
                        let content = [
                            '<div class="info_content">' +
                                '<img src="http://127.0.0.1:8000/images/mobil/'+value.foto_mobil+'" style="widht: 200px;height:100px" alt="">' +
                            '<h2>'+value.nama_mobil+'</h2>' +
                            '<h4>'+value.tipe_mobil+'</h4>'+
                            '<p>'+value.rental.alamat+'</p>' +
                            `<a href="{{ url("`+value.id+`") }}/detail" class="btn btn-sm btn-outline-primary">Detail</a>`+
                            '</div>',
                        ]
                        infoWindowContent.push(content);

                        // $('#gridhome').append(`
                        //     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        //         <div class="x_car_offer_main_boxes_wrapper float_left">
                        //             <div class="x_car_offer_img float_left">
                        //                 <img src="http://127.0.0.1:8000/images/mobil/1684997863fortuner.png" class="img-fluid" style="max-height: 150px;" alt="img" />
                        //             </div>
                        //             <div class="x_car_offer_price float_left">
                        //                 <div class="x_car_offer_price_inner">
                        //                     <h3 style="font-size: 20px;">Rp. 1500</h3>
                        //                     <p>
                        //                         <span>K</span> <br />
                        //                         / hari
                        //                     </p>
                        //                 </div>
                        //             </div>
                        //             <div class="x_car_offer_heading float_left">
                        //                 <h2><a href="#">`+value.nama_mobil+`</a></h2>
                        //                 <p>SUV</p>
                        //             </div>
                        //             <div class="x_car_offer_heading float_left">
                        //                 <ul>
                        //                     <li>
                        //                         <a href="#"><i class="fa fa-users"></i> &nbsp;`+value.kapasitas_mobil+`</a>
                        //                     </li>
                        //                     <li>
                        //                         <a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                        //                     </li>
                        //                     <li>
                        //                         <a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                        //                     </li>
                        //                     <li>
                        //                         <div class="nice-select" tabindex="0">
                        //                             <span class="current"><i class="fa fa-bars"></i></span>
                        //                             <ul class="list">
                        //                                 <li class="dpopy_li">
                        //                                     <a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                        //                                 </li>
                        //                                 <li class="dpopy_li">
                        //                                     <a href="#"><i class="fa fa-code-fork"></i>Manual Transmission</a>
                        //                                 </li>
                        //                                 <li class="dpopy_li">
                        //                                     <a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                        //                                 </li>
                        //                             </ul>
                        //                         </div>
                        //                     </li>
                        //                 </ul>
                        //             </div>
                        //             <div class="x_car_offer_bottom_btn float_left">
                        //                 <ul class="">
                        //                     <li><a href="#">NEW</a></li>
                        //                     <li><a href="http://127.0.0.1:8000/1/detail">Details</a></li>
                        //                 </ul>
                        //             </div>
                        //         </div>
                        //     </div>
                        // `)


                        $('#gridhome').append(`
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            
                                            <div class="x_car_offer_img float_left">
                                                <img src="{{ asset('images/mobil/') }}`+value.foto_mobil+`" class="img-fluid" style="max-height: 150px" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3 style="font-size: 16px">Rp. `+value.harga_sewa_mobil+`</h3>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">`+value.nama_mobil+`</a></h2>
                                                <p>`+value.tipe_mobil+`</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li> <a href="#">`+value.merk_mobil+`</a>
                                                    </li>
                                                    <li> <a href="#">`+value.kapasitas_mobil+` Seat</a>
                                                    </li>
                                                    <li> <a href="#">`+value.transmisi_mobil+`</a>
                                                    </li>
                                                    <li> <a href="#">`+value.jenis_bbm+`</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul class="">
                                                    <li><a href="#">NEW</a>
                                                    </li>
                                                    <li><a href="{{ url('`+value.id+`/detail') }}">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                `)
                    }else{
                        // console.log('tidak ada')
                    }


                });

            }
        })
        // Multiple markers location, latitude, and longitude


        // console.log(markers)
        // console.log(infoWindowContent+"infowindow")
    

        setTimeout(() => {
            // Add multiple markers to map

            // console.log(markers)
            var infoWindow = new google.maps.InfoWindow(), marker, i;
            
            // Place each marker on the map  
            for( i = 0; i < markers.length; i++ ) {
                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                bounds.extend(position);
                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: markers[i][0]
                });
                
                // Add info window to marker    
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infoWindow.setContent(infoWindowContent[i][0]);
                        infoWindow.open(map, marker);
                    }
                })(marker, i));
        
                // Center the map to fit all markers on the screen
                map.fitBounds(bounds);
            }
        
            // Set zoom level
            var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                this.setCenter(myCenter);
                this.setZoom(14);
                google.maps.event.removeListener(boundsListener);
            });
            
        }, 5000);
            
        function checkCircleInMarker(markerPosition, circlePosition, radius) {
            // console.log("circle"+circlePosition[1])
            // console.log("marker"+markerPosition)
            var km = radius/1000;
            var kx = Math.cos(Math.PI * circlePosition[0] / 180) * 111;
            var dx = Math.abs(circlePosition[1] - markerPosition[1]) * kx;
            var dy = Math.abs(circlePosition[0] - markerPosition[0]) * 111;
            // console.log("dy"+dy)
            return Math.sqrt(dx * dx + dy * dy) <= km;
        }

        // console.log(infoWindowContent);
    }


    window.initialMap = initialMap();
    </script>


    {{-- map --}}



@endsection