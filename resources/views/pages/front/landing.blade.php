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
											<br>kebutuhan pelanggan yang tepat. Sewa Mobil / Sepeda / Jeep Mulai dari 15k / Jam</span>
										</p>
										<div class="hs_effect_btn">
											<ul>
												<li data-animation="animated flipInX"><a href="#">tentang kami<i
															class="fa fa-arrow-right"></i></a>
												</li>
												<li data-animation="animated flipInX"><a href="#">kontak<i
															class="fa fa-arrow-right"></i></a>
												</li>
											</ul>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div
									class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 d-none d-sm-none d-md-none  d-lg-block d-xl-block">
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
																				{{-- <a href="#">search <i
																						class="fa fa-arrow-right"></i></a> --}}
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
						</div>
					</div>
				</div>
				<div class="carousel-nevigation">
					<a class="prev" href="#carousel-example-generic" role="button" data-slide="prev"> <i
							class="fa fa-angle-left"></i>
					</a>
					<a class="next" href="#carousel-example-generic" role="button" data-slide="next"> <i
							class="fa fa-angle-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- hs Slider End -->
	<div
		class="x_responsive_form_wrapper x_responsive_form_wrapper2 float_left d-block d-sm-block d-md-block  d-lg-none d-xl-none">
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
                                    {{-- <ul>
                                        <li>
                                            <a href="#">search <i class="fa fa-arrow-right"></i></a>
                                        </li>
                                    </ul> --}}
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
	</div>
	<!-- xs Slider bottom title Start -->
	<div class="x_slider_bottom_title_main_wrapper">
		<div class="x_slider_bottom_box_wrapper"> <i class="flaticon-magnifying-glass"></i>
			<h3><a href="#">24 / 7 Layanan Pelanggan</a></h3>
			<p>Proin gravida nibh vel velit auctor
				<br>aliquet. Aenean sollicitudin, lorem
				<br>quis bibendum auctor.
			</p>
		</div>
		<div class="x_slider_bottom_box_wrapper"> <i class="flaticon-world"></i>
			<h3><a href="#">Mudah ditemukan</a></h3>
			<p>Proin gravida nibh vel velit auctor
				<br>aliquet. Aenean sollicitudin, lorem
				<br>quis bibendum auctor.
			</p>
		</div>
		<div class="x_slider_bottom_box_wrapper"> <i class="flaticon-checklist"></i>
			<h3><a href="#">Kapan saja untuk reservasi</a></h3>
			<p>Proin gravida nibh vel velit auctor
				<br>aliquet. Aenean sollicitudin, lorem
				<br>quis bibendum auctor.
			</p>
		</div>
		<div class="x_slider_bottom_box_wrapper"> <i class="flaticon-car-trip"></i>
			<h3><a href="#">Rental Mobil</a></h3>
			<p>Proin gravida nibh vel velit auctor
				<br>aliquet. Aenean sollicitudin, lorem
				<br>quis bibendum auctor.
			</p>
		</div>
	</div>
	<!-- xs Slider bottom title End -->
	<!-- xs offer car tabs Start -->
	<div class="x_offer_car_main_wrapper float_left padding_tb_100">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="x_offer_car_heading_wrapper float_left">
						<h4>APA YANG KAMI TAWARKAN</h4>
						<h3>Pilih Mobil Anda</h3>
						<p>Morbi mollis vestibulum sollicitudin. Nunc in eros a justo facilisis rutrum. Aenean id
							ullamcorper libero
							<br>Vestibulum imperdiet nibh vel magna lacinia commodo ultricies,
						</p>
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
                                            <div class="x_car_offer_starts float_left"> <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="x_car_offer_img float_left">
                                                <img src="{{ asset('images/mobil/'.$item->foto_mobil) }}" class="img-fluid" style="max-height: 150px" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    {{-- <h6><i class="fa fa-tag"></i> &nbsp;15% off Deal</h6> --}}
                                                    <h3 style="font-size: 20px">Rp. {{ App\helpers\Format::formatRupiah($item->harga_sewa_mobil) }}</h3>
                                                    <p><span>K</span>
                                                        <br>/ hari
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">{{ $item->nama_mobil }}</a></h2>
                                                <p>{{ $item->tipe_mobil }}</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li> <a href="#"><i class="fa fa-users"></i> &nbsp;{{ $item->kapasitas_mobil }}</a>
                                                    </li>
                                                    <li> <a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li> <a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
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
                                                    </li>
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
	<!-- xs offer car tabs End -->
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/gh/tomickigrzegorz/autocomplete@1.8.3/dist/js/autocomplete.min.js"></script>

<script>
        $(document).ready(function(){

            // minimal configure
            new Autocomplete("search", {
            // default selects the first item in
            // the list of results
            selectFirst: true,

            // The number of characters entered should start searching
            howManyCharacters: 2,

            // onSearch
            onSearch: ({ currentValue }) => {
                // You can also use static files
                // const api = '../static/search.json'
                const api = `https://nominatim.openstreetmap.org/search?format=geojson&limit=5&city=${encodeURI(
                    currentValue
                )}`;

                /**
                 * jquery
                 */
                // return $.ajax({
                //     url: api,
                //     method: 'GET',
                //   })
                //   .done(function (data) {
                //     return data
                //   })
                //   .fail(function (xhr) {
                //     console.error(xhr);
                //   });

                // OR -------------------------------

                /**
                 * axios
                 * If you want to use axios you have to add the
                 * axios library to head html
                 * https://cdnjs.com/libraries/axios
                 */
                // return axios.get(api)
                //   .then((response) => {
                //     return response.data;
                //   })
                //   .catch(error => {
                //     console.log(error);
                //   });

                // OR -------------------------------

                /**
                 * Promise
                 */
                return new Promise((resolve) => {
                fetch(api)
                    .then((response) => response.json())
                    .then((data) => {
                    resolve(data.features);
                    })
                    .catch((error) => {
                    console.error(error);
                    });
                });
            },
            // nominatim GeoJSON format parse this part turns json into the list of
            // records that appears when you type.
            onResults: ({ currentValue, matches, template }) => {
                const regex = new RegExp(currentValue, "gi");

                // if the result returns 0 we
                // show the no results element
                return matches === 0
                ? template
                : matches
                    .map((element) => {
                        return `
                    <li class="loupe">
                        <p>
                        ${element.properties.display_name.replace(
                            regex,
                            (str) => `<b>${str}</b>`
                        )}
                        </p>
                    </li> `;
                    })
                    .join("");
            },

            // we add an action to enter or click
            onSubmit: ({ object }) => {
                // remove all layers from the map
                // console.log(object.geometry.coordinates)

                $('#latitude').val(object.geometry.coordinates[1])
                $('#longitude').val(object.geometry.coordinates[0])
                map.eachLayer(function (layer) {
                    if (!!layer.toGeoJSON) {
                    map.removeLayer(layer);
                }
                });
                
                const { display_name } = object.properties;
                const [lng, lat] = object.geometry.coordinates;
                // console.log(lat+" ------- "+lng)

                const marker = L.marker([lat, lng], {
                title: display_name,
                });

                marker.addTo(map).bindPopup(display_name);

                map.setView([lat, lng], 8);
            },

            // get index and data from li element after
            // hovering over li with the mouse or using
            // arrow keys ↓ | ↑
            onSelectedItem: ({ index, element, object }) => {
                console.log("onSelectedItem:", index, element, object);
            },

            // the method presents no results element
            noResults: ({ currentValue, template }) =>
                template(`<li>No results found: "${currentValue}"</li>`),
            });

        })
    </script>
@endsection