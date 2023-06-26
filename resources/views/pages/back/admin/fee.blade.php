@extends('layouts.base.back.main')

@section('content')
<div class="col-xl-9 col-lg-8 col-md-12">
   <div class="tak-instruct-group">
      <div class="row">
         <div class="col-md-12">
            <div class="settings-widget">
               <div class="settings-inner-blk p-0">
                  <div class="sell-course-head comman-space">
                     <h3>List fee</h3>
                     <p>Berikut merupakan List fee.</p>
                  </div>
               </div>
            </div>
            <div class="settings-widget">
               <div class="settings-inner-blk p-0">
                  <div class="comman-space pb-0">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="sell-course-head withdraw-history-head border-bottom-0">
                               <h3>List Pembayaran Fee</h3>
                            </div>
                        </div>
                        <div class="col-md-6 text-right" style="text-align: right">
                            <button id="exportButton" class="" style="text-align: right">Export to PDF</button>

                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                                + Pembayaran Fee
                            </button> --}}
                        </div>
                    </div>
                  </div>
                  <div class="comman-space pb-0">
                     <div class="settings-referral-blk course-instruct-blk  table-responsive">
                        <table class="table table-nowrap mb-0" id="datatable">
                           <thead class="text-center">
                              <tr class="text-center">
                                 
                                 <th class="text-center">#</th>
                                 {{-- <th class="text-center">Nama fee</th> --}}
                                 <th class="text-center">Fee Bulan</th>
                                 <th>Nama Rental</th>
                                 <th>Nominal Telah Dibayar</th>
                                 <th>Bukti Pembayaran</th>
                                 <th>Status</th>
                                 <th class="text-center">Aksi</th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                               @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        {{-- <td><a href="{{ asset('files/fee/'.$item->fee) }}" target="_blank">Lihat</a></td> --}}
                                        <td>{{ \Carbon\Carbon::parse($item->fee_date)->format('M Y') }}</td>
                                        <td>{{  $item->rental->nama_rental }}</td>
                                        <td>Rp. {{ number_format($item->nominal_pembayaran,0) }}</td>
                                        <td>
                                            @switch($item->status)
                                                @case(1)
                                                    <button class="btn btn-outline-success"> Diterima </button>
                                                    @break
                                                    @case(2)
                                                    <button class="btn btn-outline-danger"> Ditolak </button>
                                                    
                                                    @break
                                                    @default
                                                    <button class="btn btn-outline-info"> Sedang Diverifikasi </button>
                                                
                                            @endswitch
                                        </td>
                                        <td>
                                            <a href="{{ asset('images/fee/'.$item->bukti_pembayaran) }}" class="text-info" target="_blank">
                                                Lihat
                                            </a>
                                        </td>
                                        <td>
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" title="Detail" fill="none"style="width: 20px;height:20px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg> --}}


                                            <button class="btn btn-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 20px;height:20px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 9.75V10.5" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="{{ url('admin/fee/'.$item->id.'/terima') }}">Terima</a></li>
                                                <li><a class="dropdown-item" href="{{ url('admin/fee/'.$item->id.'/tolak') }}">Tolak</a></li>
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

{{-- @section('script')
<script>
    $(document).ready(function() {
        $('#start').change(function() {
            var start = $(this).val();
            
            $.ajax({
                url: "{{ url('api/fee') }}",
                type: "POST",
                data: {
                    rent: {{ Auth::user()->rental->id }},
                    start: start
                },
                success: function(data) {
                    console.log(data)
                    if(data.status){
                        $('#nominal').val(data.data);
                    }
                    // $('input[name="keterangan"]').val(data);
                }
            })
        });
    });
</script> --}}