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
               <a href="https://dreamslms.dreamguystech.com/laravel/public/instructor-profile"><img src="http://127.0.0.1:8000/images/rental" alt="" class="img-fluid"></a>
               <div class="course-name">
                  <h4><a href="#">Avatar Kamu</a></h4>
                  <p>PNG atau JPG dan tidak lebih dari 800px.</p>
               </div>
            </div>
            <div class="profile-share d-flex align-items-center justify-content-center">
               <a href="javascript:;" class="btn btn-success"></a>
            </div>
         </div>
         <div class="checkout-form personal-address add-course-info">
            <div class="personal-info-head">
               <h4>Detail Pribadi</h4>
               <p>Ubah Informasi pribadi anda.</p>
            </div>
            <form action="http://127.0.0.1:8000/admin/rental/store" method="POST" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="tHc2tZPPSvFCnEa7rbiFPVdyTQ75AS5jx9PdiD9O">                <input type="hidden" name="latitude" id="latitude">
               <input type="hidden" name="longitude" id="longitude">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label class="form-control-label">Daftar Sebagai  </label>
                        <select name="tipe" class="form-control daftar">
                           <option value="" selected="" disabled="">Pilih</option>
                           <option value="rental">Rental</option>
                           <option value="perorangan">Perorangan</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row" id="kolom">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-control-label">Nama Rental Perorangan</label>
                        <input type="text" class="form-control" name="nama_rental" placeholder="Nama Rental ..">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-control-label">Nama Pemilik Rental Perorangan</label>
                        <input type="text" class="form-control" name="nama_pemilik" placeholder="Nama Pemilik Rental ..">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-control-label">Nomor BPKB</label>
                        <input type="text" class="form-control" name="no_ijin_usaha" placeholder="Nomor Ijin Rental ..">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-control-label">Foto Rental</label>
                        <input type="file" class="form-control" name="foto_rental" placeholder="Alamat Rental ..">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-control-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter your email address">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-control-label">Password</label>
                        <div class="pass-group" id="passwordInput">
                           <input type="password" class="form-control pass-input" name="password" placeholder="Enter your password">
                           <span class="toggle-password feather-eye"></span>
                           <span class="pass-checked"><i class="feather-check"></i></span>
                        </div>
                        <div class="password-strength" id="passwordStrength">
                           <span id="poor"></span>
                           <span id="weak"></span>
                           <span id="strong"></span>
                           <span id="heavy"></span>
                        </div>
                        <div id="passwordInfo"></div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-control-label">Alamat Rental Perorangan</label>
                        <textarea placeholder="Enter Area name to populate Latitude and Longitude" rows="2" class="form-control" name="alamat_rental" onfocus="initializeAutocomplete()" id="locality" autocomplete=""></textarea>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                  </div>
               </div>
               <div class="d-grid">
                  <button class="btn btn-primary btn-start" type="submit">Buat Akun</button>
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
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection