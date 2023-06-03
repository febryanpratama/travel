<!DOCTYPE html>
<!-- 
Template Name: Xpedia
Version: 1.0.0

-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zxx">
<!--[endif]-->


<!-- Mirrored from xdemos.space/xpedia/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2022 15:39:09 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
	<meta charset="utf-8" />
	<title>Xpedia</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="description" content="Xpedia" />
	<meta name="keywords" content="Xpedia" />
	<meta name="author" content="" />
	<meta name="MobileOptimized" content="320" />
	<!--Template style -->
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/front/css/xpedia.css" />
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">

  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/gh/tomickigrzegorz/autocomplete@1.8.3/dist/css/autocomplete.min.css"
/>
	<!--favicon-->
	<link rel="shortcut icon" type="image/png" href="images/fevicon.png" />
	<style>
		.hide {
			display: none;
		}
	</style>
</head>

<body>
	<!-- preloader Start -->
	<div id="preloader">
		<div id="status">
			<img src="images/loader.gif" id="preloader_image" alt="loader">
		</div>
	</div>
	<div class="serach-header">
		<div class="searchbox">
			<button class="close">×</button>
			<form>
				<input type="search" placeholder="Search …">
				<button type="submit"><i class="fa fa-search"></i>
				</button>
			</form>
		</div>
	</div>

	@include('layouts.base.front.partials.header')
	@include('layouts.base.front.partials.nav_header')
	
	@yield('content')
		<!-- x footer Wrapper Start -->
	<div class="x_footer_bottom_main_wrapper float_left" id="kontak">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
					<div class="x_footer_bottom_box_wrapper float_left">
						<h3>Tentang Kami</h3>
						<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
							aliqua.</p> <span><a href="#">Read More &nbsp;<i
									class="fa fa-angle-double-right"></i></a></span>
						{{-- <ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a>
							</li>
						</ul> --}}
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
					<div class="x_footer_bottom_box_wrapper_second float_left">
						<h3>Informasi</h3>
						<ul>
							<li><a href="#"><i class="fa fa-long-arrow-right"></i> &nbsp; Tentang</a>
							</li>
							<li><a href="#"><i class="fa fa-long-arrow-right"></i> &nbsp; Layanan</a>
							</li>
							{{-- <li><a href="#"><i class="fa fa-long-arrow-right"></i> &nbsp; Syarat & Ketentuan</a> --}}
							{{-- </li> --}}
							{{-- <li><a href="#"><i class="fa fa-long-arrow-right"></i> &nbsp; Cari Driver</a>
							</li> --}}
							{{-- <li><a href="#"><i class="fa fa-long-arrow-right"></i> &nbsp; Garansi Termurah</a>
							</li> --}}
						</ul>
					</div>
				</div>
				{{-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
					<div class="x_footer_bottom_box_wrapper_second float_left">
						<h3>Layanan Pelanggan</h3>
						<ul>
							<li><a href="#"><i class="fa fa-long-arrow-right"></i> &nbsp; FAQ</a>
							</li>
							<li><a href="#"><i class="fa fa-long-arrow-right"></i> &nbsp; Opsi Pembayaran</a>
							</li>
						</ul>
					</div>
				</div> --}}
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
					<div class="x_footer_bottom_box_wrapper_third float_left">
						<h3>Punya Pertanyaan?</h3>
						<div class="x_footer_bottom_icon_section float_left">
							<div class="x_footer_bottom_icon"> <i class="flaticon-phone-call"></i>
							</div>
							<div class="x_footer_bottom_icon_cont">
								<h4>Gratis Biaya Telpon</h4>
								<p>808 - 111 - 9999</p>
							</div>
						</div>
						<div class="x_footer_bottom_icon_section x_footer_bottom_icon_section2 float_left">
							<div class="x_footer_bottom_icon x_footer_bottom_icon2"> <i class="flaticon-mail-send"></i>
							</div>
							<div class="x_footer_bottom_icon_cont">
								<h4>Email Kami</h4>
								<p><a href="#">admin@rentalin.com</a>
								</p>
							</div>
						</div>
						<div class="x_footer_bottom_icon_section x_footer_bottom_icon_section2 float_left">
							<div class="x_footer_bottom_icon x_footer_bottom_icon3"> <i class="fa fa-map-marker"></i>
							</div>
							<div class="x_footer_bottom_icon_cont x_footer_bottom_icon_cont2">
								<h4><a href="#">View On Map</a></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="x_copyr_main_wrapper float_left">
		<a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up"></i></a>
		<div class="container">
			<p>Copyright © 2018 StarlabSys. All rights reserved.</p>
		</div>
	</div>
	<script src="{{ asset('') }}assets/front/js/jquery-3.3.1.min.js"></script>
	<script src="{{ asset('') }}assets/front/js/bootstrap.min.js"></script>
	<script src="{{ asset('') }}assets/front/js/modernizr.js"></script>
	<script src="{{ asset('') }}assets/front/js/select2.min.js"></script>
	<script src="{{ asset('') }}assets/front/js/jquery.menu-aim.js"></script>
	<script src="{{ asset('') }}assets/front/js/jquery-ui.js"></script>
	<script src="{{ asset('') }}assets/front/js/jquery.nice-select.min.js"></script>
	<script src="{{ asset('') }}assets/front/js/owl.carousel.js"></script>
	<script src="{{ asset('') }}assets/front/js/own-menu.js"></script>
	<script src="{{ asset('') }}assets/front/js/jquery.bxslider.min.js"></script>
	<script src="{{ asset('') }}assets/front/js/jquery.magnific-popup.js"></script>
	<script src="{{ asset('') }}assets/front/js/xpedia.js"></script>
	<!-- custom js-->

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
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

	@yield('script')
</body>


<!-- Mirrored from xdemos.space/xpedia/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2022 15:39:58 GMT -->

</html>