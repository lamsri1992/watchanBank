<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>โครงการธนาคารขยะทองคำ - Watchan Hospital</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('img/wc_logo_2.png') }}" rel="icon">
    <link href="{{ asset('template/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    
    <!-- Vendor CSS Files -->
    <link href="{{ asset('template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css' rel='stylesheet' />

    <!-- =======================================================
      * Template Name: NiceAdmin - v2.4.1
      * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      * Author: BootstrapMade.com
      * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
    @include('layouts.header')
    @if (Auth::user()->permission == 0)
    @include('layouts.user_side')
    @else
    @include('layouts.admin_side')
    @endif
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>โครงการธนาคารขยะทองคำ</h1>
            <small class="text-secondary">โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</small>
        </div>
        @yield('content')
    </main><!-- End #main -->
    @include('layouts.foot')
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('template/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('template/assets/js/main.js') }}"></script>
    <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function () {
            Chart.defaults.font.family = 'Prompt';
        });

        // DATATABLES
        $(document).ready(function () {
            $('#tableBasic').dataTable({
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                ordering: false,
                responsive: true,
                oLanguage: {
                    oPaginate: {
                        sFirst: '<small>หน้าแรก</small>',
                        sLast: '<small>หน้าสุดท้าย</small>',
                        sNext: '<small>ถัดไป</small>',
                        sPrevious: '<small>กลับ</small>'
                    },
                    sSearch: '<small><i class="fa fa-search"></i> ค้นหา</small>',
                    sInfo: '<small>ทั้งหมด _TOTAL_ รายการ</small>',
                    sLengthMenu: '<small>แสดง _MENU_ รายการ</small>',
                    sInfoEmpty: '<small>ไม่มีข้อมูล</small>'
                },
            });
        });

        // SELECT2
        $(document).ready(function() {
            $('.basic-select2').select2({ 
                width: '100%',
                placeholder: 'กรุณาเลือก',
            });
        });

        $(document).ready(function() {
            $('.basic-multiple').select2({
                width: '100%',
            });
        });

        $("select").on("select2:select", function (evt) {
        var element = evt.params.data.element;
        var $element = $(element);

        $element.detach();
            $(this).append($element);
            $(this).trigger("change");
        });
    </script>
    @if($message = Session::get('success'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                position: 'top-end',
                toast: true,
                showConfirmButton: false,
                timer: 5000
            });
                Toast.fire({
                icon: 'success',
                title: '{{ $message }}'
            })
        });
    </script>
    @endif
    @if($message = Session::get('error'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                position: 'top-end',
                toast: true,
                showConfirmButton: false,
                timer: 5000
            });
                Toast.fire({
                icon: 'error',
                title: '{{ $message }}'
            })
        });
    </script>
    @endif
    @if($errors->any())
        <script>
            Swal.fire({
                title: 'พบข้อผิดพลาด',
                icon: 'warning',
                html: '<div class="text-left"><ul>@foreach ($errors->all() as $error)' +
                    '<li>{{ $error }}</li>' +
                    '@endforeach</ul></div>',
            })
        </script>
    @endif
    @section('script')
    @show
</body>

</html>
