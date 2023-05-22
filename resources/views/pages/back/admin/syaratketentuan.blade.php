@extends('layouts.base.back.main')

@section('content')
<div class="col-xl-9 col-lg-8 col-md-12">
   <div class="tak-instruct-group">
      <div class="row">
         <div class="col-md-12">
            <div class="settings-widget">
               <div class="settings-inner-blk p-0">
                  <div class="sell-course-head comman-space">
                     <h3>List Kontrak</h3>
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
                               <h3>Kontrak List</h3>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                                + Mobil
                            </button>
                        </div> --}}
                    </div>
                  </div>
                  <div class="comman-space pb-0">
                     <div class="settings-referral-blk course-instruct-blk  table-responsive">
                        <table class="table table-nowrap mb-0" id="datatable">
                           <thead class="text-center">
                              <tr class="text-center">
                                 
                                 <th>#</th>
                                 <th>Nama Kontrak / Persyaratan</th>
                                 <th>Keterangan</th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                                @foreach ($data->rental->kontrak as $key=>$item)
                                    <tr>
                                        <td>#</td>
                                        <td><a href="{{ asset('files/perjanjian/'.$item->perjanjian) }}" target="_blank">Lihat</a></td>
                                        <td>{{ $item->keterangan }}</td>
                                        
                                    </tr>
                                @endforeach
                                @foreach ($data->rental->syarat as $key=>$item)
                                    <tr>
                                        <td>#</td>
                                        <td><a href="{{ asset('files/perjanjian/'.$item->perjanjian) }}" target="_blank">Lihat</a></td>
                                        <td>{{ $item->keterangan }}</td>
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