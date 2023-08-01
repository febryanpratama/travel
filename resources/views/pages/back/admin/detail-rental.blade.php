@extends('layouts.base.back.main')
@section('content')
<div class="col-xl-9 col-md-8">
   <div class="settings-widget profile-details">
      <div class="settings-menu p-0">
         <div class="profile-heading">
            <h3>Detail Profil</h3>
            <p>Kamu memiliki akses penuh untuk terkait data pribadi.</p>
         </div>
         <div class="course-group mb-0 d-flex">
            <div class="course-group-img d-flex align-items-center">
               <a href="https://dreamslms.dreamguystech.com/laravel/public/instructor-profile"><img src="{{ asset('images/rental/'.$data->foto_rental) }}" alt="" class="img-fluid"></a>
               <div class="course-name">
                  <h4><a href="#">Avatar Kamu</a></h4>
                  <p>PNG atau JPG dan tidak lebih dari 800px.</p>
               </div>
            </div>
            <div class="profile-share d-flex align-items-center justify-content-center">
               {{-- <a href="{{ url('admin/rental/'.$data->id.'/detail/supir') }}" class="btn btn-outline-info m-2">Data Supir</a> --}}
               <a href="javascript:;" class="btn btn-success">{{ Ucfirst($data->tipe) }}</a>
               {{-- <a href="javascript:;" class="btn btn-danger">Hapus</a> --}}
            </div>
         </div>
         <div class="checkout-form personal-address add-course-info">
            <div class="personal-info-head">
               <h4>Detail Pribadi</h4>
               <p>Ubah Informasi pribadi anda.</p>
            </div>
            <form action="{{ url('rental/profil') }}" method="POST" enctype="multipart/form-data">
                @csrf
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Nama Rental</label>
                        <input type="text" class="form-control" name="nama_rental" value="{{ $data->nama_rental }}" placeholder="Enter your first Name">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Nama Pemilik Rental</label>
                        <input type="text" class="form-control" name="nama_pemilik" value="{{ $data->nama_pemilik }}" placeholder="Enter your last Name">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Nomor Ijin Usaha</label>
                        <input type="text" class="form-control" name="no_ijin_usaha" value="{{ $data->no_ijin_usaha }}" placeholder="Enter your last Name">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{ $data->alamat }}" placeholder="Enter your last Name">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Foto Surat Izin / <span><a href="{{ asset('images/rental/ktp/'.$data->ktp) }}" target="_blank">Lihat Foto</a></span></label>
                        
                        <input type="file" class="form-control" name="ktp" value="{{ $data->ktp }}" placeholder="Enter your last Name">
                    </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Foto Rental / <span><a href="{{ asset('images/rental/'.$data->foto_rental) }}" target="_blank">Lihat Foto</a></span></label>
                        
                        <input type="file" class="form-control" name="foto_rental" value="{{ $data->foto_rental }}" placeholder="Enter your last Name">
                    </div>
                  </div>
                  {{-- <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $data->auth->email }}" placeholder="Enter your Phone">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="form-control-label">password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your Phone">
                     </div>
                  </div> --}}
                  {{-- <div class="update-profile">
                     <button type="submit" class="btn btn-primary">Update Profile</button>
                  </div> --}}
               </div>
            </form>
         </div>
         <br>
        </div>
    </div>
    <div class="settings-widget">
       <div class="settings-inner-blk p-0">
           <div class="comman-space pb-0">
           <div class="row ">
               <div class="col-md-6">
                   <div class="sell-course-head withdraw-history-head border-bottom-0">
                       <h3>List Pengemudi</h3>
                   </div>
               </div>
               <div class="col-md-6">
                   {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                       + Pengemudi
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
                           <th>Nama Pengemudi</th>
                           <th>No Hp</th>
                           <th>Alamat</th>
                           <th>Foto</th>
                       </tr>
                   </thead>
                   <tbody class="text-center">
                       @foreach ($data->supir as $key=>$item)
                           <tr>
                               <td>{{ $key+1 }}</td>
                               <td>{{ $item->nama_supir }}</td>
                               <td>{{ $item->no_hp }}</td>
                               <td>{{ $item->alamat }}</td>
                               <td>
                                   <img src="{{ asset('images/supir/'.$item->foto) }}" width="50" height="50" alt="">
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
@endsection