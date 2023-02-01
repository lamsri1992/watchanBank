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
    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <img src="{{ asset('img/wc_logo_2.png') }}" width="70%" alt="โครงการธนาคารขยะทองคำ โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา">
                            <div class="d-flex justify-content-center py-4">
                                <div class="logo d-flex align-items-center w-auto">
                                    <span class="d-none d-lg-block">โครงการธนาคารขยะทองคำ</span>
                                </div>
                            </div><!-- End Logo -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">กรุณาลงชื่อเข้าใช้งาน</h5>
                                    </div>
                                    <form class="row g-3 needs-validation" novalidate role="form" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        @if($message = Session::get('valid'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            <strong>Warning !!</strong>
                                            <span>{{ $message }}</span>
                                        </div>
                                        @endif
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">ชื่อผู้ใช้งาน</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">
                                                    <i class="fa fa-address-card"></i>
                                                </span>
                                                <input type="text" name="username" class="form-control" id="yourUsername" required placeholder="ระบุเลขที่บัตรประจำตัวประชาชน">
                                                <div class="invalid-feedback">กรณาระบุข้อมูลนี้</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="inputGroupPrepend2">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                                                <input type="password" name="password" class="form-control" id="yourPassword" required placeholder="หมายเลข 4 ตัวท้ายของเบอร์โทรศัพท์">
                                                <div class="invalid-feedback">กรณาระบุข้อมูลนี้</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-success w-100" type="submit">
                                                <i class="fas fa-sign-in-alt"></i>
                                                เข้าสู่ระบบ
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="credits text-center">
                                <p class="text-muted">
                                    พบปัญหาการใช้งาน กรุณาติดต่องานเทคโนโลยีสารสนเทศ <br>
                                    โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา
                                </p>
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main><!-- End #main -->

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
</body>

</html>
