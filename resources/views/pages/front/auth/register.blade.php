<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamslms.dreamguystech.com/laravel/public/register by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Jan 2023 17:00:43 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>RENTALIN</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}assets/back/img/favicon.svg">

    <link rel="stylesheet" href="{{ asset('') }}assets/back/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('') }}assets/back/css/feather.css">

    <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">

    <link rel="stylesheet" href="{{ asset('') }}assets/back/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/back/css/owl.theme.default.min.css">

  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/slick/slick.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/slick/slick-theme.css">

    <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/feather/feather.css">

    <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/dropzone/dropzone.min.css">

    <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/aos/aos.css">

    <link rel="stylesheet" href="{{ asset('') }}assets/back/css/style.css">
    <style>
        .hide{
            display: none;
        }
    </style>
</head>

<body>

    <div class="main-wrapper log-wrap">
        <div class="row">

            <div class="col-md-6 login-bg">
                <div class="owl-carousel login-slide owl-theme">
                    <div class="welcome-login">
                        <div class="login-banner">
                            <img src="{{ asset('') }}assets/back/img/login-img.png" class="img-fluid" alt="Logo">
                        </div>
                        <div class="mentor-course text-center">
                            <h2>Selamat datang di <br>RentaLin  .</h2>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p> --}}
                        </div>
                    </div>
                    <div class="welcome-login">
                        <div class="login-banner">
                            <img src="{{ asset('') }}assets/back/img/login-img.png" class="img-fluid" alt="Logo">
                        </div>
                        <div class="mentor-course text-center">
                            <h2>Selamat datang di <br>RentaLin  .</h2>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p> --}}
                        </div>
                    </div>
                    <div class="welcome-login">
                        <div class="login-banner">
                            <img src="{{ asset('') }}assets/back/img/login-img.png" class="img-fluid" alt="Logo">
                        </div>
                        <div class="mentor-course text-center">
                            <h2>Selamat datang di <br>RentaLin  .</h2>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 login-wrap-bg">

                <div class="login-wrapper">
                    <div class="loginbox">
                        <div class="img-logo">
                            {{-- <img src="{{ asset('') }}assets/back/img/logo.svg" class="img-fluid" alt="Logo"> --}}
                                <span><h2 style="color: #ff875a">RentaLin</h2></span>

                            <div class="back-home">
                                <a href="{{ url('/') }}">Back to Home</a>
                            </div>
                        </div>
                        <h1>Daftar Sebagai Rental</h1>
                        <form action="{{ url('auth/register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                            <div class="row">
                                <div class="col-md-12" >
                                    <div class="form-group">
                                        <label class="form-control-label">Daftar Sebagai  </label>
                                        <select name="tipe" class="form-control daftar">
                                            <option value="" selected disabled>Pilih</option>
                                            <option value="rental">Rental</option>
                                            <option value="perorangan">Perorangan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="kolom">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="map" style="width: 100%;height: 300px"></div>
                                    {{-- <div class="form-group"> --}}
                                    {{-- </div> --}}
                                </div>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-start" type="submit">Buat Akun</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('') }}assets/back/plugins/jquery/jquery.min.js"></script>

    <script src="{{ asset('') }}assets/back/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('') }}assets/back/plugins/select2/js/select2.min.js"></script>

    <script src="{{ asset('') }}assets/back/js/ckeditor.js"></script>

    <script src="{{ asset('') }}assets/back/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>

    <script src="{{ asset('') }}assets/back/plugins/countup/jquery.waypoints.min.js"></script>
    <script src="{{ asset('') }}assets/back/plugins/countup/jquery.counterup.min.js"></script>

    <script src="{{ asset('') }}assets/back/js/owl.carousel.min.js"></script>

    <script src="{{ asset('') }}assets/back/plugins/slick/slick.js"></script>

    <script src="{{ asset('') }}assets/back/plugins/feather/feather.min.js"></script>

    <script src="{{ asset('') }}assets/back/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="{{ asset('') }}assets/back/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

    <script src="{{ asset('') }}assets/back/plugins/apexchart/apexcharts.min.js"></script>
    <script src="{{ asset('') }}assets/back/plugins/apexchart/chart-data.js"></script>

    <script src="{{ asset('') }}assets/back/js/circle-progress.min.js"></script>

    <script src="{{ asset('') }}assets/back/plugins/dropzone/dropzone.min.js"></script>

    <script src="{{ asset('') }}assets/back/js/validation.js"></script>

    <script src="{{ asset('') }}assets/back/plugins/aos/aos.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="{{ asset('') }}assets/back/js/script.js"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbOpBHYiou-5YwdLAN6yLg554NwQ8ciSc&callback=initMap" async></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyA_uzYqo6LL446KGB4FQWynZnzjvhXc6D8"></script>

    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkUOdZ5y7hMm0yrcCQoCvLwzdM6M8s5qk"></script> --}}


    <script>

        $(document).ready(function(){
            $('.latlng').on('click', function(){
                // Swal.fire({
                //     title: 'Error!',
                //     text: 'Do you want to continue',
                //     icon: 'error',
                //     confirmButtonText: 'Cool'
                // })
                getLocation()
                // initialize()
            })

        })

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
                initialize()
                
            });
        }
        function initialize() {
            var myLatlng = new google.maps.LatLng(localStorage.getItem('latitude'), localStorage.getItem('longitude'));

            var myOptions = {
                zoom: 17,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map"), myOptions);

            var marker = new google.maps.Marker({
                draggable: false,
                position: myLatlng,
                map: map,
                title: "Your location"
            });
        }
        window.addDomListener("load", initialize());

        // function getLocation(){
        //     MIN_ACCEPTABLE_ACCURACY = 20; // Minimum accuracy in metres that is acceptable as an "accurate" position
    
        //     if (!navigator.geolocation) {
        //         console.warn("Geolocation not supported by the browser");
        //     }
    
        //     navigator.geolocation.watchPosition(function(position) {
    
        //         if (position.accuracy > MIN_ACCEPTABLE_ACCURACY) {
        //             console.warn("Position is too inaccurate; accuracy=" + position.accuracy);
        //         } else {
        //             // Do something with the position
    
        //             // This is the current position of your user
        //             var latitude = position.coords.latitude;
        //             var longitude = position.coords.longitude;
    
        //             // console.log("Latitude: " + latitude + " Longitude: " + longitude)
        //             localStorage.setItem("latitude", latitude);
        //             localStorage.setItem("longitude", longitude);
        //         }
    
        //     }, function(error) {
        //         switch (error.code) {
        //             case error.PERMISSION_DENIED:
        //                 console.error("User denied the request for Geolocation.");
        //                 break;
        //             case error.POSITION_UNAVAILABLE:
        //                 console.error("Location information is unavailable.");
        //                 break;
        //             case error.TIMEOUT:
        //                 console.error("The request to get user location timed out.");
        //                 break;
        //             case error.UNKNOWN_ERROR:
        //                 console.error("An unknown error occurred.");
        //                 break;
        //         }
        //     }, {
        //         timeout: 30000, // Report error if no position update within 30 seconds
        //         maximumAge: 30000, // Use a cached position up to 30 seconds old
        //         enableHighAccuracy: true // Enabling high accuracy tells it to use GPS if it's available  
        //     });
        // }

    </script>
    <script>

        // $(document).ready(function(){
        //     Swal.fire(
        //         'Great !',
        //         '{{ session("success") }}',
        //         'success'
        //         )
        // })
        if (localStorage.getItem('latitude') == null || localStorage.getItem('longitude') == null) {
            // Swal.fire('Lokasi tidak ditemukan', 'Mohon aktifkan pelacakan lokasi untuk menggunakan aplikasi', 'error').then(function() {
            //     window.location.reload();
            // });
        } else {
            let latitude = localStorage.getItem('latitude');
            let longitude = localStorage.getItem('longitude');
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
            // Swal.fire(
            //     'Great !',
            //     '{{ session("success") }}',
            //     'success'
            //     )
        }
    </script>

    <script>
        $(document).ready(function() {

            $('.daftar').on('change', function(){
                // let daftar = $(this).val();
                var daftar = $('.daftar :selected').val();

                if(daftar == 'rental'){
                    $('#kolom').html(`
                        <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Nama Rental</label>
                                        <input type="text" class="form-control" name="nama_rental" placeholder="Nama Rental ..">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Nama Pemilik Rental</label>
                                        <input type="text" class="form-control" name="nama_pemilik" placeholder="Nama Pemilik Rental ..">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Nomor Ijin Usaha</label>
                                        <input type="text" class="form-control" name="no_ijin_usaha" placeholder="Nomor Ijin Rental ..">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Alamat Rental</label>
                                        <textarea placeholder="Enter Area name to populate Latitude and Longitude" class="form-control" name="alamat_rental" onFocus="initializeAutocomplete()" id="locality" autocomplete></textarea>
                                        {{-- <input type="text" class="form-control" name="alamat_rental" placeholder="Alamat Rental .."> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Foto Rental</label>
                                        <input type="file" class="form-control" name="foto_rental" placeholder="Alamat Rental ..">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter your email address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Password</label>
                                        <div class="pass-group" id="passwordInput">
                                            <input type="password" class="form-control pass-input" name="password"
                                                placeholder="Enter your password">
                                            <span class="toggle-password feather-eye"></span>
                                            <span class="pass-checked"><i class="feather-check"></i></span>
                                        </div>
                                        <div class="password-strength" id="passwordStrength">
                                            <span id="poor"></span>
                                            <span id="weak"></span>
                                            <span id="strong"></span>
                                            <span id="heavy"></span>
                                        </div>
                                        <div id="passwordInfo"></div>
                                    </div>
                                </div>
                    `)
                }else{
                    // console.log(daftar)
                    $('#kolom').html(`
                        <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Nama Rental Perorangan</label>
                                        <input type="text" class="form-control" name="nama_rental" placeholder="Nama Rental ..">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Nama Pemilik Rental Perorangan</label>
                                        <input type="text" class="form-control" name="nama_pemilik" placeholder="Nama Pemilik Rental ..">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Nomor BPKB</label>
                                        <input type="text" class="form-control" name="no_ijin_usaha" placeholder="Nomor Ijin Rental ..">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Alamat Rental Perorangan</label>
                                        <textarea placeholder="Enter Area name to populate Latitude and Longitude" class="form-control" name="alamat_rental" onFocus="initializeAutocomplete()" id="locality" autocomplete></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Foto Rental</label>
                                        <input type="file" class="form-control" name="foto_rental" placeholder="Alamat Rental ..">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter your email address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Password</label>
                                        <div class="pass-group" id="passwordInput">
                                            <input type="password" class="form-control pass-input" name="password"
                                                placeholder="Enter your password">
                                            <span class="toggle-password feather-eye"></span>
                                            <span class="pass-checked"><i class="feather-check"></i></span>
                                        </div>
                                        <div class="password-strength" id="passwordStrength">
                                            <span id="poor"></span>
                                            <span id="weak"></span>
                                            <span id="strong"></span>
                                            <span id="heavy"></span>
                                        </div>
                                        <div id="passwordInfo"></div>
                                    </div>
                                </div>
                    
                    `)
                }

            })
        // $('#example').DataTable();

        @if (session('success'))
        Swal.fire(
            'Great !',
            '{{ session("success") }}',
            'success'
        )
        // swal("Great !", "{{ session('success') }}", "success");
        @endif ()
        
        @if (session('errors'))
        Swal.fire(
            'Oh No !',
            '{{ session("errors") }}',
            'error'
        )
        // swal("Oh No !", "{{ session('errors') }}", "errors");
        @endif ()

        });
    </script>
</body>

<!-- Mirrored from dreamslms.dreamguystech.com/laravel/public/register by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Jan 2023 17:00:43 GMT -->

</html>