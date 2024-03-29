@extends('layouts.base.back.main')

@section('content')
<div class="col-xl-9 col-lg-8 col-md-12">
   <div class="tak-instruct-group">
      <div class="row">
         <div class="col-md-12">
            <div class="settings-widget">
               <div class="settings-inner-blk p-0">
                  <div class="sell-course-head comman-space">
                     <h3>List Rental</h3>
                     <p>Order Dashboard is a quick overview of all current orders.</p>
                  </div>
               </div>
            </div>
            <div class="settings-widget">
               <div class="settings-inner-blk p-0">
                  <div class="comman-space pb-0">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="sell-course-head withdraw-history-head border-bottom-0">
                               <h3>List Rental</h3>
                            </div>
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            {{-- <button id="exportButton" class="" style="text-align: right">Export to PDF</button> --}}

                           <a href="{{ url('admin/rental/store') }}">
                              <button type="button" class="btn btn-primary">
                                  + Rental
                              </button>
                              
                           </a>
                        </div>
                    </div>
                  </div>
                  <div class="comman-space pb-0">
                     <div class="settings-referral-blk course-instruct-blk  table-responsive">
                        <table class="table table-nowrap mb-0" id="datatable">
                           <thead class="text-center">
                              <tr>
                                 
                                 <th>No</th>
                                 <th>Nama Rental</th>
                                 <th>Nama Pemilik</th>
                                 <th>No Ijin Usaha</th>
                                 <th>Tanggal Pendaftaran</th>
                                 <th>Tipe Rental</th>
                                 <th>Status</th>
                                 <th>Aksi</th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                               @foreach ($data as $key=>$item)
                               {{-- {{ dd($item) }} --}}
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ @$item->rental->nama_rental }}</td>
                                        <td>{{ @$item->rental->nama_pemilik }}</td>
                                        <td>{{ @$item->rental->no_ijin_usaha }}</td>
                                        <td>{{ @$item->rental->created_at }}</td>
                                        <td>{{ @$item->rental->tipe }}</td>
                                        <td>
                                            @switch($item->is_active)
                                                @case(0)
                                                    <div class="text-danger">Belum Verifikasi</div>
                                                    @break
                                                @case(1)
                                                    
                                                    <div class="text-success">Verifikasi</div>
                                                    @break
                                                @default
                                                    
                                            @endswitch
                                        </td>
                                        <td>
                                           <a href="{{ url('admin/rental/'.$item->rental->id.'/detail') }}">
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
                                          
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="{{ url('admin/rental/'.$item->id.'/ubah') }}">Ubah</a></li>
                                                <li><a class="dropdown-item" href="{{ url('admin/rental/'.$item->id.'/terima') }}">Terima</a></li>
                                                <li><a class="dropdown-item" href="{{ url('admin/rental/'.$item->id.'/hapus') }}">Tolak</a></li>
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