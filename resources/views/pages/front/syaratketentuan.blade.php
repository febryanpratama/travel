@extends('layouts.base.front.main')

@section('content')
    <!-- btc tittle Wrapper Start -->
	<div class="btc_tittle_main_wrapper">
		<div class="btc_tittle_img_overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
					<div class="btc_tittle_left_heading">
						<h1>Syarat & Ketentuan</h1>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
					<div class="btc_tittle_right_heading">
						<div class="btc_tittle_right_cont_wrapper">
							<ul>
								<li><a href="#">Home</a> <i class="fa fa-angle-right"></i>
								</li>
								<li><a href="#">Syarat & Ketentuan</a> <i class="fa fa-angle-right"></i>
								</li>
								<li>Detail</li>
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
					<h3>Syarat & Ketentuan</h3>
					<p>Selesaikan Langkah Anda</p>
				</div>
				<div class="x_title_num_heading_cont">
					<div class="x_title_num_main_box_wrapper">
						<div class="x_icon_num">
							<p>1</p>
						</div>
						<h5>Waktu & Tempat</h5>
					</div>
					<div class="x_title_num_main_box_wrapper">
						<div class="x_icon_num ">
							<p>2</p>
						</div>
						<h5>Detail</h5>
					</div>
					<div class="x_title_num_main_box_wrapper">
						<div class="x_icon_num ">
							<p>3</p>
						</div>
						<h5>Cart</h5>
					</div>
					<div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3">
						<div class="x_icon_num x_icon_num2">
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
	<!-- x car book sidebar section Wrapper Start -->
	<div class="x_car_book_sider_main_Wrapper float_left">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="x_carbooking_right_section_wrapper float_left">
                        <div class="row">
                            <h2 class="p-2">Syarat</h2>
                            @foreach ($data->syarat as $item=>$k)

                            {{-- {{ dd($k) }} --}}
                                <div class="col-md-12">
                                    <div
                                        class="x_car_access_right_price_main_box_wrapper x_car_access_right_price_main_box_wrapper2 float_left">
                                        <div class="x_car_access_right_price_main_box_inner_left_wrapper">
                                            <div class="x_car_access_right_price_img_wrapper">
                                                <h4>Syarat {{ $item+1 }}</h4>
                                                {{-- <img src="{{ asset('images/mobil/'.$item->mobil->foto_mobil) }}" class="img-thumbnail" alt="g1_img"> --}}
                                            </div>
                                            <div class="x_car_access_right_price_img_cont_wrapper">
                                                <h3>{{ $data->nama_pemilik }}</h3>
                                                <p>{{ $k->keterangan }}<br></p>
                                            </div>
                                        </div>
                                        <div class="x_car_access_right_price_main_box_inner_right_wrapper">
                                            <div class="x_car_acc_price_dollar_wrapper">
                                                <p> <a href="{{ asset('files/persyaratan/'.$k->persyaratan) }}">Lihat Dokumen</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
						</div>
                        <br>
                        <br>
                        <div class="row">
                            <h2 class="p-2">Kontrak</h2>
                            @foreach ($data->kontrak as $item=>$kn)

                            {{-- {{ dd($kn) }} --}}
                                <div class="col-md-12">
                                    <div
                                        class="x_car_access_right_price_main_box_wrapper x_car_access_right_price_main_box_wrapper2 float_left">
                                        <div class="x_car_access_right_price_main_box_inner_left_wrapper">
                                            <div class="x_car_access_right_price_img_wrapper">
                                                <h3>Perjanjian {{ $item+1 }}</h3>
                                                {{-- <img src="{{ asset('images/mobil/'.$item->mobil->foto_mobil) }}" class="img-thumbnail" alt="g1_img"> --}}
                                            </div>
                                            <div class="x_car_access_right_price_img_cont_wrapper">
                                                <h3>{{ $data->nama_pemilik }}</h3>
                                                <p>{{ $k->keterangan }}<br></p>
                                            </div>
                                        </div>
                                        <div class="x_car_access_right_price_main_box_inner_right_wrapper">
                                            <div class="x_car_acc_price_dollar_wrapper">
                                                <p> <a href="{{ asset('files/persyaratan/'.$k->perjanjian) }}">Lihat Dokumen</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
						</div>
					</div>
				</div>
			</div>
            <div class="row d-flex m-3">
                <div class="col-md-6 d-flex p-1 items-center" >
                    <a href="" class="btn btn-outline-danger justify-content-center">Kembali</a>
                </div>
            </div>
		</div>
	</div>
	<!-- x car book sidebar section Wrapper End -->
@endsection