@extends('layouts.base.front.main')
@section('content')
<!-- btc tittle Wrapper Start -->
<div class="btc_tittle_main_wrapper">
   <div class="btc_tittle_img_overlay"></div>
   <div class="container">
      <div class="row">
         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
            <div class="btc_tittle_left_heading">
               <h1>Checkout</h1>
            </div>
         </div>
         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
            <div class="btc_tittle_right_heading">
               <div class="btc_tittle_right_cont_wrapper">
                  <ul>
                     <li>
                        <a href="#">Beranda</a> <i class="fa fa-angle-right"></i>
                     </li>
                     <li>
                        <a href="#">Mobil</a> <i class="fa fa-angle-right"></i>
                     </li>
                     <li>Checkout</li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- btc tittle Wrapper End -->
<!-- x tittle num Wrapper Start -->
<div class="x_title_num_mian_Wrapper float_left">
   <div class="container">
      <div class="x_title_inner_num_wrapper float_left">
         <div class="x_title_num_heading">
            <h3>Pilih Mobil</h3>
            <p>Selesaikan Langkah Anda</p>
         </div>
         <div class="x_title_num_heading_cont">
            <div class="x_title_num_main_box_wrapper">
               <div class="x_icon_num">
                  <p>1</p>
               </div>
               <h5>Waktu & Tempat</h5>
            </div>
            <div class="x_title_num_main_box_wrapper">
               <div class="x_icon_num">
                  <p>2</p>
               </div>
               <h5>Detail</h5>
            </div>
            <div class="x_title_num_main_box_wrapper">
               <div class="x_icon_num">
                  <p>3</p>
               </div>
               <h5>Cart</h5>
            </div>
            <div
               class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3"
               >
               <div class="x_icon_num x_icon_num3">
                  <p>4</p>
               </div>
               <h5>checkout</h5>
            </div>
            <div
               class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3 x_title_num_main_box_wrapper_last"
               >
               <div class="x_icon_num x_icon_num3">
                  <p>5</p>
               </div>
               <h5>Sukses!</h5>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- x tittle num Wrapper End -->
