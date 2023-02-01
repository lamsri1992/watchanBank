@extends('layouts.app')
@section('content')
<style>
    .file {
        visibility: hidden;
        position: absolute;
    }
</style>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">
                                <i class="fas fa-clipboard-list"></i>
                                รายการรออนุมัติเบิกถอน
                            </h5>
                        </div>
                    </div>
                    <div class="pagetitle">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">บันทึกรายการ</li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('tran.withdraw') }}">
                                        อนุมัติรายการเบิกถอน
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Trans::Code {{ "[ ".$trans->tran_code." ]" }}</li>
                            </ol>
                        </nav>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-4 col-form-label fw-bold">Trans::Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext" value="{{ $trans->tran_code }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-4 col-form-label fw-bold">ประเภท</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext" value="{{ $trans->ttype_name }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-4 col-form-label fw-bold">ยอดเงิน</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext" value="{{ number_format($trans->tran_total,2)." ฿" }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-4 col-form-label fw-bold">ผู้ทำรายการ</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext" value="{{ $trans->tran_create }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-4 col-form-label fw-bold">วันที่ทำรายการ</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control-plaintext" value="{{ DateTimeThai($trans->created_at) }}">
                                        </div>
                                    </div>
                                </div>
                                @if ($trans->tran_status == 1)
                                <div class="col-md-6">
                                    <form action="{{ route('withdraw.approve',$trans->tran_id) }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }}
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">แนบสลิปการโอนเงิน</label>
                                                    <input type="file" name="e_img" class="file" accept="image/*">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                                                        <button type="button" class="browse btn btn-secondary btn-sm">
                                                            <i class="fas fa-image"></i>
                                                            เลือกรูปภาพ
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <img id="preview" class="img img-fluid" width="50%">
                                                </div>
                                            </div>
                                            <div style="margin-top:0.5rem;">
                                                <button type="button" class="btn btn-success"
                                                    onclick="Swal.fire({
                                                        title: 'ยืนยันการโอนจ่าย ?',
                                                        text: '{{ number_format($trans->tran_total,2).' ฿' }}',
                                                        showCancelButton: true,
                                                        confirmButtonText: `บันทึก`,
                                                        cancelButtonText: `ยกเลิก`,
                                                        icon: 'success',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            form.submit();
                                                        } else if (result.isDenied) {
                                                            form.reset();
                                                        }
                                                    })"><i class="fas fa-check-circle"></i> อนุมัติรายการเบิกถอน
                                                </button>
                                            </div>
                                        </div>
                                    </form>   
                                </div>
                                @endif
                                @if ($trans->tran_status == 2)
                                    <div class="col-md-6">
                                        <span class="fw-bold">
                                            <i class="fas fa-check-circle text-success"></i>
                                            รายการถูกอนุมัติแล้ว
                                        </span> <hr>
                                        <img src="{{ asset('img/slip/'.$trans->tran_slip) }}" class="img img-fluid" width="50%">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
<script>
    $(document).on("click", ".browse", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });
    
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("preview").src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection
