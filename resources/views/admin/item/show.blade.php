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
                                <i class="fa fa-user-circle"></i>
                                {{ $list->item_name }}
                            </h5>
                        </div>
                    </div>
                    <div class="pagetitle">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">ตั้งค่าระบบ</li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('item.list') }}">
                                        รายการรับซื้อ
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{ $list->item_name }}
                                </li>
                            </ol>
                        </nav>
                        <div class="row">
                            <div class="card-body">
                                <form action="{{ route('item.update',$list->item_id) }}" method="get" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('get') }}
                                    <div class="modal-content">
                                        <div class="modal-body">
                                           <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="margin-bottom: 0.5rem;">
                                                        <label for="" style="font-weight:bold;">รายการรับซื้อ</label>
                                                        <input type="text" name="item_name" class="form-control" placeholder="ระบุรายการรับซื้อ" value="{{ $list->item_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="margin-bottom: 0.5rem;">
                                                        <label for="" style="font-weight:bold;">สถานะ</label>
                                                        <select name="item_status" class="form-select">
                                                            <option>กรุณาเลือก</option>
                                                            @foreach ($stat as $res)
                                                            <option value="{{ $res->ast_id }}" {{ ($res->ast_id  == $list->item_status) ? 'SELECTED' : '' }}>
                                                                {{ $res->ast_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                           </div>
                                        </div>
                                        <div class="text-start">
                                            <button type="button" class="btn btn-sm btn-success"
                                                onclick="Swal.fire({
                                                    title: 'แก้ไขรายการรับซื้อ ?',
                                                    text: 'หากแก้ไขรายการนี้แล้ว การฝากขายทั้งหมดจะถูกเปลี่ยน',
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
                                                })"><i class="fa fa-save"></i> แก้ไขรายการรับซื้อ
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="row" style="margin-bottom: 0.5rem;">
                                    <div class="col-md-6">
                                        <span style="font-weight:bold;">ตารางกำหนดราคารับซื้อ</span>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#newPrice">
                                            <i class="fas fa-plus-circle"></i>
                                            เพิ่มราคาใหม่
                                        </a>
                                    </div>
                                </div>
                                <table id="tableBasic" class="table table-borderless table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ราคารับซื้อ</th>
                                            <th>วันที่สร้าง</th>
                                            <th><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($price as $res)
                                        <tr>
                                            <td>{{ $res->prc_id }}</td> 
                                            <td>{{ $res->prc_price." ฿" }}</td>
                                            <td>{{ DateTimeThai($res->prc_created_at) }}</td>
                                            <td>
                                                @if ($res->prc_status == 1)
                                                    <small class="text-muted">
                                                        <i>ใช้ราคานี้อยู่</i>
                                                    </small>
                                                @else
                                                <a href="{{ route('price.set',$res->prc_id) }}" class="badge bg-success" onclick="confirmation(event)">
                                                    <i class="fas fa-check-circle"></i>
                                                    กำหนดใช้ราคานี้
                                                </a>
                                                @endif
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
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="newPrice" tabindex="-1" aria-labelledby="newPriceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('item.price') }}" method="get" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('get') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPriceLabel">
                        <i class="fas fa-plus-circle"></i>
                        เพิ่มราคาใหม่
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group" style="margin-bottom: 0.5rem;">
                        <label for="">รายการรับซื้อ</label>
                        <input type="text" name="item_name" class="form-control" placeholder="ระบุรายการรับซื้อ" value="{{ $list->item_name }}" readonly>
                        <input type="hidden" name="item_id" class="form-control" placeholder="ระบุรายการรับซื้อ" value="{{ $list->item_id }}">
                    </div>
                    <div class="form-group" style="margin-bottom: 0.5rem;">
                        <label for="">ราคารับซื้อ</label>
                        <input type="number" name="prc_price" class="form-control" placeholder="กำหนดราคารับซื้อ">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-success"
                        onclick="Swal.fire({
                            title: 'เพิ่มราคารับซื้อใหม่ ?',
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
    function confirmation(e) {
    e.preventDefault();

    var url = e.currentTarget.getAttribute('href')
    
    Swal.fire({
        title: 'เปลี่ยนราคารับซื้อ ?',
        text: 'เมื่อยืนยันแล้วจะมีผลทันที',
        showCancelButton: true,
        confirmButtonText: `บันทึก`,
        cancelButtonText: `ยกเลิก`,
        icon: 'success',
    }).then((result) => {
        if (result.value) {
            window.location.href=url;
        }
    })
}
</script>
@endsection
