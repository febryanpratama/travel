<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from dreamslms.dreamguystech.com/laravel/public/forgot-password by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Jan 2023 17:00:43 GMT -->
   <!-- Added by HTTrack -->
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <!-- /Added by HTTrack -->
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Dreams LMS</title>
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}assets/back/img/favicon.svg">
      <link rel="stylesheet" href="{{ asset('') }}assets/back/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="{{ asset('') }}assets/back/css/feather.css">
      <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/select2/css/select2.min.css">
      <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
      <link rel="stylesheet" href="{{ asset('') }}assets/back/css/owl.carousel.min.css">
      <link rel="stylesheet" href="{{ asset('') }}assets/back/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/slick/slick.css">
      <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/slick/slick-theme.css">
      <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/feather/feather.css">
      <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/dropzone/dropzone.min.css">
      <link rel="stylesheet" href="{{ asset('') }}assets/back/plugins/aos/aos.css">
      <link rel="stylesheet" href="{{ asset('') }}assets/back/css/style.css">

      <style>
        .hide {
            display: none;
        }
      </style>
   </head>
   <body>
      <div class="main-wrapper">
         <div class="row">
            <div class="col-md-6 login-bg">
               <div class="owl-carousel login-slide owl-theme">
                  <div class="welcome-login">
                     <div class="login-banner">
                        <img src="{{ asset('') }}assets/back/img/login-img.png" class="img-fluid" alt="Logo">
                     </div>
                     <div class="mentor-course text-center">
                        <h2>Selamat Datang di <br> RentaLin.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                     </div>
                  </div>
                  <div class="welcome-login">
                     <div class="login-banner">
                        <img src="{{ asset('') }}assets/back/img/login-img.png" class="img-fluid" alt="Logo">
                     </div>
                     <div class="mentor-course text-center">
                        <h2>Selamat Datang di <br> RentaLin.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                     </div>
                  </div>
                  <div class="welcome-login">
                     <div class="login-banner">
                        <img src="{{ asset('') }}assets/back/img/login-img.png" class="img-fluid" alt="Logo">
                     </div>
                     <div class="mentor-course text-center">
                        <h2>Selamat Datang di <br> RentaLin.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 login-wrap-bg">
               <div class="login-wrapper">
                  <div class="loginbox">
                     <div class="img-logo">
                        {{-- <img src="{{ asset('') }}assets/back/img/logo.svg" class="img-fluid" alt="Logo"> --}}
                                <span><h2 style="color: #ff875a">RentaLin</h2></span>

                        <div class="back-home">
                           <a href="index.html">Back to Home</a>
                        </div>
                     </div>
                     <h1>Lupa Password ?</h1>
                     <div class="reset-password">
                        <p>Masukkan email anda untuk reset password.</p>
                     </div>
                     <form action="{{ url('auth/forgot-password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                           <label class="form-control-label">Email</label>
                           <input type="email" class="form-control" name="email" placeholder="Masukkan email" id="email">
                        </div>
                        <div class="form-group hide" id="password">
                            <label class="form-control-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter your email address">
                        </div>
                        <div class="d-grid">
                           <button class="btn btn-start" type="submit">Submit</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="{{ asset('') }}assets/back/plugins/jquery/jquery.min.js"></script>
      <script src="{{ asset('') }}assets/back/js/bootstrap.bundle.min.js"></script>
      <script src="{{ asset('') }}assets/back/plugins/select2/js/select2.min.js"></script>
      <script src="{{ asset('') }}assets/back/js/ckeditor.js"></script>
      <script src="{{ asset('') }}assets/back/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
      <script src="{{ asset('') }}assets/back/plugins/countup/jquery.waypoints.min.js"></script>
      <script src="{{ asset('') }}assets/back/plugins/countup/jquery.counterup.min.js"></script>
      <script src="{{ asset('') }}assets/back/js/owl.carousel.min.js"></script>
      <script src="{{ asset('') }}assets/back/plugins/slick/slick.js"></script>
      <script src="{{ asset('') }}assets/back/plugins/feather/feather.min.js"></script>
      <script src="{{ asset('') }}assets/back/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
      <script src="{{ asset('') }}assets/back/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
      <script src="{{ asset('') }}assets/back/plugins/apexchart/apexcharts.min.js"></script>
      <script src="{{ asset('') }}assets/back/plugins/apexchart/chart-data.js"></script>
      <script src="{{ asset('') }}assets/back/js/circle-progress.min.js"></script>
      <script src="{{ asset('') }}assets/back/plugins/dropzone/dropzone.min.js"></script>
      <script src="{{ asset('') }}assets/back/js/validation.js"></script>
      <script src="{{ asset('') }}assets/back/plugins/aos/aos.js"></script>
      <script src="{{ asset('') }}assets/back/js/script.js"></script> 

      <script>
        $(document).ready(function(){
            $('#email').on('change', function(){
                // console.log('test');

                var email = $(this).val();

                $.ajax({
                    url: "{{ url('api/check-mail') }}",
                    type: "POST",
                    dataType: 'JSON',
                    data: {
                        "email": email
                    },
                    success: function(response){
                        // console.log(response)
                        if(response.status == true){
                            $('#password').removeClass('hide')
                        }else{
                            $('#password').addClass('hide')
                        }
                    }
                })
            })
        })
      </script>
   </body>
   
   <!-- Mirrored from dreamslms.dreamguystech.com/laravel/public/forgot-password by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Jan 2023 17:00:43 GMT -->
</html>