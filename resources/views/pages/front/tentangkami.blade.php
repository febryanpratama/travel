@extends('layouts.base.front.main')

@section('content')
    <div class="btc_tittle_main_wrapper">
		<div class="btc_tittle_img_overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
					<div class="btc_tittle_left_heading">
						<h1>Tentang Kami</h1>
					</div>
				</div>
				{{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
					<div class="btc_tittle_right_heading">
						<div class="btc_tittle_right_cont_wrapper">
							<ul>
								<li><a href="#">Beranda</a>  <i class="fa fa-angle-right"></i>
								</li>
								<li>Tentang Kami</li>
							</ul>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
	<!-- btc tittle Wrapper End -->
	<!-- x about title Wrapper Start -->
	<div class="x_about_seg_main_wrapper float_left padding_tb_100">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="x_about_seg_img_wrapper float_left">
						<img src="{{ asset('') }}assets/front/images/about_img1.jpg" alt="about_img">
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="x_about_seg_img_cont_wrapper float_left">
						<h3>Tentang Kami</h3>
						<p>Selamat datang di MarketPlace Rental Mobil berbasis Location Based Service (LBS)! Kami adalah platform yang memudahkan Anda untuk menyewa mobil di lokasi yang tepat, sesuai dengan kebutuhan perjalanan Anda. Berikut adalah beberapa informasi tentang kami: <br><br>

Penyewaan Mobil Terdekat: Temukan mobil sewaan terdekat dengan menggunakan teknologi Location Based Service kami. Kami memanfaatkan lokasi Anda untuk menampilkan opsi mobil yang tersedia di sekitar Anda, memudahkan Anda untuk menemukan mobil dengan cepat. <br><br>

Pilihan Mobil yang Beragam: Kami menawarkan berbagai macam mobil untuk disewa. Dari mobil keluarga yang nyaman hingga mobil mewah yang elegan, kami memiliki opsi yang sesuai dengan preferensi dan anggaran Anda. <br><br>

Proses Pemesanan yang Mudah: Kami memprioritaskan kenyamanan Anda dalam melakukan pemesanan. Dengan platform kami yang user-friendly, Anda dapat dengan mudah menelusuri mobil yang tersedia, memeriksa ketersediaan di lokasi yang diinginkan, dan memesan mobil secara langsung melalui aplikasi kami. <br><br> </p>
						{{-- <img src="images/seg.png" alt="segn"> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection