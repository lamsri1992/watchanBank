@extends('layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                   <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">
                                <i class="fas fa-money-check-alt"></i>
                                รายการรับซื้อ
                            </h5>
                        </div>
                        <div class="col-md-6 text-end" style="margin-top: 0.8rem;">
                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#newItem">
                                <i class="fas fa-folder-plus"></i>
                                สร้างรายการใหม่
                            </a>
                        </div>
                   </div>
                    <div class="pagetitle">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">ตั้งค่าระบบ</li>
                                <li class="breadcrumb-item active">รายการรับซื้อ</li>
                            </ol>
                        </nav>
                        <table id="tableBasic" class="table table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="">รายการ</th>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center"><i class="fa fa-bars"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $res)
                                <tr>
                                    <td class="text-center">{{ $res->item_id }}</td>
                                    <td class="">{{ $res->item_name }}</td>
                                    <td class="text-center">
                                        <span class="{{ 'text-'.$res->ast_color }}">
                                            {!! $res->ast_icon !!}
                                        </span>
                                        {{ $res->ast_name }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('item.show',$res->item_id) }}" class="badge bg-primary">
                                            <i class="fas fa-search"></i>
                                            รายละเอียด
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
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="newItem" tabindex="-1" aria-labelledby="newItemLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('item.add') }}" method="get" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('get') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newItemLabel">
                        <i class="fas fa-folder-plus"></i>
                        สร้างรายการใหม่
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group" style="margin-bottom: 0.5rem;">
                        <label for="">รายการรับซื้อ</label>
                        <input type="text" name="item_name" class="form-control" placeholder="ระบุรายการรับซื้อ">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-success"
                        onclick="Swal.fire({
                            title: 'สร้างรายการรับซื้อใหม่ ?',
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

@endsection
