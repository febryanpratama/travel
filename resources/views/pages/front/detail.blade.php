@extends('layouts.base.front.main')

@section('content')
	<!-- btc tittle Wrapper Start -->
	<div class="btc_tittle_main_wrapper">
		<div class="btc_tittle_img_overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
					<div class="btc_tittle_left_heading">
						<h1>{{ $data->nama_mobil }}</h1>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
					<div class="btc_tittle_right_heading">
						<div class="btc_tittle_right_cont_wrapper">
							<ul>
								<li><a href="#">Home</a> <i class="fa fa-angle-right"></i>
								</li>
								<li><a href="#">Mobil</a> <i class="fa fa-angle-right"></i>
								</li>
								<li>{{ $data->nama_mobil }}</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- btc tittle Wrapper End -->
	<!-- x tittle num Wrapper Start -->
	<div class="x_title_num_mian_Wrapper float_left">
		<div class="container">
			<div class="x_title_inner_num_wrapper float_left">
				<div class="x_title_num_heading">
					<h3>Pilih Mobil</h3>
					<p>Selesaikan Langkah Anda</p>
				</div>
				<div class="x_title_num_heading_cont">
					<div class="x_title_num_main_box_wrapper">
						<div class="x_icon_num">
							<p>1</p>
						</div>
						<h5>Waktu & Tempat</h5>
					</div>
					<div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper2">
						<div class="x_icon_num x_icon_num2">
							<p>2</p>
						</div>
						<h5>Mobil</h5>
					</div>
					<div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3">
						<div class="x_icon_num x_icon_num3">
							<p>3</p>
						</div>
						<h5>Detail</h5>
					</div>
					<div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3">
						<div class="x_icon_num x_icon_num3">
							<p>4</p>
						</div>
						<h5>checkout</h5>
					</div>
					<div
						class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3 x_title_num_main_box_wrapper_last">
						<div class="x_icon_num x_icon_num3">
							<p>5</p>
						</div>
						<h5>Sukses!</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- x tittle num Wrapper End -->


    <div class="x_car_book_sider_main_Wrapper float_left">
		<div class="container">
			<div class="row">
				<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
					<div class="row">
						<div class="col-md-12">
							<div class="x_car_detail_main_wrapper float_left">
								<div class="lr_bc_slider_first_wrapper">
									<div class="owl-carousel owl-theme">
										<div class="item">
											<div class="lr_bc_slider_img_wrapper">
												<img src="{{ asset('images/mobil/'.$data->foto_mobil) }}" alt="fresh_food_img">
											</div>
										</div>
									</div>
								</div>
								<div class="x_car_detail_slider_bottom_cont float_left">
									<div class="x_car_detail_slider_bottom_cont_left" class="p-2">
										<h3>Nama Rental : <span>{{ $data->rental->nama_rental }} </span></h3>
										<h3>{{ $data->nama_mobil }} /<span>TIpe {{ $data->rental->tipe }} </span></h3>
										
										<span>Jarak / Waktu : </span><span id="rev"></span><br>
									{{-- {{ dd($data) }} --}}
										<span>buka - selesai : </span><span id="rev">{{ $data->rental->jam_mulai }} - {{ $data->rental->jam_selesai }}</span>
									</div>
									<div class="x_car_detail_slider_bottom_cont_right">
										{{-- <h3>Rp. {{ App\Helpers\format::formatRupiah($data->harga_sewa_mobil) }}</h3> --}}
										<h3>Rp. {{ number_format($data->harga_sewa_mobil) }}</h3>
										<p>
											{{-- <span>K</span> --}}
											<br>/ hari
										</p>
									</div>
									{{-- <div class="x_car_detail_slider_bottom_cont_center float_left">
										<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, rem a quis
											bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
											Dssed odio sit amet nibh vulputate cursus a sit amt mauris. Morbi accumsan
											ipsum velit.
											<br>
											<br>This is Photoshop's version of Lorem Ipsum. Proin gravida n vel velit
											auctor aliquet. Aenean sollicitudin, lorem quis bibendum tor. This is
											Photoshop's version of Lorem Ipsum.
										</p>
									</div> --}}
									<div
										class="x_car_offer_heading x_car_offer_heading_listing float_left x_car_offer_heading_inner_car_names x_car_offer_heading_inner_car_names2">
										<ul class="">
											<li> <a href="#"><i class="fa fa-users"></i> &nbsp;{{ $data->kapasitas_mobil }} Kursi</a>
											</li>
											<li> <a href="#"><i class="fa fa-code-fork"></i> &nbsp;{{ $data->transmisi_mobil }} Transmisi</a>
											</li>
											<li> <a href="#"><i class="fa fa-snowflake-o"></i>&nbsp;2 AC: Yes</a>
											</li>
										</ul>
									</div>
									{{-- <div class="x_avanticar_btn float_left">
										<ul>
											<li><a href="#">Book Now <i class="fa fa-arrow-right"></i></a>
											</li>
										</ul>
									</div> --}}
								</div>
								<div class="x_car_detail_slider_bottom_cont float_left">
									<div class="card">
										<div class="card-header">
											<div id='map'></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="x_car_book_left_siderbar_wrapper float_left">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="x_slider_form_main_wrapper x_slider_form_main_wrapper_ccb float_left">
									<div
										class="x_slider_form_heading_wrapper x_slider_form_heading_wrapper_carbooking float_left">
										<h3>Let’s find your perfect car</h3>
									</div>

									<form action="{{ url($data->id.'/detail') }}" method="POST">
										@csrf
										
										<div class="row">
											<div class="col-md-12">
												<div class="form-sec-header">
													<h3>Tanggal Mulai</h3>
													{{-- <label class="label-contr">Tanggal Mulai --}}
														<input type="date" name="tanggal_mulai" placeholder="Tue 16 Jan 2018"
															class="form-control ">
													{{-- </label> --}}
												</div>
											</div>
											<div class="col-md-12">
												<div class="x_slider_select">
													<select class="myselect">
														<option>09</option>
														<option>01</option>
														<option>02</option>
														<option>03</option>
													</select> <i class="fa fa-clock-o"></i>
												</div>
												<div class="x_slider_select x_slider_select2">
													<select class="myselect">
														<option>50</option>
														<option>40</option>
														<option>03</option>
														<option>02</option>
													</select>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-sec-header">
													<h3>Tanggal Selesai</h3>
													{{-- <label class="label-contr">Tanggal Selesai --}}
														<input type="date" name="tanggal_selesai" placeholder="Tue 16 Jan 2018"
															class="form-control ">
													{{-- </label> --}}
												</div>
											</div>
											<div class="col-md-12">
												<div class="x_slider_select">
													<select class="myselect">
														<option>09</option>
														<option>01</option>
														<option>02</option>
														<option>03</option>
													</select> <i class="fa fa-clock-o"></i>
												</div>
												<div class="x_slider_select x_slider_select2">
													<select class="myselect">
														<option>50</option>
														<option>40</option>
														<option>03</option>
														<option>02</option>
													</select>
												</div>
											</div>
											@if ($data->supir_id != null)
												<div class="col-md-12">
													<div class="x_slider_checkbox float_left">
														<input type="checkbox" name="is_driver" id="c2" name="cb">
														<label for="c2">Dengan Driver &nbsp;<i
																class="fa fa-question-circle"></i>
														</label>
													</div>
												</div>
											@endif
											<div class="col-md-12">
												<div class="x_slider_checout_right x_slider_checout_right_carbooking">
													<ul>
														<li>
															<button type="submit" class="btn btn-primary">
																search <i class="fa fa-arrow-right"></i>
															</button>
															{{-- <a href="#">search <i class="fa fa-arrow-right"></i></a> --}}
														</li>
													</ul>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				{{-- <div class="col-md-12">
                        <div class="row">
                            @foreach ($data->rating as $rating)
                            <div class="col-md-12">
                                <div class="blog_single_comment_wrapper">
                                    <div class="blog_comment3_wrapper">
                                        <div class="blog_comment1_img">
                                            <img src="{{ asset('images/pelanggan/'.$rating->user->foto) }}" alt="comment_img" class="img-responsive img-circle" />
                                        </div>
                                        <div class="blog_comment1_cont">
                                            <h3>
                                                {{ $rating->user->nama_lengkap }} <i class="fa fa-circle"></i> <span>{{ \Carbon\Carbon::parse($rating->created_at)->format('M d Y') }}</span> &nbsp;&nbsp;
                                                <i class="fa fa-star{{ (App\Helpers\Format::countRating($data->id) >= 1 ? '' : '-o') }} oo"></i>
                                                <i class="fa fa-star{{ (App\Helpers\Format::countRating($data->id) >= 1 ? '' : '-o') }} oo"></i>
                                                <i class="fa fa-star{{ (App\Helpers\Format::countRating($data->id) >= 1 ? '' : '-o') }} oo"></i>
                                                <i class="fa fa-star{{ (App\Helpers\Format::countRating($data->id) >= 1 ? '' : '-o') }} oo"></i>
                                                <i class="fa fa-star{{ (App\Helpers\Format::countRating($data->id) >= 1 ? '' : '-o') }} oo"></i>
                                            </h3>
                                            <p>{{ $rating->review }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            @endforeach
                        </div>
                    </div> --}}
			</div>
		</div>
	</div>
	{{-- {{ dd($latitude) }} --}}

@endsection
@section('script')
<script src="https://maps.googleapis.com/maps/api/js?sensor=true&key=AIzaSyDbOpBHYiou-5YwdLAN6yLg554NwQ8ciSc"></script>
{{-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap&key=AIzaSyDbOpBHYiou-5YwdLAN6yLg554NwQ8ciSc"></script> --}}

	<script>

		if("{{ $latitude }}" == null){
			 lat = localStorage.getItem('latitude');
			 long = localStorage.getItem('longitude');
		}else{
			 lat = "{{ $latitude }}";
			 long = "{{ $longitude }}";
			// pointA = new google.maps.LatLng("{{ $latitude }}","{{ $longitude }}")
		}



    $.ajax({
        url: '{{ url("api/getDistance") }}',
        type: 'POST',
        data: {
            lator: lat,
            longor: long,
            latde: {{ $data->rental->latitude }},
            longde: {{ $data->rental->longitude }},
            // _token: '{{ csrf_token() }}'
        },
        success: function (data) {
            $("#rev").append(data)
        }
    })
    function initMap() {

    // console.log(lat+' - '+long);

	// console.log(localStorage.getItem('latitude'))
	// console.log("{{ $latitude }}")
			if("{{ $latitude }}" == null){
				pointA = new google.maps.LatLng(localStorage.getItem('latitude'), localStorage.getItem('longitude'))
			}else{
				pointA = new google.maps.LatLng("{{ $latitude }}","{{ $longitude }}")
			}
	
            pointB = new google.maps.LatLng({{ $data->rental->latitude }},{{ $data->rental->longitude }}),
            myOptions = {
            zoom: 20,
            center: pointA
            },
            map = new google.maps.Map(document.getElementById('map'), myOptions),
            // Instantiate a directions service.
            directionsService = new google.maps.DirectionsService,
            directionsDisplay = new google.maps.DirectionsRenderer({
            map: map
            }),
            markerA = new google.maps.Marker({
            position: pointA,
            title: "You",
            label: "A",
            map: map
            }),
            markerB = new google.maps.Marker({
            position: pointB,
            title: "point B",
            label: "B",
            map: map
            });

        // get route from A to B
        calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);

        }



    function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
    directionsService.route({
        origin: pointA,
        destination: pointB,
        travelMode: google.maps.TravelMode.DRIVING
    }, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
        } else {
        window.alert('Directions request failed due to ' + status);
        }
    });
    }

    initMap();
</script>
@endsection