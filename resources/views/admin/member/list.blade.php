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
                                <i class="fa fa-users"></i>
                                รายชื่อสมาชิก
                            </h5>
                        </div>
                        <div class="col-md-6 text-end" style="margin-top: 0.8rem;">
                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#newMember">
                                <i class="fas fa-user-plus"></i>
                                ลงทะเบียนสมาชิกใหม่
                            </a>
                        </div>
                   </div>
                    <div class="pagetitle">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">ระบบสมาชิก</li>
                                <li class="breadcrumb-item active">รายชื่อสมาชิก</li>
                            </ol>
                        </nav>
                        <table id="tableBasic" class="table table-borderless table-striped compact">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center" width="5%">รูปภาพ</th>
                                    <th>ชื่อสมาชิก</th>
                                    <th>ฝ่าย</th>
                                    <th class="text-center">เบอร์โทร</th>
                                    <th class="text-center">วันที่สร้าง</th>
                                    <th class="text-center"><i class="fa fa-bars"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $res)
                                <tr>
                                    <td class="text-center">{{ $res->id }}</td>
                                    <td>
                                        <img src="{{ asset('img/member/'.$res->img) }}" height="60" width="50">
                                    </td>
                                    <td>{{ $res->name }}</td>
                                    <td>{{ $res->dept_name }}</td>
                                    <td class="text-center">{{ $res->tel }}</td>
                                    <td class="text-center">{{ DateTimeThai($res->mem_created_at) }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('member.show',$res->id) }}" class="badge bg-primary">
                                            <i class="fas fa-search"></i> รายละเอียด
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Modal -->
<div class="modal fade" id="newMember" tabindex="-1" aria-labelledby="newMemberLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('member.add') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMemberLabel">
                        <i class="fas fa-user-plus"></i>
                        ลงทะเบียนสมาชิกใหม่
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group" style="margin-bottom: 0.5rem;">
                        <label for="">ชื่อสมาชิก</label>
                        <input type="text" name="name" class="form-control" placeholder="ระบุชื่อสมาชิก">
                    </div>
                    <div class="form-group" style="margin-bottom: 0.5rem;">
                        <label for="">CID</label>
                        <input type="text" name="cid" class="form-control" placeholder="ระบุหมายเลข 13 หลัก">
                    </div>
                    <div class="form-group" style="margin-bottom: 0.5rem;">
                        <label for="">เพศ</label>
                        <select name="gender" class="form-select">
                            <option>กรุณาเลือก</option>
                            @foreach ($gender as $res)
                            <option value="{{ $res->g_id }}">• {{ $res->g_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="margin-bottom: 0.5rem;">
                        <label for="">ฝ่าย/หน่วยงาน</label>
                        <select name="dept" class="form-select">
                            <option>กรุณาเลือก</option>
                            @foreach ($dept as $res)
                            <option value="{{ $res->dept_id }}">• {{ $res->dept_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="margin-bottom: 0.5rem;">
                        <label for="">เบอร์โทร</label>
                        <input type="text" name="tel" class="form-control" placeholder="ระบุเบอร์โทร">
                    </div>
                    <div class="form-group" style="margin-bottom: 0.5rem;">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="ระบุ Email">
                    </div>
                    <div class="form-group" style="margin-bottom: 0.5rem;">
                        <label for="">ที่อยู่</label>
                        <input type="text" name="address" class="form-control" placeholder="ระบุที่อยู่">
                    </div>
                    <div class="form-group" style="margin-bottom: 0.5rem;">
                        <label for="">Line Token</label>
                        <input type="text" name="line_token" class="form-control" placeholder="ระบุ Line Token">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-success"
                        onclick="Swal.fire({
                            title: 'ลงทะเบียนสมาชิกใหม่ ?',
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
                        })"><i class="fa fa-plus-circle"></i> เพิ่มใหม่
                    </button>
                    <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">
                        <i class="fa fa-times"></i> 
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
