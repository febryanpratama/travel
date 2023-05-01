@extends('layouts.base.front.main')


@section('content')
    <div class="btc_tittle_main_wrapper">
        <div class="btc_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                    <div class="btc_tittle_left_heading">
                        <h1>List Car</h1>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                    <div class="btc_tittle_right_heading">
                        <div class="btc_tittle_right_cont_wrapper">
                            <ul>
                                <li><a href="#">Home</a> <i class="fa fa-angle-right"></i></li>
                                <li><a href="#">Cars</a> <i class="fa fa-angle-right"></i></li>
                                {{-- <li>{{ $data->name_car }}</li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper2">
                        <div class="x_icon_num x_icon_num2">
                            <p>2</p>
                        </div>
                        <h5>Detail</h5>
                    </div>
                    <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3">
                        <div class="x_icon_num x_icon_num3">
                            <p>3</p>
                        </div>
                        <h5>Cart</h5>
                    </div>
                    <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3">
                        <div class="x_icon_num x_icon_num3">
                            <p>4</p>
                        </div>
                        <h5>Checkout</h5>
                    </div>
                    <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3 x_title_num_main_box_wrapper_last">
                        <div class="x_icon_num x_icon_num3">
                            <p>5</p>
                        </div>
                        <h5>Done!</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="x_offer_car_main_wrapper float_left padding_tb_100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="x_offer_car_heading_wrapper float_left">
                    <h4>What We Offer</h4>
                    <h3>Choose your Car</h3>
                    <p>Morbi mollis vestibulum sollicitudin. Nunc in eros a justo facilisis rutrum. Aenean id ullamcorper libero
                        <br>Vestibulum imperdiet nibh vel magna lacinia commodo ultricies,
                    </p>
                </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($data as $item => $i)
                        {{-- {{ dd($i) }} --}}
                            @foreach ($i->mobil as $k)
                            {{-- {{ dd($item->mobil) }} --}}
                            {{-- {{ dd($k) }} --}}
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="x_car_offer_main_boxes_wrapper float_left">
                                        <div class="x_car_offer_starts float_left">	
                                            {{-- <i class="fa fa-star{{ (App\Helpers\Format::countRating($k->id) >= 1 ? '' : '-o') }}"></i>
                                            <i class="fa fa-star{{ (App\Helpers\Format::countRating($k->id) >= 1 ? '' : '-o') }}"></i>
                                            <i class="fa fa-star{{ (App\Helpers\Format::countRating($k->id) >= 1 ? '' : '-o') }}"></i>
                                            <i class="fa fa-star{{ (App\Helpers\Format::countRating($k->id) >= 1 ? '' : '-o') }}"></i>
                                            <i class="fa fa-star{{ (App\Helpers\Format::countRating($k->id) >= 1 ? '' : '-o') }}"></i> --}}
                                            {{-- <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i> --}}
                                        </div>
                                        <div class="x_car_offer_img float_left">
                                            <img src="{{ asset('') }}images/mobil/{{ $k->foto_mobil }}" class="img-fluid" alt="img">
                                        </div>
                                        <div class="x_car_offer_price float_left">
                                            <div class="x_car_offer_price_inner">
                                                <h3>{{ App\helpers\Format::formatRupiah($k->harga_sewa_mobil) }}</h3>
                                                <p><span>k</span> 
                                                <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">{{ $k->name_car }}</a></h2>
                                            {{-- <p>Extra Small</p> --}}
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-users"></i>
                                                        &nbsp;{{ $k->kapasitas_mobil }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-clone"></i>
                                                        &nbsp;4
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-briefcase"></i>
                                                        &nbsp;{{ $k->bagage_car }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current"><i class="fa fa-bars"></i></span>
                                                        <ul class="list">
                                                            <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                            </li>
                                                            <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> {{ $k->transmisi_mobil }} Transmission</a>
                                                            </li>
                                                            <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="x_car_offer_bottom_btn float_left">
                                            <ul>
                                                <li><a href="#">Book now</a>
                                                </li>
                                                <li><a href="{{ url('/'.$k->id.'/detail') }}">Details</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection