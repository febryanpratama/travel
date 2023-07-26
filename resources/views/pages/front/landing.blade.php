@extends('layouts.base.front.main')

<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/gh/tomickigrzegorz/autocomplete@1.8.3/dist/css/autocomplete.min.css"
/>
@section('content')
    <!-- x top header_wrapper Start -->
	
	<!-- x top header_wrapper End -->
	<!-- hs Navigation Start -->
	
	<!-- hs Navigation End -->
	<!-- hs Slider Start -->
	<div class="slider-area float_left">
		<div id="carousel-example-generic" class="carousel slide" data-interval="false" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active">
					<div class="carousel-captions caption-1">
						<div class="container">
							<div class="row">
								<div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12">
									<div class="content">
										<h2 data-animation="animated fadeInLeft">SEWA MOBIL MURAH DI<br>
											tujuan yang Anda inginkan</h2>
										<p data-animation="animated bounceInUp">Salah satu prioritas utama kami adalah menyesuaikan setiap paket yang kami tawarkan kepada
											<br>kebutuhan pelanggan yang tepat. Sewa Mobil Mulai dari 15k / Jam</span>
										</p>
										{{-- <div class="hs_effect_btn">
											<ul>
												<li data-animation="animated flipInX"><a href="#tentangkami">tentang kami<i
															class="fa fa-arrow-right"></i></a>
												</li>
												<li data-animation="animated flipInX"><a href="#kontak">kontak<i
															class="fa fa-arrow-right"></i></a>
												</li>
											</ul>
										</div> --}}
										<div class="clear"></div>
									</div>
                            </div>
								{{-- <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 d-none d-sm-none d-md-none  d-lg-block d-xl-block">
									<div class="content_tabs">
										<div class="row">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="x_slider_form_main_wrapper float_left"
													data-animation="animated fadeIn">
													<div class="x_slider_form_heading_wrapper float_left">
														<h3>Temukan mobil yang tepat untuk Anda</h3>
													</div>
													<form action="{{ url('getCar') }}" method="POST">
														@csrf
														<input type="hidden" name="latitude" value="" id="latitude">
														<input type="hidden" name="longitude" value="" id="longitude">
														<div class="row">
															<div class="col-md-12">
																<div class="x_slider_form_input_wrapper float_left">
																	<h3>Lokasi Penjemputan</h3>
																	<input type="text" autocomplete="off" id="search" class="full-width" placeholder="Pilih kota yang anda inginkan">
																</div>
															</div>
															
															<div class="col-md-12">
																<div class="form-sec-header">
																	<h3>Tanggal Penjemputan</h3>
																	<label class="cal-icon">Tanggal Penjemputan
																		<input type="text" placeholder="Tue 16 Jan 2018"
																			class="form-control datepicker">
																	</label>
																</div>
															</div>
															<div class="col-md-12 mt-5">
																<div class="x_slider_checkbox_bottom float_left">
																	<div class="x_slider_checout_left">
																		<ul>
																			<li><i
																					class="fa fa-check-circle"></i>&nbsp;&nbsp;24/7
																				Layanan Pelanggan</li>
																			<li><i
																					class="fa fa-check-circle"></i>&nbsp;&nbsp;Booking yang mudah</li>
																			<li><i
																					class="fa fa-check-circle"></i>&nbsp;&nbsp;tidak ada biaya tambahan</li>
																		</ul>
																	</div>
																	<div class="x_slider_checout_right">
																		<ul>
																			<li>
																				<button type="submit" class="btn btn-primary">Cari <i class="fa fa-arrow-right"></i></button>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div> --}}
							</div>
						</div>
					</div>
				</div>
				{{-- <div class="carousel-nevigation">
					<a class="prev" href="#carousel-example-generic" role="button" data-slide="prev"> <i
							class="fa fa-angle-left"></i>
					</a>
					<a class="next" href="#carousel-example-generic" role="button" data-slide="next"> <i
							class="fa fa-angle-right"></i>
					</a>
				</div> --}}
			</div>
		</div>
	</div>
	<!-- hs Slider End -->
	{{-- <div class="x_responsive_form_wrapper x_responsive_form_wrapper2 float_left d-block d-sm-block d-md-block  d-lg-none d-xl-none">
		<div class="container">
			<form action="{{ url('get-car') }}" method="POST">
                @csrf
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">

                <div class="x_slider_form_main_wrapper float_left">
                    <div class="x_slider_form_heading_wrapper float_left">
                        <h3>Let’s find your perfect car</h3>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="x_slider_form_input_wrapper float_left">
                                <h3>Pick-up Location</h3>
                                
                                <input type="text" autocomplete="off" id="search" class="full-width" placeholder="enter the city name"/>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-sec-header">
                                <h3>Pick-up Date</h3>
                                <label class="cal-icon">Pick-up Date
                                <input type="text" placeholder="Tue 16 Jan 2018" class="form-control datepicker">
                                </label>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-sec-header">
                                <h3>Drop-Off Date</h3>
                                <label class="cal-icon">Pick-up Date
                                <input type="text" placeholder="Tue 16 Jan 2018" class="form-control datepicker">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <div class="x_slider_checkbox_bottom float_left">
                                <div class="x_slider_checout_left">
                                    <ul>
                                    <li><i class="fa fa-check-circle"></i>&nbsp;&nbsp;24/7 Phone Support</li>
                                    <li><i class="fa fa-check-circle"></i>&nbsp;&nbsp;No Credit Card Fees</li>
                                    <li><i class="fa fa-check-circle"></i>&nbsp;&nbsp;No Amendment Fees</li>
                                    </ul>
                                </div>
                                <div class="x_slider_checout_right d-flex justify-content-end">
                                    <button type="submit" class="btn btn-outline-primary">
                                        search <i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
		</div>
	</div> --}}
	<!-- xs Slider bottom title Start -->
    <hr>
    <div class="x_offer_car_main_wrapper float_left padding_tb_100" style="background-color:#efefef">
        <div class="row">
            <div class="col-md-6">
                <div class="container">
                    <div id="mapCanvas" style="width: 100%;height: 500px">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="x_slider_form_main_wrapper float_left"
                            data-animation="animated fadeIn">
                            <div class="x_slider_form_heading_wrapper float_left">
                                <h3>Temukan mobil yang tepat untuk Anda</h3>
                            </div>
                            {{-- <form action="{{ url('getCar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="latitude" value="" id="latitude">
                                <input type="hidden" name="longitude" value="" id="longitude">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="x_slider_form_input_wrapper float_left">
                                            <h3>Lokasi Penjemputan</h3>
                                            <textarea placeholder="Pilih tempat yang anda inginkan" class="form-control" name="alamat" onFocus="initializeAutocomplete()" id="locality" autocomplete></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <div class="x_slider_checkbox_bottom float_left">
                                            <div class="x_slider_checout_left">
                                                <ul>
                                                    <li><i
                                                            class="fa fa-check-circle"></i>&nbsp;&nbsp;24/7
                                                        Layanan Pelanggan</li>
                                                    <li><i
                                                            class="fa fa-check-circle"></i>&nbsp;&nbsp;Booking yang mudah</li>
                                                    <li><i
                                                            class="fa fa-check-circle"></i>&nbsp;&nbsp;tidak ada biaya tambahan</li>
                                                </ul>
                                            </div>
                                            <div class="x_slider_checout_right">
                                                <ul>
                                                    <li>
                                                        <button type="submit" class="btn btn-primary">Cari <i class="fa fa-arrow-right"></i></button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form> --}}
                            <form action="#" method="POST">
                                @csrf
                                {{-- <input type="hidden" name="latitude" value="" id="latitude">
                                <input type="hidden" name="longitude" value="" id="longitude"> --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="x_slider_form_input_wrapper float_left">
                                            <h3>Lokasi Rental</h3>
                                            <textarea placeholder="Pilih tempat yang anda inginkan" class="form-control" name="alamat" onFocus="initializeAutocomplete()" id="locality" autocomplete></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <div class="x_slider_checkbox_bottom float_left">
                                            <div class="x_slider_checout_left">
                                                <ul>
                                                    <li><i
                                                            class="fa fa-check-circle"></i>&nbsp;&nbsp;24/7
                                                        Layanan Pelanggan</li>
                                                    <li><i
                                                            class="fa fa-check-circle"></i>&nbsp;&nbsp;Booking yang mudah</li>
                                                    <li><i
                                                            class="fa fa-check-circle"></i>&nbsp;&nbsp;tidak ada biaya tambahan</li>
                                                </ul>
                                            </div>
                                            <div class="x_slider_checout_right">
                                                <ul>
                                                    <li>
                                                        <button type="button" id="carirental" class="btn btn-primary">Cari <i class="fa fa-arrow-right"></i></button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
	<!-- xs offer car tabs Start -->
	<div class="x_offer_car_main_wrapper float_left padding_tb_100">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="x_offer_car_heading_wrapper float_left">
						<h4>APA YANG KAMI TAWARKAN</h4>
						<h3>Pilih Mobil Anda</h3>
						{{-- <p>Morbi mollis vestibulum sollicitudin. Nunc in eros a justo facilisis rutrum. Aenean id
							ullamcorper libero
							<br>Vestibulum imperdiet nibh vel magna lacinia commodo ultricies,
						</p> --}}
					</div>
				</div>
				<div class="col-md-12 d-flex">
					{{-- <div class="x_offer_tabs_wrapper">
						<ul class="nav nav-tabs">
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home"> Best Offers</a>
							</li>
							<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#menu1"> ECONOMIC
									CARS</a>
							</li>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#menu2"> premium cars</a>
							</li>
						</ul>
					</div> --}}
					<div class="tab-content">
						<div id="home" class="tab-pane active">
							<div class="row justify-content-center">
                                @foreach ($data as $item)
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            {{-- <div class="x_car_offer_starts float_left">
                                                <i class="fa fa-star{{ (App\Helpers\Format::sumRating($item->id) >= 1 ? '' : '-o') }}"></i>
                                                <i class="fa fa-star{{ (App\Helpers\Format::sumRating($item->id) >= 2 ? '' : '-o') }}"></i>
                                                <i class="fa fa-star{{ (App\Helpers\Format::sumRating($item->id) >= 3 ? '' : '-o') }}"></i>
                                                <i class="fa fa-star{{ (App\Helpers\Format::sumRating($item->id) >= 4 ? '' : '-o') }}"></i>
                                                <i class="fa fa-star{{ (App\Helpers\Format::sumRating($item->id) >= 5 ? '' : '-o') }}"></i>
                                                <i style="color: black"> / {{ App\Helpers\Format::sumRating($item->id)}}</i>
                                            </div> --}}
                                            <div class="x_car_offer_img float_left">
                                                <img src="{{ asset('images/mobil/'.$item->foto_mobil) }}" class="img-fluid" style="max-height: 150px" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    {{-- <h6><i class="fa fa-tag"></i> &nbsp;15% off Deal</h6> --}}
                                                    {{-- <h3 style="font-size: 20px">Rp. {{ App\helpers\Format::formatRupiah($item->harga_sewa_mobil) }}</h3> --}}
                                                    <h3 style="font-size: 16px">Rp. {{ number_format($item->harga_sewa_mobil) }}</h3>
                                                    {{-- <h3>Hari</h3> --}}
                                                    {{-- <p><span>K</span>
                                                        <br>/ hari
                                                    </p> --}}
                                                </div>
                                            </div>
                                            {{-- <h3>Hari</h3> --}}
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">{{ $item->nama_mobil }}</a></h2>
                                                <p>{{ $item->tipe_mobil }}</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li> <a href="#">{{ $item->merk_mobil }}</a>
                                                    </li>
                                                    <li> <a href="#">{{ $item->kapasitas_mobil }} Seat</a>
                                                    </li>
                                                    <li> <a href="#">{{ $item->transmisi_mobil }}</a>
                                                    </li>
                                                    <li> <a href="#">{{ $item->jenis_bbm }}</a>
                                                    </li>
                                                    {{-- <li>
                                                        <div class="nice-select" tabindex="0"> <span class="current"><i
                                                                    class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i
                                                                            class="fa fa-snowflake-o"></i> Air
                                                                        Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i
                                                                            class="fa fa-code-fork"></i>{{ $item->transmisi_mobil }} Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i
                                                                            class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li> --}}
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul class="">
                                                    <li><a href="#">NEW</a>
                                                    </li>
                                                    <li><a href="{{ url($item->id.'/detail') }}">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <hr>
	<div class="x_slider_bottom_title_main_wrapper" id="tentangkami">

		{{-- <div class="x_slider_bottom_box_wrapper"> <i class="flaticon-magnifying-glass"></i>
			<h3><a href="#">24 / 7 Layanan Pelanggan</a></h3>
			<p>Proin gravida nibh vel velit auctor
				<br>aliquet. Aenean sollicitudin, lorem
				<br>quis bibendum auctor.
			</p>
		</div> --}}
		<div class="x_slider_bottom_box_wrapper"> <i class="flaticon-world"></i>
			<h3><a href="#">Mudah ditemukan</a></h3>
			<p>Selamat datang di MarketPlace Rental Mobil! Kami menyediakan berbagai pilihan mobil sewaan untuk memenuhi kebutuhan perjalanan Anda. Berikut adalah beberapa kata kunci yang mudah ditemukan untuk membantu Anda menemukan mobil yang tepat:

            <br><br>1.Rental Mobil: Temukan berbagai opsi rental mobil yang tersedia.
            <br>2. Mobil Sewa: Cari mobil yang dapat Anda sewa sesuai dengan keinginan dan kebutuhan Anda.
            <br>3. Rental Mobil di Daerah Sekitar
            <br>4. Pencarian Rental Mobil Berbasis Lokasi</p>
		</div>
		<div class="x_slider_bottom_box_wrapper"> <i class="flaticon-checklist"></i>
			<h3><a href="#">Kapan saja untuk reservasi</a></h3>
			<p>Tentu, berikut adalah beberapa kata-kata yang dapat digunakan untuk menyoroti ketersediaan reservasi kapan saja pada MarketPlace rental mobil:

            <br><br>1. Reservasi Kapan Saja
            <br>2. Pemesanan Setiap Saat
            <br>3. Booking Fleksibel
            <br>4. Reservasi Mobil Fleksibel
			</p>
		</div>
		{{-- <div class="x_slider_bottom_box_wrapper"> <i class="flaticon-car-trip"></i>
			<h3><a href="#">Rental Mobil</a></h3>
			<p>Proin gravida nibh vel velit auctor
				<br>aliquet. Aenean sollicitudin, lorem
				<br>quis bibendum auctor.
			</p>
		</div> --}}
	</div>
	<!-- xs Slider bottom title End -->
    
    
    {{-- {{ dd(Auth::user()) }}}} --}}
    
	<!-- xs offer car tabs End -->
