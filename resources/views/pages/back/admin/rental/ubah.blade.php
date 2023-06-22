@extends('layouts.base.back.main')

@section('content')
    <div class="col-xl-9 col-md-8">
   <div class="settings-widget profile-details">
      <div class="settings-menu p-0">
         <div class="profile-heading">
            <h3>Detail Profil</h3>
            <p>Kamu memiliki akses penuh untuk terkait data pribadi.</p>
         </div>
         <div class="course-group mb-0 d-flex">
            <div class="course-group-img d-flex align-items-center">
               <a href="https://dreamslms.dreamguystech.com/laravel/public/instructor-profile"><img src="http://127.0.0.1:8000/images/rental" alt="" class="img-fluid"></a>
               <div class="course-name">
                  <h4><a href="#">Avatar Kamu</a></h4>
                  <p>PNG atau JPG dan tidak lebih dari 800px.</p>
               </div>
            </div>
            <div class="profile-share d-flex align-items-center justify-content-center">
               <a href="javascript:;" class="btn btn-success"></a>
            </div>
         </div>
         <div class="checkout-form personal-address add-course-info">
            <div class="personal-info-head">
               <h4>Detail Pribadi</h4>
               <p>Ubah Informasi pribadi anda.</p>
            </div>
            <form action="http://127.0.0.1:8000/admin/rental/store" method="POST" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="tHc2tZPPSvFCnEa7rbiFPVdyTQ75AS5jx9PdiD9O">                <input type="hidden" name="latitude" id="latitude">
               <input type="hidden" name="longitude" id="longitude">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label class="form-control-label">Daftar Sebagai  </label>
                        <select name="tipe" class="form-control daftar">
                           <option value="" selected="" disabled="">Pilih</option>
                           <option value="rental" {{ $data->rental->tipe == 'rental' ? 'selected' : '' }}>Rental</option>
                           <option value="perorangan" {{ $data->rental->tipe == 'perorangan' ? 'selected' : '' }}>Perorangan</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row" id="kolom">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-control-label">Nama Rental</label>
                        <input type="text" class="form-control" name="nama_rental" value="{{ $data->rental->nama_rental }}" placeholder="Nama Rental ..">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-control-label">Nama Pemilik Rental</label>
                        <input type="text" class="form-control" name="nama_pemilik" value="{{ $data->rental->nama_pemilik }}" placeholder="Nama Pemilik Rental ..">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-control-label">Nomor Ijin Usaha</label>
                        <input type="text" class="form-control" name="no_ijin_usaha" value="{{ $data->rental->no_ijin_usaha }}" placeholder="Nomor Ijin Rental ..">
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
                        <input type="email" class="form-control" name="email" value="{{ $data->email }}" placeholder="Enter your email address">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-control-label">Password</label>
                        <div class="pass-group" id="passwordInput">
                           <input type="password" class="form-control pass-input" name="password" placeholder="Enter your password">
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
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-control-label">Alamat Rental</label>
                        <textarea placeholder="Enter Area name to populate Latitude and Longitude" rows="2" class="form-control" name="alamat_rental" onfocus="initializeAutocomplete()" id="locality" autocomplete=""></textarea>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                  </div>
               </div>
               <div class="d-grid">
                  <button class="btn btn-primary btn-start" type="submit">Buat Akun</button>
               </div>
            </form>
         </div>
         <br>
      </div>
   </div>
   <div class="settings-widget">
      <div class="settings-inner-blk p-0">
         <div class="comman-space pb-0">
            <div class="row ">
               <div class="col-md-6">
                  <div class="sell-course-head withdraw-history-head border-bottom-0">
                     <h3>List Pengemudi</h3>
                  </div>
               </div>
               <div class="col-md-6">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDbOpBHYiou-5YwdLAN6yLg554NwQ8ciSc"></script>

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
                // localStorage.setItem("latitude", lat);
                // localStorage.setItem("longitude", lng);

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
            Swal.fire('Lokasi tidak ditemukan', 'Mohon aktifkan pelacakan lokasi untuk menggunakan aplikasi', 'error').then(function() {
                // window.location.reload();
            });
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Alamat Rental</label>
                                        <textarea placeholder="Enter Area name to populate Latitude and Longitude" rows="2" class="form-control" name="alamat_rental" onFocus="initializeAutocomplete()" id="locality" autocomplete></textarea>
                                        {{-- <input type="text" class="form-control" name="alamat_rental" placeholder="Alamat Rental .."> --}}
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Alamat Rental Perorangan</label>
                                        <textarea placeholder="Enter Area name to populate Latitude and Longitude" rows="2" class="form-control" name="alamat_rental" onFocus="initializeAutocomplete()" id="locality" autocomplete></textarea>
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
@endsection