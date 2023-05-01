@extends('layouts.base.back.main')

@section('content')
    <div class="col-xl-9 col-md-8">
   <div class="settings-widget profile-details">
      <div class="settings-menu p-0">
         <div class="profile-heading">
            <h3>Order Detail</h3>
            {{-- <p>You have full control to manage your own account setting.</p> --}}
         </div>
         <div class="course-group mb-0 d-flex">
            <div class="course-group-img d-flex align-items-center">
               <a href="student-profile.html"><img src="{{ asset('images/mobil/'.$data->mobil->foto_mobil) }}" alt="" class="img-fluid"></a>
               <div class="course-name">
                  <h4><a href="student-profile.html">{{ $data->kd_invoice }}</a></h4>
                  <p>{{ $data->mobil->nama_mobil }}</p>
               </div>
            </div>
            <div class="profile-share d-flex align-items-center justify-content-center">
               @switch($data->is_status)
                    @case('Dalam Persiapan')
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dalampersiapan">
                            {{ $data->is_status }}
                        </button>
                        
                        @break
                    @case('Dalam Pengantaran')
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#dalampengantaran">
                            {{ $data->is_status }}
                        </button>
                        @break
                    @case('Sedang Digunakan')
                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#sedangdigunakan">
                            {{ $data->is_status }}
                        </button>
                        @break
                    @case('Selesai Digunakan')
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#">
                            {{ $data->is_status }}
                        </button>
                        @break
                    @case('Sudah Dikembalikan')
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#">
                            Order Telah Selesai
                        </button>
                        @break
                    {{-- @case('Dalam Pengantaran')
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#dalampengantaran">
                            {{ $data->is_status }}
                        </button>
                        @break --}}
                    @default
                        
                @endswitch
               {{-- <a href="javascript:;" class="btn btn-success">{{ $data->is_status }}</a> --}}
               {{-- <a href="javascript:;" class="btn btn-danger">Delete</a> --}}
            </div>
         </div>
         <div class="checkout-form personal-address add-course-info ">
            <div class="personal-info-head">
               <h4>Details</h4>
               <p>Berikut merupakan detail penyewaan Mobil untuk anda</p>
            </div>
            <form action="#">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Nama Rental</label>
                        <input type="text" class="form-control" value="{{ $data->rental->nama_rental }}" readonly>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Alamat Rental</label>
                        <input type="text" class="form-control" value="{{ $data->rental->alamat }}" readonly>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Tanggal Mulai</label>
                        <input type="text" class="form-control" value="{{ $data->tanggal_mulai }}" readonly>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Tanggal Selesai</label>
                        <input type="text" class="form-control" value="{{ $data->tanggal_selesai }}" readonly>
                     </div>
                  </div>
                  
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Durasi Pinjaman</label>
                        <input type="text" class="form-control" value="{{ App\Helpers\Format::days($data->tanggal_mulai, $data->tanggal_selesai) }} hari" readonly>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Total Harga</label>
                        <input type="text" class="form-control" value="{{ number_format($data->total_harga, 0) }}" readonly>
                     </div>
                  </div>
                  {{-- <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Status</label>
                        <input type="text" class="form-control" value="{{ number_format($data->total_harga, 0) }}" readonly>
                     </div>
                  </div> --}}

                 
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="sedangdigunakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('user/orders/'.$data->id.'/digunakan') }}" method="POST">
        @csrf
        <div class="modal-body">
            Apakah mobil sudah selesai digunakan? Jika iya silahkan dikonfirmasi
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