<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamslms.dreamguystech.com/laravel/public/instructor-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Jan 2023 16:59:31 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>RentaLin</title>

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
  
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    
        {{-- <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>


    <link rel="stylesheet" href="{{ asset('') }}assets/back/css/style.css">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>


    <style>
        .checked {
            color: orange;
        }
        input[type=time]::-webkit-datetime-edit-ampm-field {
        display: none;
        }
        @media print {
            body {
                visibility: hidden;
            }
            #wrap {
                visibility: visible;
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>

<body>

    <div class="main-wrapper">

        @include('layouts.base.back.partials.header')


        <div class="page-content instructor-page-content">
            <div class="container">
                <div class="row">
                    
                    @include('layouts.base.back.partials.sidebar')
                    
                    @yield('content')

                    

                </div>
            </div>
        </div>

        @include('layouts.base.back.partials.footer')

    </div>


    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    {{-- <script src="{{ asset('') }}assets/back/plugins/jquery/jquery.min.js"></script> --}}

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
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script src="{{ asset('') }}assets/back/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.debug.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script> --}}

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.7.1/jspdf.plugin.autotable.min.js"></script>
  <script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
        // $('#example').DataTable();

        @if (session('success'))
        Swal.fire(
            'Great !',
            '{{ session("success") }}',
            'success'
        )
        // swal("Great !", "{{ session('success') }}", "success");
        @endif ()
        
        @if (session('errors'))
        Swal.fire(
            'Oh No !',
            '{{ session("errors") }}',
            'error'
        )
        // swal("Oh No !", "{{ session('errors') }}", "errors");
        @endif ()

        });
    </script>

    @yield('script')
    <script>
        $(document).ready(function(){
            function exportTableToPDF() {
            }
            
            $('#exportButton').on('click', function() {
                console.log('export')
                var doc = new jsPDF();
                doc.autoTable({ html: '#datatable' });
                doc.save('table.pdf');
                // exportTableToPDF();
            });

            $('#print').on('click', function(){
                $("#wrap").show();
                window.print();

            })

            // window.jsPDF = window.jspdf.jsPDF;
        })
    </script>
</body>

<!-- Mirrored from dreamslms.dreamguystech.com/laravel/public/instructor-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Jan 2023 16:59:41 GMT -->

</html>