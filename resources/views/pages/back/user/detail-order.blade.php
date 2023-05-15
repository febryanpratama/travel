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
               <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Plat Nomor</label>
                        <input type="text" class="form-control" value="{{ $data->mobil->plat_mobil }}" readonly>
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
   <div class="card">
      <div class="card-header">
         <div class="row">
            History Pengantaran
         </div>
      </div>
      <div class="card-body">
         <div class="col-md-12 mt-2">
            <label for="">Waktu Pengantaran</label>
            <input type="text" class="form-control" value="{{ $data->pengantaran == null ? 'Belum ada Histori Pengembalian' : @Carbon\Carbon::parse($data->pengantaran->created_at)->format('d M Y H:i') }}">
         </div>
         <div class="col-md-12 mt-2">
            <label for="">Keterangan</label>
            <input type="text" class="form-control" value="{{ $data->pengantaran == null ? "Tidak Ada Keterangan" : @$data->pengantaran->keterangan }}">
         </div>
      </div>
   </div>
   <div class="card">
      <div class="card-header">
         <div class="row">
            History Pengembalian
         </div>
      </div>
      <div class="card-body">
         <div class="col-md-12 mt-2">
            <label for="">Waktu Pengembalian</label>
            <input type="text" class="form-control" value="{{ $data->pengembalian == null ? 'Belum ada Histori Pengembalian' : @Carbon\Carbon::parse($data->pengembalian->created_at)->format('d M Y H:i') }}">
         </div>
         <div class="col-md-12 mt-2">
            <label for="">Keterangan</label>
            <input type="text" class="form-control" value="{{ @$data->pengembalian == null ? "Tidak Ada Keterangan" : @$data->pengembalian->keterangan }}">
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
         <div class="row">
            <div class="col-md-12">
               <p>Apakah mobil sudah selesai digunakan? Jika iya silahkan dikonfirmasi</p>
            </div>
            <hr>
            <div class="col-12">
               <label class="form-label control-label" for="modalEditUserName">Rating</label>
               <br>
               <span class="fa fa-star" id="star1" onclick="add(this,1)"></span>
               <span class="fa fa-star" id="star2" onclick="add(this,2)"></span>
               <span class="fa fa-star" id="star3" onclick="add(this,3)"></span>
               <span class="fa fa-star" id="star4" onclick="add(this,4)"></span>
               <span class="fa fa-star" id="star5" onclick="add(this,5)"></span>
            </div>
            <div class="col-12">
               <label for="" class="form-label">Review</label>
               <textarea name="review" id="" cols="30" rows="5" class="form-control"></textarea>
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

@section('script')
    <script>
        function add(ths,sno){

            for (var i=1;i<=5;i++){
                var cur=document.getElementById("star"+i)
                cur.className="fa fa-star"
            }
            // console.log(sno);

            $('#rating').val(sno);

            for (var i=1;i<=sno;i++){
            var cur=document.getElementById("star"+i)
            if(cur.className=="fa fa-star")
                {
                cur.className="fa fa-star checked"
                }
            }

        }
        
    </script>
@endsection