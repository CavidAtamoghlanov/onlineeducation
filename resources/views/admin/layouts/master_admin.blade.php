<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('studentFront/img/Fav Icon.png') }}" type="image/icon type">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


    <link rel="stylesheet" href="{{ asset('adminFront/plugins/ijaboCropTool/ijaboCropTool.min.css') }}">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminFront/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('adminFront/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminFront/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('adminFront/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminFront/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminFront/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminFront/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminFront/plugins/summernote/summernote-bs4.min.css') }}">


    @if (request()->is('admin/examp-resualt*') || request()->is('admin/allteacher*') || request()->is('admin/allstudent*') || request()->is('admin/alltelim*') || request()->is('admin/accept-user*'))
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('adminFront/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{ asset('adminFront/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{ asset('adminFront/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
        <!-- Theme style -->
    @endif



</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
       @include('admin.layouts.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
       @include('admin.layouts.navigation')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1>@yield('page_title')</h1>
                    </div>

                  </div>
                </div><!-- /.container-fluid -->
              </section>

            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        {{-- / footer  --}}
        @include('admin.layouts.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->




    <!-- jQuery -->
    <script src="{{ asset('adminFront/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminFront/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminFront/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @if (request()->is('admin/examp-resualt*') || request()->is('admin/allteacher*') || request()->is('admin/allstudent*') || request()->is('admin/alltelim*') || request()->is('admin/accept-user*'))
        {{-- butun muellimler sehifesi  ucun --}}
        <script src="{{ asset('adminFront/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('adminFront/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('adminFront/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('adminFront/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('adminFront/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('adminFront/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('adminFront/plugins/jszip/jszip.min.js')}}"></script>
        <script src="{{ asset('adminFront/plugins/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{ asset('adminFront/plugins/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{ asset('adminFront/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('adminFront/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{ asset('adminFront/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
        {{-- butun muellimler sehifesi  ucun --}}
    @endif

    <script src="{{ asset('adminFront/plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>

    <!-- ChartJS -->
    <script src="{{ asset('adminFront/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('adminFront/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('adminFront/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('adminFront/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('adminFront/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('adminFront/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminFront/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminFront/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('adminFront/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('adminFront/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminFront/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminFront/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('adminFront/dist/js/pages/dashboard.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('adminFront/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- AdminLTE App -->

    <!-- Page specific script -->
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>



    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
        $(function() {
            bsCustomFileInput.init();



            // change personal info
            $('#AdminInfoForm').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    url:$(this).attr('action'),
                    method:$(this).attr('method'),
                    data:new FormData(this),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    befosend:function(){
                        $(document).find('span.error-text').text('');
                    },
                    success:function(data){
                        if(data.status == 0)
                        {
                            $.each(data.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }
                        else
                        {
                            // $('#AdminInfoForm')[0].reset();
                            $('.admin_name').each(function(){
                                $(this).html($('#AdminInfoForm').find($('input[name="name"]')).val());
                            });
                            $('.admin_surname').each(function(){
                                $(this).html($('#AdminInfoForm').find($('input[name="surname"]')).val());
                            });
                            alert(data.msg);
                        }
                    }

                });
            });


            $(document).on('click','#change_picture_btn', function(){
                $('#admin_image').click();
            });




            $('#admin_image').ijaboCropTool({
                preview : '.admin_picture',
                setRatio:1,
                allowedExtensions: ['jpg', 'jpeg','png'],
                buttonsText:['CROP','QUIT'],
                buttonsColor:['#30bf7d','#ee5155', -15],
                processUrl:'{{ route("admin.UpdateProfilImage") }}',
                    //   withCSRF:['_token','{{ csrf_token() }}'],
                onSuccess:function(message, element, status){
                    alert(message);
                },
                onError:function(message, element, status){
                    alert(message);
                }
            });


       //    change password
       $('#changePasswordAdminForm').on('submit', function(e){
         e.preventDefault();
         $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                  $('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                $('#changePasswordAdminForm')[0].reset();
                alert(data.msg);
              }
            }
         });
        });








        });


    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
</body>

</html>
