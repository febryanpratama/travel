@extends('layouts.base.front.main')


@section('content')
    <div class="btc_tittle_main_wrapper">
        <div class="btc_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                    <div class="btc_tittle_left_heading">
                        <h1>Cari Mobil</h1>
                    </div>
                </div>
                {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                    <div class="btc_tittle_right_heading">
                        <div class="btc_tittle_right_cont_wrapper">
                            <ul>
                                <li><a href="#">Beranda</a> <i class="fa fa-angle-right"></i></li>
                                <li><a href="#">Cari Mobil</a> <i class="fa fa-angle-right"></i></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="x_offer_car_main_wrapper float_left padding_tb_100">
        <div class="container">
            <div class="row">
                {{-- <div class="col-md-6">
                    <div id="mapCanvas" style="width: 100%;height: 500px">
                    </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="card" style="border-radius: 30px">
                        <div class="card-header">
                            <h4 class="text-primary"><b>Cari Mobil Rental yang anda Inginkan</b></h4>
                            <hr>
                            <form action="{{ url('cari-mobil') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="" class="control-label">Masukkan Nama Mobil</label>
                                            <input type="text" class="form-control" name="nama_mobil" placeholder="Avanza / Innova" required>
                                            {{-- <textarea placeholder="Pilih tempat yang anda inginkan" class="form-control" name="alamat" onFocus="initializeAutocomplete()" id="locality" autocomplete></textarea> --}}
    
                                            {{-- <textarea placeholder="Enter Area name to populate Latitude and Longitude" class="form-control" name="alamat" onFocus="initializeAutocomplete()" id="locality" autocomplete></textarea> --}}
    
                                            {{-- <input type="text" class="form-control"placeholder="Enter Area name to populate Latitude and Longitude" onFocus="initializeAutocomplete()" id="locality" autocomplete > --}}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="form-control">Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="tab-content">
                        <div id="home" class="tab-pane active">
                            <div class="row justify-content-center" id="gridhome">
                                @if ($data != NULL)
                                    @foreach ($data as $item)
                                    {{-- {{ dd($item) }} --}}
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
                                                    {{-- <img src="{{ asset('images/mobil/1681652706LAMBORGHINI AVENTADOR LP 740-4.jpg') }}" class="img-fluid" style="max-height: 150px" alt="img"> --}}
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
                                                    <p style="font-size: 12px">{{ App\Helpers\Format::getalgoritma($item->rental_id) }}km dari lokasi anda</p>
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
                                    
                                @endif
                                {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="x_car_offer_main_boxes_wrapper float_left">
                                        <div class="x_car_offer_img float_left">
                                            <img src="http://127.0.0.1:8000/images/mobil/1684997940inova reborn.png" class="img-fluid" style="max-height: 150px;" alt="img" />
                                        </div>
                                        <div class="x_car_offer_price float_left">
                                            <div class="x_car_offer_price_inner">
                                                <h3 style="font-size: 20px;">Rp. 600</h3>
                                                <p>
                                                    <span>K</span> <br />
                                                    / hari
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Inova Reborn</a></h2>
                                            <p>SUV</p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-users"></i> &nbsp;8</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                </li>
                                                <li>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current"><i class="fa fa-bars"></i></span>
                                                        <ul class="list">
                                                            <li class="dpopy_li">
                                                                <a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                            </li>
                                                            <li class="dpopy_li">
                                                                <a href="#"><i class="fa fa-code-fork"></i>Manual Transmission</a>
                                                            </li>
                                                            <li class="dpopy_li">
                                                                <a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="x_car_offer_bottom_btn float_left">
                                            <ul class="">
                                                <li><a href="#">NEW</a></li>
                                                <li><a href="http://127.0.0.1:8000/2/detail">Details</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="card">
                    <div class="col-md-12"></div>
                </div>
            </div> --}}
        </div>
    </div>
        
@endsection