@endsection

@section('script')
{{-- <script src="https://cdn.jsdelivr.net/gh/tomickigrzegorz/autocomplete@1.8.3/dist/js/autocomplete.min.js"></script> --}}
{{-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyDbOpBHYiou-5YwdLAN6yLg554NwQ8ciSc&callback=initMap" type="text/javascript"></script>  --}}
{{-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false&key=AIzaSyDbOpBHYiou-5YwdLAN6yLg554NwQ8ciSc"></script> --}}
{{-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbOpBHYiou-5YwdLAN6yLg554NwQ8ciSc&callback=initMap&libraries=geometry&v=weekly" defer></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyA_uzYqo6LL446KGB4FQWynZnzjvhXc6D8&callback=initMap"></script>

{{-- <script src="https://maps.googleapis.com/maps/api/js?callback=initMap&key=AIzaSyDbOpBHYiou-5YwdLAN6yLg554NwQ8ciSc" defer></script> --}}
{{-- <script type="text/javascript"> 
    /*
 * declare map as a global variable
 */
    var map;
    var myMarkers = [];
    /*
    * create a initialize function
    */
    function initialize() {
        var myCenter=new google.maps.LatLng(localStorage.getItem("latitude"),localStorage.getItem("longitude"));
        var mapOptions = {
            center: myCenter,
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        };
        
        map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
        SetMarkers();
    }
    google.maps.event.addDomListener(window, 'load', initialize);


    function SetMarkers() {
        var geocoder = new google.maps.Geocoder();
        var myData = [];
        
        // here you can change this JSON for a call to your database 
        myData = [
            {lat: "-0.0372848" , lng: "109.3142381", name: "London",  address: "London, Reino Unido"},
            {lat: "-0.0372854" , lng: "109.3142581", name: "Oxford",  address: "Oxford, Reino Unido"},
            {lat: "52.137237" , lng: "-0.456837", name: "Bedford", address: "Bedford, Reino Unido"},
        ];
        
        for(i = 0; i < myData.length; i++) {
            geocoder.geocode({ 'address': myData[i].address }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {                
                    myMarkers[i] = new google.maps.Marker({
                        position: results[0].geometry.location,
                        map: map
                    });
                } else {
                    console.log("We can't found the address, GoogleMaps say..." + status);
                }
            });
        }
    }


</script>  --}}
<script>
        function initializeAutocomplete(){
            var input = document.getElementById('locality');
            // var options = {
            //   types: ['(regions)'],
            //   componentRestrictions: {country: "IN"}
            // };
            var options = {}

            console.log(input)

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
</script>

<script>
// Initialize and add the map
$('#carirental').on('click',function(){
    $('#gridhome').html('')
        // window.initMap = initMap();/

    function initMap(){
        var map;
        var radius = 3500
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

        // $.ajax({
        //     url: "{{ url('api/cars') }}",
        //     type: "GET",
        //     dataType: "JSON",
        //     success: function(data) {
        //         // console.log(data.data.length);
        //         let listData = data.data;
        //         console.log(listData[0]);
                
        //         for (let index = 0; index < listData.length; index++) {

        //             let mark = [
        //                 listData[index].nama_mobil,
        //                 parseFloat(listData[index].rental.latitude),
        //                 parseFloat(listData[index].rental.longitude)
        //             ];

        //             // let myData = new google.maps.LatLng(parseFloat(value.latitude), parseFloat(value.longitude));
        //             let myData = [listData[index].rental.latitude, listData[index].rental.longitude]

        //             // console.log("myData"+myData[1])
        //             // console.log("myCenter"+myCenter)
        //             let centerLocation = [localStorage.getItem("latitude"),localStorage.getItem("longitude")]
        //             let check = checkCircleInMarker(centerLocation, myData, radius)
        //             // console.log("check"+check)

        //             if(check){
        //                 // console.log('ada')
        //                 // console.log(mark)
    
        //                 markers.push(mark);
    
    
        //                 let content = [
        //                     '<div class="info_content">' +
        //                         '<img src="http://127.0.0.1:8000/images/mobil/'+listData[index].foto_mobil+'" style="widht: 200px;height:100px" alt="">' +
        //                     '<h2>'+listData[index].nama_mobil+'</h2>' +
        //                     '<h4>'+listData[index].tipe_mobil+'</h4>'+
        //                     '<p>'+listData[index].rental.alamat+'</p>' +
        //                     `<a href="{{ url("`+listData[index].id+`") }}/detail" class="btn btn-sm btn-outline-primary">Detail</a>`+
        //                     '</div>',
        //                 ]
        //                 infoWindowContent.push(content);

        //                 $('#gridhome').append(`
        //                     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        //                         <div class="x_car_offer_main_boxes_wrapper float_left">
                                    
        //                             <div class="x_car_offer_img float_left">
        //                                 <img src="{{ asset('images/mobil/') }}/`+listData[index].foto_mobil+`" class="img-fluid" style="max-height: 150px" alt="img">
        //                             </div>
        //                             <div class="x_car_offer_price float_left">
        //                                 <div class="x_car_offer_price_inner">
        //                                     <h3 style="font-size: 16px">Rp. `+listData[index].harga_sewa_mobil+`</h3>
        //                                 </div>
        //                             </div>
        //                             <div class="x_car_offer_heading float_left">
        //                                 <h2><a href="#">`+listData[index].nama_mobil+`</a></h2>
        //                                 <p>`+listData[index].tipe_mobil+`</p>
        //                             </div>
        //                             <div class="x_car_offer_heading float_left">
        //                                 <ul>
        //                                     <li> <a href="#">`+listData[index].merk_mobil+`</a>
        //                                     </li>
        //                                     <li> <a href="#">`+listData[index].kapasitas_mobil+` Seat</a>
        //                                     </li>
        //                                     <li> <a href="#">`+listData[index].transmisi_mobil+`</a>
        //                                     </li>
        //                                     <li> <a href="#">`+listData[index].jenis_bbm+`</a>
        //                                     </li>
        //                                 </ul>
        //                             </div>
        //                             <div class="x_car_offer_bottom_btn float_left">
        //                                 <ul class="">
        //                                     <li><a href="#">NEW</a>
        //                                     </li>
        //                                     <li><a href="{{ url('`+listData[index].id+`/detail') }}">Details</a>
        //                                     </li>
        //                                 </ul>
        //                             </div>
        //                         </div>
        //                     </div>
        //                 `)

        //             }else{
        //                 // console.log('tidak ada')
        //             }

        //         }

        //     }
        // })

        $.ajax({
            url: "{{ url('api/rent') }}",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                $.each(data.data, function(key, value) {
                    let mark = [
                        value.nama_rental,
                        parseFloat(value.latitude),
                        parseFloat(value.longitude)
                    ];

                    // let myData = new google.maps.LatLng(parseFloat(value.latitude), parseFloat(value.longitude));
                    let myData = [value.latitude, value.longitude]

                    // console.log("myData"+myData[1])
                    // console.log("myCenter"+myCenter)
                    
                        let centerLocation = [localStorage.getItem("latitude"),localStorage.getItem("longitude")]
                        
                    
                    let check = checkCircleInMarker(centerLocation, myData, radius)

                    console.log("check false"+check)

                    if(check){
                        console.log('ada')
                        // console.log(mark)
    
                        markers.push(mark);
    
    
                        let content = [
                            '<div class="info_content">' +
                                '<img src="http://127.0.0.1:8000/images/rental/'+value.foto_rental+'" style="widht: 200px;height:100px" alt="">' +
                            '<h2>'+value.nama_rental+'</h2>' +
                            '<h4>'+value.tipe+'</h4>'+
                            '<p>'+value.alamat+'</p>' +
                            '<a href="{{ url('rental/detail') }}/'+value.id+'">Detail</a>'+
                            '</div>',
                        ]
                        infoWindowContent.push(content);

                    }else{
                        console.log('tidak ada')
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
            var km = radius/3500;
            var kx = Math.cos(Math.PI * circlePosition[0] / 180) * 111;
            var dx = Math.abs(circlePosition[1] - markerPosition[1]) * kx;
            var dy = Math.abs(circlePosition[0] - markerPosition[0]) * 111;
            // console.log("dy"+dy)
            return Math.sqrt(dx * dx + dy * dy) <= km;
        }

    }


    window.initMap = initMap();
})
    function initMap() {
        var map;
        var radius = 3500

        if ("{{ $latitude }}" ==  null) {
            var myCenter=new google.maps.LatLng(localStorage.getItem("latitude"),localStorage.getItem("longitude"));
        }else{
            var myCenter=new google.maps.LatLng("{{ $latitude }}", "{{ $longitude }}");
        }
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
            url: "{{ url('api/rent') }}",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                // console.log(data);
                $.each(data.data, function(key, value) {
                    let mark = [
                        value.nama_rental,
                        parseFloat(value.latitude),
                        parseFloat(value.longitude)
                    ];

                    console.log("mark"+mark)
                    // let myData = new google.maps.LatLng(parseFloat(value.latitude), parseFloat(value.longitude));
                    let myData = [value.latitude, value.longitude]

                    // console.log("myData"+myData[1])
                    // console.log("myCenter"+myCenter)
                    if("{{ $latitude }}" == null){
                        let centerLocation = [localStorage.getItem("latitude"),localStorage.getItem("longitude")]
                        let check = checkCircleInMarker(centerLocation, myData, radius)
                    console.log("check test"+check)

                    if(check){
                        console.log('ada')
                        // console.log(mark)
    
                        markers.push(mark);
    
    
                        let content = [
                            '<div class="info_content">' +
                                '<img src="http://127.0.0.1:8000/images/rental/'+value.foto_rental+'" style="widht: 200px;height:100px" alt="">' +
                            '<h2>'+value.nama_rental+'</h2>' +
                            '<h4>'+value.tipe+'</h4>'+
                            '<p>'+value.alamat+'</p>' +
                            '<a href="{{ url('rental/detail') }}/'+value.id+'">Detail</a>'+
                            '</div>',
                        ]
                        infoWindowContent.push(content);

                    }else{
                        console.log('tidak ada')
                    }
                    }else{
                        let centerLocation = ["{{ $latitude }}", "{{ $longitude }}"]
                        let check = checkCircleInMarker(centerLocation, myData, radius)
                    console.log("check"+check)

                    if(check){
                        console.log('ada')
                        // console.log(mark)
    
                        markers.push(mark);
    
    
                        let content = [
                            '<div class="info_content">' +
                                '<img src="http://127.0.0.1:8000/images/rental/'+value.foto_rental+'" style="widht: 200px;height:100px" alt="">' +
                            '<h2>'+value.nama_rental+'</h2>' +
                            '<h4>'+value.tipe+'</h4>'+
                            '<p>'+value.alamat+'</p>' +
                            '<a href="{{ url('rental/detail') }}/'+value.id+'">Detail</a>'+
                            '</div>',
                        ]
                        infoWindowContent.push(content);

                    }else{
                        console.log('tidak ada')
                    }
                    }
                    


                });

            }
        })
        // Multiple markers location, latitude, and longitude


        // console.log(markers)
        console.log(infoWindowContent)
    

        setTimeout(() => {
            // Add multiple markers to map

            console.log(markers)
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
            console.log("circle"+circlePosition[1])
            console.log("marker"+markerPosition)
            var km = radius/3500;
            var kx = Math.cos(Math.PI * circlePosition[0] / 180) * 111;
            var dx = Math.abs(circlePosition[1] - markerPosition[1]) * kx;
            var dy = Math.abs(circlePosition[0] - markerPosition[0]) * 111;
            // console.log("dy"+dy)
            return Math.sqrt(dx * dx + dy * dy) <= km;
        }
    }


    // window.initMap = initMap;
    window.initMap = initMap();

</script>



@endsection