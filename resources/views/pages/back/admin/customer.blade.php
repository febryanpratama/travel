@extends('layouts.base.back.main')

@section('content')
<div class="col-xl-9 col-lg-8 col-md-12">
   <div class="tak-instruct-group">
      <div class="row">
         <div class="col-md-12">
            <div class="settings-widget">
               <div class="settings-inner-blk p-0">
                  <div class="sell-course-head comman-space">
                     <h3>List Pelanggan</h3>
                     <p>Order Dashboard is a quick overview of all current orders.</p>
                  </div>
               </div>
            </div>
            <div class="settings-widget">
               <div class="settings-inner-blk p-0">
                  <div class="comman-space pb-0">
                     <div class="sell-course-head withdraw-history-head border-bottom-0">
                        <h3>List Pelanggan</h3>
                           <button id="exportButton" class="" style="text-align: right">Export to PDF</button>

                     </div>
                  </div>
                  <div class="comman-space pb-0">
                     <div class="settings-referral-blk course-instruct-blk  table-responsive">
                        <table class="table table-nowrap mb-0" id="datatable">
                           <thead class="text-center">
                              <tr>
                                 
                                 <th>No</th>
                                 <th>Nama Pelanggan</th>
                                 <th>NIK</th>
                                 <th>Nomor Telepon</th>
                                 <th>Alamat Pelanggan</th>
                                 <th>Tanggal Pendaftaran</th>
                                 <th>Status</th>
                                 <th>Aksi</th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                               @foreach ($data as $key=>$item)
                               {{-- {{ dd($item) }} --}}
                                    <tr class="text-center">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->nama_lengkap }}</td>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->no_telp }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                             @switch($item->user->is_active)
                                                 @case(1)
                                                     <div class="text-success">Terverifikasi</div>
                                                     @break
                                                     @case(0)
                                                     
                                                     <div class="text-danger">Unverifikasi</div>
                                                     @break
                                                 @default
                                                     
                                             @endswitch
                                        </td>
                                        <td>
                                            <svg xmlns="http://www.w3.org/2000/svg" title="Detail" fill="none"style="width: 20px;height:20px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>


                                            <button class="btn btn-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 20px;height:20px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 9.75V10.5" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="{{ url('admin/customer/'.$item->user->id.'/terima') }}">Terima</a></li>
                                                <li><a class="dropdown-item" href="{{ url('admin/customer/'.$item->user->id.'/tolak') }}">Tolak</a></li>
                                                {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                                            </ul>
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
@endsection