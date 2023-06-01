@extends('layouts.base.back.main')

@section('content')
<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="row">
        @role('admin')
        <div class="col-md-4 d-flex">
            <div class="card instructor-card w-100">
                <div class="card-body">
                    <div class="instructor-inner">
                        <h6>Jumlah Rental</h6>
                        <h4 class="instructor-text-success">{{ $rental }}</h4>
                        <p>Earning this month</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex">
            <div class="card instructor-card w-100">
                <div class="card-body">
                    <div class="instructor-inner">
                        <h6>Jumlah Pelanggan</h6>
                        <h4 class="instructor-text-info">{{ $pelanggan }}</h4>
                        <p>New this month</p>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        @role('admin|rental')
        <div class="col-md-4 d-flex">
            <div class="card instructor-card w-100">
                <div class="card-body">
                    <div class="instructor-inner">
                        <h6>Jumlah Mobil</h6>
                        <h4 class="instructor-text-info">{{ $mobil }}</h4>
                        <p>New this month</p>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        <div class="col-md-4 d-flex">
            <div class="card instructor-card w-100">
                <div class="card-body">
                    <div class="instructor-inner">
                        <h6>Jumlah Order</h6>
                        <h4 class="instructor-text-warning">{{ $ordertotal }}</h4>
                        <p>Rating this month</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex">
            <div class="card instructor-card w-100">
                <div class="card-body">
                    <div class="instructor-inner">
                        <h6>Jumlah Order Berjalan</h6>
                        <h4 class="instructor-text-success">{{ $orderberjalan }}</h4>
                        <p>Rating this month</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex">
            <div class="card instructor-card w-100">
                <div class="card-body">
                    <div class="instructor-inner">
                        <h6>Jumlah Order Selesai</h6>
                        <h4 class="instructor-text-success">{{ $orderselesai }}</h4>
                        <p>Rating this month</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="settings-widget">
                <div class="settings-inner-blk p-0">
                    <div class="sell-course-head comman-space">
                        <h3>Order Terbaru</h3>
                    </div>
                    <div class="comman-space pb-0">
                        <div class="settings-tickets-blk course-instruct-blk table-responsive">

                            <table class="table table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Foto / Detail Order</th>
                                        <th>Total hari</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $item)
                                        <tr>
                                            <td>
                                                <div class="sell-table-group d-flex align-items-center">
                                                    <div class="sell-group-img">
                                                        <a href="course-details.html">
                                                            <img src="{{ asset('images/mobil/'.@$item->mobil->foto_mobil) }}"
                                                                class="img-fluid " alt="">
                                                        </a>
                                                    </div>
                                                    <div class="sell-tabel-info">
                                                        </p>
                                                        <p><a href="course-details.html">{{ @$item->mobil->nama_mobil }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $item->total_hari }} hari</td>
                                            <td>{{ number_format($item->total_harga, 0) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection