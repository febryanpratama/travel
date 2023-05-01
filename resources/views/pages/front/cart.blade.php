@extends('layouts.base.front.main')

@section('content')
    <!-- btc tittle Wrapper Start -->
	<div class="btc_tittle_main_wrapper">
		<div class="btc_tittle_img_overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
					<div class="btc_tittle_left_heading">
						<h1>Booking Accessories</h1>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
					<div class="btc_tittle_right_heading">
						<div class="btc_tittle_right_cont_wrapper">
							<ul>
								<li><a href="#">Home</a> <i class="fa fa-angle-right"></i>
								</li>
								<li><a href="#">Cars</a> <i class="fa fa-angle-right"></i>
								</li>
								<li>Details</li>
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
					<h3>Choose a car</h3>
					<p>Complete Your Step</p>
				</div>
				<div class="x_title_num_heading_cont">
					<div class="x_title_num_main_box_wrapper">
						<div class="x_icon_num">
							<p>1</p>
						</div>
						<h5>Time & place</h5>
					</div>
					<div class="x_title_num_main_box_wrapper">
						<div class="x_icon_num ">
							<p>2</p>
						</div>
						<h5>Detail</h5>
					</div>
					<div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3">
						<div class="x_icon_num x_icon_num2">
							<p>3</p>
						</div>
						<h5>Cart</h5>
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
						<h5>done!</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- x tittle num Wrapper End -->
	<!-- x car book sidebar section Wrapper Start -->
	<div class="x_car_book_sider_main_Wrapper float_left">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="x_carbooking_right_section_wrapper float_left">
						<div class="row">
                            @foreach ($data as $item)
                            {{-- {{ dd($item) }} --}}
                                <div class="col-md-12">
                                    <div
                                        class="x_car_access_right_price_main_box_wrapper x_car_access_right_price_main_box_wrapper2 float_left">
                                        <div class="x_car_access_right_price_main_box_inner_left_wrapper">
                                            <div class="x_car_access_right_price_img_wrapper">
                                                <img src="{{ asset('images/mobil/'.$item->mobil->foto_mobil) }}" class="img-thumbnail" alt="g1_img">
                                            </div>
                                            <div class="x_car_access_right_price_img_cont_wrapper">
                                                <h3>{{ $item->mobil->nama_mobil }}</h3>
                                                <p>{{ $item->mobil->plat_mobil }}<br><b>Seat:</b> {{ $item->mobil->kapasitas_mobil }} Seat, <b>Transmission:</b> {{ $item->mobil->transmisi_mobil }}</p>
                                            </div>
                                        </div>
                                        <div class="x_car_access_right_price_main_box_inner_right_wrapper">
                                            <div class="x_car_acc_price_dollar_wrapper">
                                                <h3>{{ App\Helpers\Format::formatRupiah($item->mobil->harga_sewa_mobil)*App\Helpers\Format::days($item->tanggal_mulai, $item->tanggal_selesai) }}k</h3>
                                                <p>/ {{ App\Helpers\Format::days($item->tanggal_mulai, $item->tanggal_selesai) }} days</p>
                                            </div>
                                            <div class="x_car_acc_price_dollar_count_wrapper">
                                                <a href="{{ url('cart/'.$item->id) }}" class="btn btn-primary mt-3">Choose</a>
                                                {{-- <div class="quantity">
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
							{{-- <div class="col-md-12">
								<div class="x_car_acc_bottom_button float_left">
									<p><i class="fa fa-info-circle"></i> &nbsp;Phasellus ornare, ante vitae consectetuer
										consequat, purus sapien ultricies dolor.</p>
									<ul>
										<li><a href="#">Proceed to checkout <i class="fa fa-arrow-right"></i></a>
										</li>
									</ul>
								</div>
							</div> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- x car book sidebar section Wrapper End -->
@endsection