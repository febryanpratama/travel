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
                     <p>Berikut ada List Order.</p>
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
                        <div class="col-md-6" style="text-align: right">
                            <button id="exportButton" class="" style="text-align: right">Export to PDF</button>

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
                                 
                                 <th>#</th>
                                 <th>Kode Invoice</th>
                                 <th>Tanggal Penyewaan</th>
                                 <th>Jasa Rental</th>
                                 <th>Mobil</th>
                                 <th>Status Pembayaran</th>
                                 <th>Bukti Pembayaran</th>
                                 <th>Status</th>
                                 <th>Aksi</th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                                @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->kd_invoice }}</td>
                                        <td>{{ $item->tanggal_mulai }}
                                            <br>
                                            -
                                            <br>
                                            {{ $item->tanggal_selesai }}</td>
                                        <td>{{ $item->rental->nama_rental }}</td>
                                        <td>{{ $item->mobil->nama_mobil }}</td>
                                        <td>
                                            @switch($item->is_pembayaran)
                                                @case('Lunas')
                                                    @if ($item->bukti_pembayaran != null)
                                                    <div><a href="{{ asset('images/bukti_pembayaran/'.$item->bukti_pembayaran) }}" class="text-success" target="_blank">Lunas</a></div>
                                                        
                                                    @else
                                                    
                                                    <div><a href="#"  class="text-success" >Lunas</a></div>
                                                    @endif
                                                @break
                                                @case('Belum Lunas')

                                                @if ($item->bukti_pembayaran != null)
                                                    <div><a href="{{ asset('images/bukti_pembayaran/'.$item->bukti_pembayaran) }}" class="text-danger" target="_blank">Belum Lunas</a></div>
                                                    
                                                @else
                                                <div>
                                                    <a href="#" class="text-danger" >Belum Lunas</a>
                                                </div>
                                                    
                                                @endif
                                                
                                                @break
                                                @default
                                                    
                                            @endswitch
                                        </td>
                                        
                                        <td>
                                            <span class="btn btn-outline-info">
                                                {{ $item->is_status }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($item->bukti_pembayaran != null)
                                                    <div><a href="{{ asset('images/bukti_pembayaran/'.$item->bukti_pembayaran) }}"   target="_blank">Lihat Bukti</a></div>
                                            
                                                @else
                                                <a href="#"  data-bs-toggle="modal" data-bs-target="#buktiPembayaran{{ $item->id }}">Upload Bukti</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('user/orders/'.$item->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" title="Detail" fill="none"style="width: 20px;height:20px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </a>


                                          
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

@foreach ($data as $it=>$dd)
    <div class="modal fade" id="buktiPembayaran{{ $dd->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('user/orders/'.$dd->id.'/bukti') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mt-1">
                                <label for="" class="control-label">Upload Bukti Pembayaran</label>
                                <input type="file" name="bukti_pembayaran" class="form-control" required>
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

@endsection