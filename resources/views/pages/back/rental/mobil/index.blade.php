@extends('layouts.base.back.main')

@section('content')
<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="showing-list">
        <div class="row">
            <div class="col-lg-6">
                <div class="d-flex align-items-center">
                    <div class="view-icons">
                    <a href="https://dreamslms.dreamguystech.com/laravel/public/course-details" class="grid-view "><i class="feather-grid"></i></a>
                    <a href="https://dreamslms.dreamguystech.com/laravel/public/course-list" class="list-view active"><i class="feather-list"></i></a>
                    </div>
                    <div class="show-result">
                    <h4>Showing 1-9 of 50 results</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="show-filter add-course-info">
                    <form action="#">
                    <div class="row gx-2 d-flex align-items-end">
                        <div class="col-md-6 col-item">
                            <div class=" search-group">
                                <i class="feather-search"></i>
                                <input type="text" class="form-control" placeholder="Search our courses">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-item justify-content-end">
                            {{-- <button class="btn btn-primary">+ Mobil</button> --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                + Mobil
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- {{ dd($data) }} --}}
    <div class="row">
        @foreach ($data as $item)
            <div class="col-lg-12 col-md-12 d-flex">
                <div class="course-box course-design list-course d-flex">
                    <div class="product">
                        <div class="product-img">
                            <a href="course-details.html">
                                <img class="img-fluid" alt="" src="{{ asset('images/mobil/'.$item->foto_mobil) }}">
                            </a>
                            <div class="price">
                                <h6>Rp. {{ number_format($item->harga_sewa_mobil, 2) }}</h6>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="head-course-title">
                                <h3 class="title"><a href="course-details.html">{{ $item->nama_mobil }}</a></h3>
                                <div class="all-btn all-category d-flex align-items-center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editMobil{{ $item->id }}">
                                        Edit Mobil
                                    </button>
                                    {{-- <a href="checkout.html" class="btn btn-primary">Edit Mobil</a> --}}
                                </div>
                            </div>
                            <div class="course-info border-bottom-0 pb-0 d-flex align-items-center">
                                <div class="rating-img d-flex align-items-center">
                                    <img src="{{ asset('') }}assets/back/img/icon/icon-01.svg" alt="">
                                    <p>Rp. {{ number_format($item->harga_sewa_mobil, 2) }}</p>
                                </div>
                                {{-- <div class="course-view d-flex align-items-center">
                                    <img src="{{ asset('') }}assets/back/img/icon/icon-02.svg" alt="">
                                    <p>9hr 30min</p>
                                </div> --}}
                            </div>
                            <div class="rating">
                                <i class="fas fa-star{{ (App\Helpers\Format::sumRating($item->id) >= 1 ? ' filled' : ' ') }}"></i>
                                <i class="fas fa-star{{ (App\Helpers\Format::sumRating($item->id) >= 2 ? ' filled' : ' ') }}"></i>
                                <i class="fas fa-star{{ (App\Helpers\Format::sumRating($item->id) >= 3 ? ' filled' : ' ') }}"></i>
                                <i class="fas fa-star{{ (App\Helpers\Format::sumRating($item->id) >= 4 ? ' filled' : ' ') }}"></i>
                                <i class="fas fa-star{{ (App\Helpers\Format::sumRating($item->id) >= 5 ? ' filled' : ' ') }}"></i>
                                {{-- <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i> --}}
                                <span class="d-inline-block average-rating"><span>{{ App\Helpers\Format::sumRating($item->id)}}</span> (15)</span>
                            </div>
                            <div class="course-group d-flex mb-0">
                                <div class="course-group-img d-flex">
                                    <a href="instructor-profile.html"><img src="assets/img/user/user1.jpg" alt="" class="img-fluid"></a>
                                    <div class="course-name">
                                        <h4><a href="instructor-profile.html">{{ $item->rental->nama_rental }}</a></h4>
                                        <p>{{ $item->tipe_mobil }} - {{ $item->nama_mobil }}</p>
                                    </div>
                                </div>
                                <div class="course-share d-flex align-items-center justify-content-center">
                                    <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#tambahPengemudi{{ $item->id }}">Pengemudi</button>
                                    {{-- <a href="#rate"><i class="fa-regular fa-heart"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@foreach ($data as $item)
    <div class="modal fade" id="editMobil{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Mobil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('rental/mobil/edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="mobil_id" value="{{ $item->id }}" id="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mt-1">
                                <label for="" class="control-label">Tipe Mobil</label>
                                <select name="tipe_mobil" class="form-control" id="" required>
                                    <option value="" selected disabled>Pilih Tipe Mobil</option>
                                    <option value="SUV">SUV</option>
                                    <option value="MPV">MPV</option>
                                    <option value="Crossover">Crossover</option>
                                    <option value="Hatchback">Hatchback</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="Sport Sedan">Sport Sedan</option>
                                    <option value="Convertible">Convertible</option>
                                    <option value="Station Wagon">Station Wagon</option>
                                    <option value="Off road">Off road</option>
                                    <option value="Double Cabin">Double Cabin</option>
                                    <option value="LCGC">LCGC</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="" class="control-label">Merk Mobil</label>
                                <select name="merk_mobil" class="form-control" id="" required>
                                    <option value="" selected disabled>Pilih Merk Mobil</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Daihatsu">Daihatsu</option>
                                    <option value="Wuling">Wuling</option>
                                    <option value="Suzuki">Suzuki</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="" class="control-label">Nama Mobil</label>
                                <input type="text" name="nama_mobil" class="form-control" required>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="" class="control-label">Transmisi</label>
                                <select name="transmisi_mobil" class="form-control" id="" required>
                                    <option value="" selected disabled>Pilih Transmisi Mobil</option>
                                    <option value="Manual">Manual</option>
                                    <option value="Automatic">Automatic</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="" class="control-label">Kapasitas Penumpang</label>
                                <input type="text" name="kapasitas_mobil" class="form-control" required>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="" class="control-label">Warna Mobil</label>
                                <input type="text" name="warna_mobil" class="form-control" required>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="" class="control-label">Jenis BBM</label>
                                <select name="jenis_bbm" class="form-control" id="" required>
                                    <option value="" selected disabled>Pilih Jenis BBM</option>
                                    <option value="Bensin">Bensin</option>
                                    <option value="Solar">Solar</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="" class="control-label">Fasilitas</label>
                                <input type="text" name="fasilitas_mobil" class="form-control" required>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="" class="control-label">Plat Mobil</label>
                                <input type="text" name="plat_mobil" class="form-control" required>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="" class="control-label">Harga Sewa Mobil /Hari</label>
                                <input type="number" name="harga_sewa_mobil" class="form-control" required>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="" class="control-label">Foto Mobil</label>
                                <input type="file" name="foto_mobil" class="form-control" required>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="" class="control-label">Keterangan</label>
                                <input type="text" name="keterangan_mobil" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahPengemudi{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Pengemudi Mobil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('rental/mobil/'.$item->id.'/supir') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mt-1">
                                <label for="" class="control-label">Nama Pengemudi</label>
                                <select name="supir_id" class="form-control" id="" required>
                                    <option value="" selected disabled>Pilih Nama Pengemudi</option>
                                    @foreach ($driver as $d)
                                        <option value="{{ $d->id }}">{{ $d->nama_supir }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
@endforeach

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Mobil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('rental/mobil') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mt-1">
                        <label for="" class="control-label">Tipe Mobil</label>
                        <select name="tipe_mobil" class="form-control" id="" required>
                            <option value="" selected disabled>Pilih Tipe Mobil</option>
                            <option value="SUV">SUV</option>
                            <option value="MPV">MPV</option>
                            <option value="Crossover">Crossover</option>
                            <option value="Hatchback">Hatchback</option>
                            <option value="Sedan">Sedan</option>
                            <option value="Sport Sedan">Sport Sedan</option>
                            <option value="Convertible">Convertible</option>
                            <option value="Station Wagon">Station Wagon</option>
                            <option value="Off road">Off road</option>
                            <option value="Double Cabin">Double Cabin</option>
                            <option value="LCGC">LCGC</option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="" class="control-label">Merk Mobil</label>
                        <select name="merk_mobil" class="form-control" id="" required>
                            <option value="" selected disabled>Pilih Merk Mobil</option>
                            <option value="Honda">Honda</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Hyundai">Hyundai</option>
                            <option value="Daihatsu">Daihatsu</option>
                            <option value="Wuling">Wuling</option>
                            <option value="Suzuki">Suzuki</option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="" class="control-label">Nama Mobil</label>
                        <input type="text" name="nama_mobil" class="form-control" required>
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="" class="control-label">Transmisi</label>
                        <select name="transmisi_mobil" class="form-control" id="" required>
                            <option value="" selected disabled>Pilih Transmisi Mobil</option>
                            <option value="Manual">Manual</option>
                            <option value="Automatic">Automatic</option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="" class="control-label">Kapasitas Penumpang</label>
                        <input type="text" name="kapasitas_mobil" class="form-control" required>
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="" class="control-label">Warna Mobil</label>
                        <input type="text" name="warna_mobil" class="form-control" required>
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="" class="control-label">Jenis BBM</label>
                        <select name="jenis_bbm" class="form-control" id="" required>
                            <option value="" selected disabled>Pilih Jenis BBM</option>
                            <option value="Bensin">Bensin</option>
                            <option value="Solar">Solar</option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="" class="control-label">Fasilitas</label>
                        <input type="text" name="fasilitas_mobil" class="form-control" required>
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="" class="control-label">Plat Mobil</label>
                        <input type="text" name="plat_mobil" class="form-control" required>
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="" class="control-label">Harga Sewa Mobil /Hari</label>
                        <input type="number" name="harga_sewa_mobil" class="form-control" required>
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="" class="control-label">Foto Mobil</label>
                        <input type="file" name="foto_mobil" class="form-control" required>
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="" class="control-label">Keterangan</label>
                        <input type="text" name="keterangan_mobil" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
      </form>
    </div>
  </div>
</div>
@endsection