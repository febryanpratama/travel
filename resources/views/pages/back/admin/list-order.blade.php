@extends('layouts.base.back.main')

@section('content')
<div class="col-xl-9 col-lg-8 col-md-12">
   <div class="tak-instruct-group">
      <div class="row">
         <div class="col-md-12">
            <div class="settings-widget">
               <div class="settings-inner-blk p-0">
                  <div class="sell-course-head comman-space">
                     <h3>List Order</h3>
                     <p>Berikut merupakan List Order</p>
                  </div>
               </div>
            </div>
            <div class="settings-widget">
               <div class="settings-inner-blk p-0">
                  <div class="comman-space pb-0">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="sell-course-head withdraw-history-head border-bottom-0">
                               <h3>List Order</h3>
                            </div>
                        </div>
                        <div class="col-md-6"  style="text-align: right">
                            <button id="exportButton" class="btn btn-outline-primary">Export to PDF</button>
                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                                + Mobil
                            </button> --}}
                        </div>
                    </div>
                  </div>
                  <div class="comman-space pb-0">
                     <div class="settings-referral-blk course-instruct-blk  table-responsive">
                        <table class="table table-nowrap mb-0" id="datatable">
                           <thead class="text-center">
                              <tr class="text-center">
                                 
                                 <th>No</th>
                                 <th>Kode Invoice</th>
                                 <th>Nama Penyewa</th>
                                 <th>Tanggal Penyewaan</th>
                                 <th>Jasa Rental</th>
                                 <th>Mobil</th>
                                 <th>Status Pembayaran</th>
                                 <th>Status Order</th>
                                 <th>Aksi</th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                                @foreach ($data as $key=>$item)
                                {{-- {{ dd($item) }} --}}
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->kd_invoice }}</td>
                                        <td>{{ $item->customer->nama_lengkap }}</td>
                                        <td>{{ $item->tanggal_mulai }}
                                            <br>
                                            -
                                            <br>
                                            {{ $item->tanggal_selesai }}</td>
                                        <td>{{ $item->rental->nama_rental }}</td>
                                        <td>{{ @$item->mobil->nama_mobil }}</td>
                                        <td>
                                            @switch($item->is_pembayaran)
                                                @case('Lunas')
                                                    <div class="text-success">Lunas</div>
                                                    @break
                                                    @case('Belum Lunas')
                                                    <div class="text-danger">Belum Lunas</div>
                                                    
                                                    @break
                                                @default
                                            @endswitch
                                        </td>
                                        <td>
                                            <span >
                                                {{-- {{ $item->is_location }} --}}
                                                @if ($item->is_location == 'Ambil Sendiri')
                                                @switch($item->is_status)
                                                    @case('Dalam Persiapan')
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#dalampengambilan">
                                                            Dalam Pengambilan
                                                        </button>
                                                        @break
                                                    @case('Sedang Digunakan')
                                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#sedangdigunakan">
                                                            {{ $item->is_status }}
                                                        </button>
                                                        @break
                                                    @case('Selesai Digunakan')
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#selesaidigunakan">
                                                            {{ $item->is_status }}
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
                                                    @switch($item->is_status)
                                                            @case('Dalam Persiapan')
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dalampersiapan">
                                                                    {{ $item->is_status }}
                                                                </button>
                                                                
                                                                @break
                                                            @case('Dalam Pengantaran')
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#dalampengantaran">
                                                                    {{ $item->is_status }}
                                                                </button>
                                                                @break
                                                            @case('Sedang Digunakan')
                                                                <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#sedangdigunakan">
                                                                    {{ $item->is_status }}
                                                                </button>
                                                                @break
                                                            @case('Selesai Digunakan')
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#selesaidigunakan">
                                                                    {{ $item->is_status }}
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
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/orders/'.$item->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" title="Detail" fill="none"style="width: 20px;height:20px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </a>


                                            <button class="btn btn-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 20px;height:20px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 9.75V10.5" />
                                                </svg>
                                            </button>
                                            {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="{{ url('admin/rental/'.$item->id.'/terima') }}">Terima</a></li>
                                                <li><a class="dropdown-item" href="#">Tolak</a></li>
                                            </ul> --}}
                                        </td>
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
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Kontrak Mobil</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('rental/kontrak') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mt-1">
                            <label for="" class="control-label">Nama Kontrak</label>
                            <input type="file" name="perjanjian" class="form-control" required>
                        </div>
                        <div class="col-md-6 mt-1">
                            <label for="" class="control-label">Keterangan Kontrak</label>
                            <input type="text" name="keterangan" class="form-control" required>
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