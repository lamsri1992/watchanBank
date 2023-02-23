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
                                <i class="fa fa-user-circle"></i>
                                {{ $list->name }}
                            </h5>
                        </div>
                    </div>
                    <div class="pagetitle">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                                    type="button" role="tab" aria-controls="pills-profile" aria-selected="true">
                                    <i class="fa fa-user-edit"></i>
                                    ข้อมูลสมาชิก
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-account-tab" data-bs-toggle="pill" data-bs-target="#pills-account"
                                    type="button" role="tab" aria-controls="pills-account" aria-selected="false">
                                    <i class="fas fa-money-check-alt"></i>
                                    ข้อมูลบัญชี
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/member/'.$list->img) }}" class="img img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <form action="{{ route('member.update',$list->id) }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('POST') }}
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="form-group" style="margin-bottom: 0.5rem;">
                                                        <label for="">Username</label>
                                                        <input type="text" name="username" class="form-control" placeholder="ระบุชื่อสมาชิก" value="{{ $list->username }}">
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 0.5rem;">
                                                        <label for="">ชื่อสมาชิก</label>
                                                        <input type="text" name="name" class="form-control" placeholder="ระบุชื่อสมาชิก" value="{{ $list->name }}">
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 0.5rem;">
                                                        <label for="">CID</label>
                                                        <input type="text" name="cid" class="form-control" placeholder="ระบุหมายเลข 13 หลัก" value="{{ $list->cid }}">
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 0.5rem;">
                                                        <label for="">เพศ</label>
                                                        <select name="gender" class="form-select">
                                                            <option>กรุณาเลือก</option>
                                                            @foreach ($gender as $res)
                                                            <option value="{{ $res->g_id }}" {{ ($res->g_id == $list->gender) ? 'SELECTED' : '' }}>
                                                                {{ $res->g_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 0.5rem;">
                                                        <label for="">ฝ่าย/หน่วยงาน</label>
                                                        <select name="dept" class="form-select">
                                                            <option>กรุณาเลือก</option>
                                                            @foreach ($dept as $res)
                                                            <option value="{{ $list->department }}" {{ ($res->dept_id == $list->department) ? 'SELECTED' : '' }}>
                                                                {{ $res->dept_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 0.5rem;">
                                                        <label for="">เบอร์โทร</label>
                                                        <input type="text" name="tel" class="form-control" placeholder="ระบุเบอร์โทร" value="{{ $list->tel }}">
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 0.5rem;">
                                                        <label for="">Email</label>
                                                        <input type="email" name="email" class="form-control" placeholder="ระบุ Email" value="{{ $list->email }}">
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 0.5rem;">
                                                        <label for="">ที่อยู่</label>
                                                        <input type="text" name="address" class="form-control" placeholder="ระบุที่อยู่" value="{{ $list->address }}">
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 0.5rem;">
                                                        <label for="">Line Token</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="line_token" class="form-control" placeholder="ระบุ Line Token" value="{{ $list->line_token }}">
                                                            <a href="#" class="input-group-text" id="basic-addon2">
                                                                <i class="fab fa-line text-success"></i>&nbsp;TestLine
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">รูปภาพ</label>
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
                                                        <img id="preview" class="img img-fluid">
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <button type="button" class="btn btn-success"
                                                        onclick="Swal.fire({
                                                            title: 'แก้ไขข้อมูล ?',
                                                            text: '{{ $list->name }}',
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
                                                        })"><i class="fas fa-save"></i> แก้ไขข้อมูล
                                                    </button>
                                                    <a href="#" class="btn btn-danger">
                                                        <i class="fas fa-unlock"></i>
                                                        Reset รหัสผ่าน
                                                    </a>
                                                </div>
                                            </div>
                                        </form>   
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
                                <ol class="list-group list-group-numbered">
                                    @foreach ($accn as $res)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">ACC-NO. {{ $res->acc_no }}</div>
                                            <small class="text-muted">{{ $res->acc_note }}</small> <br>
                                            ยอดเงินในบัญชี <b>{{ number_format($res->acc_amount,2)." ฿" }}</b>
                                            <br>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#withdraw">
                                                <i class="fas fa-comments-dollar"></i>
                                                ทำรายการเบิกถอน
                                            </button>
                                        </div>
                                        <span class="badge bg-{{ $res->ast_color }} rounded-pill">
                                            {!! $res->ast_icon !!}
                                            {{ $res->ast_name }}
                                        </span>
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="withdraw" tabindex="-1" aria-labelledby="withdrawLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('user.withdraw') }}" method="get">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="withdrawLabel">
                        <i class="fas fa-comments-dollar"></i>
                        ทำรายการเบิกถอน
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">
                            <i class="bi bi-piggy-bank"></i>
                            ยอดเงินในบัญชี
                        </label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext fw-bold" value="{{ number_format($res->acc_amount,2)." ฿" }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">
                            <i class="bi bi-coin"></i>
                            ระบุยอดเบิกถอน
                        </label>
                        <div class="col-sm-9">
                            <input type="number" name="amount" class="form-control" placeholder="ยอดเบิกขั้นต่ำ 100.00 ฿">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-success"
                        onclick="Swal.fire({
                            title: 'ยืนยันการทำรายการเบิกถอน ?',
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
                        })"><i class="fa fa-plus-circle"></i> บันทึกรายการเบิกถอน
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                        ปิดหน้าต่าง
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
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