<!-- x car book sidebar section Wrapper Start -->
<div class="x_car_book_sider_main_Wrapper float_left">
   <div class="container">
      <div class="row">
         <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="x_car_book_left_siderbar_wrapper float_left">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <!-- Filter Results -->
                     <div class="car-filter accordion x_inner_car_acc_accor">
                        <h3>Detail Order</h3>
                        <hr>
                        <!-- Resources -->
                        <div class="x_car_access_filer_top_img">
                           <img src="{{ asset('images/cars/'.$data->mobil->foto_mobil) }}" alt="car_img" class="img-fluid">
                           <h3>{{ $data->mobil->nama_mobil }}</h3>
                           <p>{{ App\Helpers\Format::formatRupiah($data->mobil->harga_sewa_mobil) }}k (1 day)</p>
                        </div>
                        <hr>
                        <!-- Company -->
                        <!-- Attributes -->
                        <div class="panel panel-default x_car_inner_acc_acordion_padding">
                           <div class="collapse show">
                              <div class="panel-body">
                                 <div class="x_car_acc_filter_date">
                                    <table class="table">
                                       <thead>
                                          <tr class="text-center">
                                             <th scope="col">QTY</th>
                                             <th scope="col">Rate</th>
                                             <th scope="col">Subtotal</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr class="text-center">
                                             <td>{{ App\Helpers\Format::days($data->tanggal_mulai, $data->tanggal_selesai) }} Day</td>
                                             <td>{{ App\Helpers\Format::formatRupiah($data->mobil->harga_sewa_mobil) }}k</td>
                                             <td>{{ App\Helpers\Format::formatRupiah($data->mobil->harga_sewa_mobil)*App\Helpers\Format::days($data->tanggal_mulai, $data->tanggal_selesai) }}k</td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <hr>
                        <div class="panel panel-default x_car_inner_acc_acordion_padding x_car_inner_acc_acordion_padding_last">
                           <div class="panel-heading car_checkout_caret">
                              <h5 class="panel-title">
                                 <a href="#"> Waktu Mulai &amp;</a>
                              </h5>
                           </div>
                           <div class="collapse show">
                              <div class="panel-body">
                                 <div class="x_car_acc_filter_date">
                                    <ul>
                                       <li>{{ Carbon\Carbon::parse($data->tanggal_mulai)->format('d M Y') }} @ {{ Carbon\Carbon::parse($data->tanggal_mulai)->format('H:i') }}</li>
                                       {{-- <li>Place </li> --}}
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <hr>
                        <div class="panel panel-default x_car_inner_acc_acordion_padding x_car_inner_acc_acordion_padding_last">
                           <div class="panel-heading car_checkout_caret">
                              <h5 class="panel-title">
                                 <a href="#"> Waktu Selesai &amp;</a>
                              </h5>
                           </div>
                           <div class="collapse show">
                              <div class="panel-body">
                                 <div class="x_car_acc_filter_date">
                                    <ul>
                                       <li>{{ Carbon\Carbon::parse($data->tanggal_selesai)->format('d M Y') }} @ {{ Carbon\Carbon::parse($data->tanggal_selesai)->format('H:i') }}</li>
                                       {{-- <li>Place </li> --}}
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <hr>
                        {{-- <div class="panel panel-default x_car_inner_acc_acordion_padding x_car_inner_acc_acordion_padding_last">
                           <div class="panel-heading car_checkout_caret">
                              <h5 class="panel-title">
                                 <a href="#"> Accessories</a>
                              </h5>
                           </div>
                           <div class="collapse show">
                              <div class="panel-body">
                                 <div class="x_car_acc_filter_date">
                                    <ul>
                                       <li>1x GPS <span>$19</span></li>
                                       <li>Insurance <span>$199</span></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <hr>
                        <div class="panel panel-default x_car_inner_acc_acordion_padding x_car_inner_acc_acordion_padding_last">
                           <div class="panel-heading car_checkout_caret">
                              <h5 class="panel-title">
                                 <a href="#"> Taxes &amp; Fees</a>
                              </h5>
                           </div>
                           <div class="collapse show">
                              <div class="panel-body">
                                 <div class="x_car_acc_filter_date">
                                    <ul>
                                       <li>Sales (1%) <span>$1</span></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <hr>
                        <div class="panel panel-default x_car_inner_acc_acordion_padding x_car_inner_acc_acordion_padding_last">
                           <div class="collapse show">
                              <div class="panel-body">
                                 <div class="x_car_acc_filter_date">
                                    <input type="text" placeholder="Coupon Code">
                                    <button type="submit">
                                    <i class="fa fa-arrow-right"></i>
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div> --}}
                        <div class="x_car_acc_filter_bottom_total">
                           <ul>
                              <li>Nama <span id="name"> </span></li>
                           </ul>
                           <ul class="mt-2">
                              <li>total <span id="total"> Rp. {{ number_format($data->mobil->harga_sewa_mobil*App\Helpers\Format::days($data->tanggal_mulai, $data->tanggal_selesai),'0') }}</span></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="x_carbooking_right_section_wrapper float_left">
               <div class="row">
                  <div class="col-md-12">
                     <div class="x_car_checkout_right_main_box_wrapper float_left">
                        <div class="car-filter order-billing margin-top-0">
                           <div class="heading-block text-left margin-bottom-0">
                              <h4>Detail Spesifikasi</h4>
                              {{-- <div class="pull-right checkout_login_btn">
                                 <ul>
                                    <li>
                                       <a href="#">Login <i class="fa fa-arrow-right"></i></a>
                                    </li>
                                 </ul>
                                 <p class="retrn">Returning customer?</p>
                              </div> --}}
                           </div>
                           <hr>
                           <form class="billing-form" id="myForm" method="POST" action="{{ url('checkout') }}" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="penyewaan_id" value="{{ $data->id }}">
                              {{-- <input type="hidden" name="total_price" value="" id="total_price"> --}}
                              {{-- <input type="hidden" name="fee" value="" id="fee"> --}}
                              <ul class="list-unstyled row">
                                 <li class="col-md-6">
                                    <label>Tipe Mobil *
                                    <input type="text" placeholder="" value="{{ $data->mobil->tipe_mobil }}" readonly class="form-control">
                                    </label>
                                 </li>
                                 <li class="col-md-6">
                                    <label>Merk Mobil *
                                    <input type="text" placeholder="" value="{{ $data->mobil->merk_mobil }}" readonly class="form-control">
                                    </label>
                                 </li>
                                 <li class="col-md-6">
                                    <label>Plat Mobil *
                                    <input type="text" placeholder="" value="{{ $data->mobil->plat_mobil }}" readonly class="form-control">
                                    </label>
                                 </li>
                                 {{-- <li class="col-md-6">
                                    <label>Year Mobil *
                                    <input type="text" placeholder="" value="{{ $data->mobil->year_car }}" readonly class="form-control">
                                    </label>
                                 </li> --}}
                                 <li class="col-md-6">
                                    <label>Kapasitas Mobil *
                                    <input type="text" placeholder="" value="{{ $data->mobil->kapasitas_mobil }} Penumpang" readonly class="form-control">
                                    </label>
                                 </li>
                                 {{-- <li class="col-md-6">
                                    <label>Door Mobil *
                                    <input type="text" placeholder="" value="{{ $data->mobil->door_car }} Door" readonly class="form-control">
                                    </label>
                                 </li>
                                 <li class="col-md-6">
                                    <label>Baggage Car *
                                    <input type="text" placeholder=""  value="{{ $data->mobil->bagage_car }} ltr" readonly class="form-control">
                                    </label>
                                 </li> --}}
                              </ul>
                              <hr>
                              <div class="payment-option">
                                 <div class="heading-block text-left margin-bottom-30">
                                    <h4>Pembayaran</h4>
                                 </div>
                                 <div class="radio">
                                    <input type="radio" name="channel_pembayaran" class="check" id="PembayaranAwal" value="Pembayaran Awal" checked>
                                    <label for="PembayaranAwal">Pembayaran Awal</label>
                                 </div>
                                 <div class="radio">
                                    <input type="radio" name="channel_pembayaran" class="check" id="Pelunasan" value="Pelunasan">
                                    <label for="Pelunasan">Pelunasan</label>
                                 </div>
                                 {{-- @foreach ($channel as $item)
                                 @endforeach --}}
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-md-6" id="InputPembayaranAwal">
                                    <label for="" class="control-label" id="namePembayaran">Nominal Pembayaran Awal</label>
                                    <input type="number" class="form-control" name="nominal" required>
                                </div>
                                <div class="col-md-6" >
                                    <label for="" class="control-label" >Upload Bukti Pembayaran</label>
                                    <input type="file" class="form-control" name="bukti_pembayaran" required>
                                </div>
                                {{-- <div class="col-md-6 hide" id="InputPelunasan">
                                    <label for="" class="control-label">Pelunasan</label>
                                    <input type="number" class="form-control" name="pelunasan" >
                                </div> --}}
                              </div>
                              <hr>
                              <hr>
                              <div class="row">
                                 <div class="col-md-6">
                                    <label for="" class="control-label">Lokasi Pengambilan Mobil</label>
                                    <div>
                                       <input type="radio" id="kantor" name="is_location" value="Ambil Sendiri" class="form-control-radio" required="required">
                                       <label for="kantor">Kantor Rental</label>
                                    </div>
                                    <div>
                                       <input type="radio" id="lokasi" name="is_location" value="Diantar" class="form-control-radio" required="required">
                                       <label for="lokasi">Lokasi Saya</label>
                                    </div>
                                 </div>
                              </div>
                              <hr>
                              {{-- {{ dd($data) }} --}}
                              <div class="checkbox car_checkout_chekbox">
                                 <input type="checkbox" id="c3" name="cb" disabled required>
                                 <label for="c3" id="c4">Saya telah Membaca dan Menerima </label><a href="#" style="color: blue" data-toggle="modal" data-target="#exampleModal"><span id="syaratketentuan"> Persyaratan &amp; Ketentuan *</span></a>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="contect_btn contect_btn_contact">
                        <div class="col-md-12 mt-1">
                           <ul>
                              <li>
                                 <button type="submit" form="myForm" class="btn btn-primary" disabled id="submit">Selesaikan Sekarang <i class="fa fa-arrow-right"></i></button>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- x car book sidebar section Wrapper End -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Syarat & Kontrak</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
            <div class="col-md-12">
               <label for="" class="control-label" style="padding: 1px"><h5>Detail Persyaratan</h5></label>
            </div>
         </div>
         @foreach ($data->rental->syarat as $k=>$it)
         <hr>
         <div class="row">
         {{-- <h4>Persyaratan</h4> --}}
            <div class="col-md-6">Persyaratan {{ $k+1}}</div>
            <div class="col-md-6"><p> <a href="{{ asset('files/persyaratan/'.$it->persyaratan) }}" style="color: red">Lihat Dokumen</a></p></div>
         </div>
         <hr>
         @endforeach

         <br>
         <br>
         <div class="row">
            <div class="col-md-12">
               <label for="" class="control-label" style="padding: 1px"><h5>Detail Kontrak</h5></label>
            </div>
         </div>
         @foreach ($data->rental->kontrak as $k=>$it)
         <hr>
         <div class="row">
         {{-- <h4>Persyaratan</h4> --}}
            <div class="col-md-6">Kontrak {{ $k+1}}</div>
            <div class="col-md-6"><p> <a href="{{ asset('files/persyaratan/'.$it->perjanjian) }}" style="color: red">Lihat Dokumen</a></p></div>
         </div>
         <hr>
         @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){

         // $("#myCheckBox").prop("disabled", true) 
         $('#c4').on('click', function(){
            // checkSyarat()
            // console.log("check")
            let element = document.getElementById('c3')
            console.log(element.getAttribute('disabled'))
            if(element.getAttribute('disabled') == ''){
               console.log('disabled')
               Swal.fire(
                        'Oh No !',
                        'Silahkan Baca Persyaratan & Ketentuan terlebih Dahulu !',
                        'error'
                     )
            }else{
               
               console.log("enable")

            }
         })

         $('#syaratketentuan').on('click', function(){
            let element = document.getElementById('c3')

            element.removeAttribute('disabled')

            // const checkedcb = $('#c3').is(':checked');
            $('#submit').removeAttr('disabled')

         })
        $('.check').on('change', function(){
            if($(this).is(':checked')){
                let code = $(this).val();
                // console.log(code)

                if (code == 'Pembayaran Awal') {
                    $('#namePembayaran').html('Nominal Pembayaran Awal')
                }else{
                    $('#namePembayaran').html('Nominal Pelunasan')
                }
                // let total = {{ $data->mobil->harga_mobil*App\Helpers\Format::days($data->start_date, $data->end_date) }}

                // $.ajax({
                //     url: "{{ url('api/calculator') }}",
                //     type: "POST",
                //     data: {
                //         "_token": "{{ csrf_token() }}",
                //         "code": code,
                //         "amount": total
                //     },
                //     success: function(response){

                //         // Response
                //         if(code != 'COD'){
                //             if(response.status == true){
                //                 let totalamount = (total + response.data[0].fee.flat)
                //                 let format = (totalamount).toLocaleString('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 })
                //                 $('#name').html(response.data[0].code);
                //                 $('#total').html(format);
                //                 $('#total_price').val(totalamount);
                //                 $('#fee').val(response.data[0].fee.flat);
                //             }else{
                //                 $('#name').html(response.data[0].code);
                //                 $('#total').html('Rp. 0');
                //                 $('#total_price').val(total);
                //                 $('#fee').val(0);
                //             }
                //         }else{
                //             let format = (total).toLocaleString('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 })
                //             $('#name').html('COD');
                //             $('#total').html(format);
                //             $('#total_price').val(total);
                //             $('#fee').val(0);
                //         }
                //     }
                // });
            }
        });

        
        
      //   console.log(checkedcb)
    })
</script>
@endsection
{{-- @section('script')
    <script>
      $('.check').on('change', function(){
         if($(this).is(':checked')){
            let code = $(this).val();
            let total = {{ $data->car->price_car*App\Helpers\Format::days($data->start_date, $data->end_date) }}

            $.ajax({
               url: "{{ url('api/calculator') }}",
               type: "POST",
               data: {
                  "_token": "{{ csrf_token() }}",
                  "code": code,
                  "amount": total
               },
               success: function(response){

                  // Response
                  if(code != 'COD'){
                     if(response.status == true){
                        let totalamount = (total + response.data[0].fee.flat)
                        let format = (totalamount).toLocaleString('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 })
                        $('#name').html(response.data[0].code);
                        $('#total').html(format);
                        $('#total_price').val(totalamount);
                        $('#code').val(response.data[0].code);
                        $('#fee').val(response.data[0].fee.flat);
                     }else{
                        alert("Error Calculator")
                     }
                  }else{
                     let format = (total).toLocaleString('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 })
                     $('#name').html('COD');
                     $('#total').html(format);
                     $('#code').val('COD');
                     $('#total_price').val(total);
                  }

               }
            })
         }
      })
    </script>
@endsection --}}