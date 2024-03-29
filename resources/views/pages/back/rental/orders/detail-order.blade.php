@extends('layouts.base.back.main')

@section('content')
<div class="col-xl-9 col-md-8" id="wrap">
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
                  @if ($data->bukti_pembayaran != null)
                           <div><a href="{{ asset('images/bukti_pembayaran/'.$data->bukti_pembayaran) }}"   target="_blank">Lihat Bukti</a></div>
                  
                     @else
                     <a href="#"  data-bs-toggle="modal" >Belum Upload Bukti Pembayaran</a>
                  @endif
               </div>
            </div>
            <div class="profile-share d-flex align-items-center justify-content-center">
               <button type="button" class="btn btn-outline-primary m-2" id="print">
                   Print Detail
               </button>

               @if ($data->is_location == 'Ambil Sendiri')

               {{-- {{ $data->is_status }} --}}
               @switch($data->is_status)
                   @case('Dalam Persiapan')
                       <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#dalampengambilan">
                           Dalam Pengambilan
                       </button>
                       @break
                   @case('Sedang Digunakan')
                       <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#sedangdigunakan">
                           {{ $data->is_status }}
                       </button>
                       @break
                   @case('Selesai Digunakan')
                       <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#selesaidigunakan">
                           {{ $data->is_status }}
                       </button>
                       @break
                   @case('Sudah Dikembalikan')
                       <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#">
                           Order Telah Selesai
                       </button>
                       @break
                    @default
                       <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#">
                           Ditolak
                       </button>
                       
               @endswitch
                   
               @else
                   
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
                       <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#selesaidigunakan">
                           {{ $data->is_status }}
                       </button>
                       @break
                   @case('Sudah Dikembalikan')
                       <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#">
                           Order Telah Selesai
                       </button>
                       @break
                    @default
                       <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#">
                           Ditolak
                       </button>
                       
               @endswitch
               @endif
               
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
                     {{-- {{ dd($data)}} --}}
                        <label class="form-control-label">Nama Costumer</label>
                        <input type="text" class="form-control" value="{{ $data->customer->nama_lengkap }}" readonly>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Alamat Costumer</label>
                        <input type="text" class="form-control" value="{{ $data->customer->alamat }}" readonly>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">NIK Costumer</label>
                        <input type="text" class="form-control" value="{{ $data->customer->nik }}" readonly>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">No Telp Costumer</label>
                        <input type="text" class="form-control" value="{{ $data->customer->no_telp }}" readonly>
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
                        <input type="text" class="form-control" value="{{ number_format(($data->total_harga+@$data->hargasopir), 0) }}" readonly>

                        {{-- <input type="text" class="form-control" value="{{ number_format($data->total_harga, 0) }}" readonly> --}}
                     </div>
                  </div>
                  @if ($data->hargasopir != null)
                      <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-control-label">Nama Supir</label>
                           <input type="text" class="form-control" value="{{ $data->mobil->supir->nama_supir }}" readonly>
                        </div>
                     </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                           <label class="form-control-label">Nomor Telpon Supir</label>
                           <input type="text" class="form-control" value="{{ $data->mobil->supir->no_hp }}" readonly>
                        </div>
                     </div>
                  @endif
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
         <div class="col-md-12 mt-2">
            <label for="">Denda</label>
            <input type="text" class="form-control" value="{{ @$data->denda == null ? "Tidak Ada Denda" : number_format(@$data->pengembalian->denda) }}">

            {{-- <input type="text" class="form-control" value="Rp. {{ number_format(@$data->denda == null ? "Tidak Ada Denda" : @$data->pengembalian->denda) }}"> --}}
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="dalampersiapan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('rental/orders/'.$data->id.'/persiapan') }}" method="POST">
        @csrf
        <div class="modal-body">
            Status dalam persiapan, segera antar mobil anda ke konsumen

            <hr>
            <div class="row">
               <div class="col-md-12">
                  <label for="" class="control-label">Keterangan Pengantaran*</label>
                  <textarea name="keterangan" id="" cols="30" rows="5" class="form-control"></textarea>
                  <small class="text-danger">*optional</small>
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

<div class="modal fade" id="dalampengantaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('rental/orders/'.$data->id.'/pengantaran') }}" method="POST">
        @csrf
        <div class="modal-body">
            Apakah Mobil sudah diantar? , jika sudah silahkan konfirmasi
            <hr>
            <div class="row">
               <div class="col-md-12">
                  <label for="" class="control-label">Status</label>
                  <select name="is_status" class="form-control" id="">
                     <option value="" selected disabled required> == Pilih == </option>
                     <option value="Disetujui">Disetujui</option>
                     <option value="Ditolak">Ditolak</option>
                  </select>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <label for="" class="control-label">Keterangan Pengantaran*</label>
                  <textarea name="keterangan" id="" cols="30" rows="5" class="form-control"></textarea>
                  <small class="text-danger">*optional</small>
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
<div class="modal fade" id="dalampengambilan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('rental/orders/'.$data->id.'/pengantaran') }}" method="POST">
        @csrf
        <div class="modal-body">
            Apakah Mobil sudah diambil? , jika sudah silahkan konfirmasi
            <hr>
            <div class="row">
               <div class="col-md-12">
                  <label for="" class="control-label">Status</label>
                  <select name="is_status" class="form-control" id="">
                     <option value="" selected disabled required> == Pilih == </option>
                     <option value="Disetujui">Disetujui</option>
                     <option value="Ditolak">Ditolak</option>
                  </select>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <label for="" class="control-label">Keterangan Pengantaran*</label>
                  <textarea name="keterangan" id="" cols="30" rows="5" class="form-control"></textarea>
                  <small class="text-danger">*optional</small>
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
<div class="modal fade" id="selesaidigunakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('rental/orders/'.$data->id.'/dikembalikan') }}" method="POST">
        @csrf
        <div class="modal-body">
            Mobil Telah Selesai digunakan. silahkan konfirmasi

            <hr>
            <div class="row">
               <div class="col-md-12 mt-2">
                  <label for="" class="label-control">Keterangan*</label>
                  <input type="text" class="form-control" name="keterangan" placeholder="">
               </div>
               <div class="col-md-12 mt-2">
                  <label for="" class="label-control">Denda*</label>
                  <input type="number" class="form-control" name="denda" placeholder="">
               </div>
            </div>
            <small class="text-danger">*optional</small>
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