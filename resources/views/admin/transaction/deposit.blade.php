@extends('layouts.app')
@section('content')
<style>
    .select2-selection__rendered {
        line-height: 36px !important;
    }

    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .select2-selection__arrow {
        height: 39px !important;
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
                                <i class="fas fa-clipboard-check"></i>
                                บันทึกรายการ
                            </h5>
                        </div>
                    </div>
                    <div class="pagetitle">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">บันทึกรายการ</li>
                                <li class="breadcrumb-item active">รายการรับฝากเข้า</li>
                            </ol>
                        </nav>
                        <div class="container">
                            <!-- Horizontal Form -->
                            <form action="{{ route('tran.deposit') }}" method="get">
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">ผู้ทำรายการฝาก</label>
                                    <div class="col-sm-10">
                                        <select name="name" class="basic-select2">
                                            <option></option>
                                            @foreach($member as $res)
                                                <option value="{{ $res->id }}">
                                                    {{ $res->name." [ ACC-NO : ".$res->acc_no." ]" }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">รายการนำฝาก</label>
                                    <div class="col-sm-10">
                                        <select name="item" class="basic-select2">
                                            <option></option>
                                            @foreach($item as $res)
                                                <option value="{{ $res->item_id }}">
                                                    {{ $res->item_name." :: ".$res->prc_price."฿" }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">จำนวน/กิโลกรัม</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="amount" class="form-control"
                                            placeholder="ระบุเฉพาะตัวเลข และทศนิยม 2 ตำแหน่ง">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">ผู้บันทึกรายการ</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="create" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10 offset-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1" checked>
                                            <label class="form-check-label" for="gridCheck1">
                                                แจ้งเตือนผ่าน
                                                <span class="badge bg-light text-success">
                                                    <i class="fab fa-line"></i>
                                                    LineNotify
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-sm btn-success"
                                        onclick="Swal.fire({
                                            title: 'บันทึกการนำฝาก ?',
                                            text: 'กรุณาตรวจสอบข้อมูลให้ถูกต้องก่อนกดบันทึก',
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
                                        })">
                                        <i class="fas fa-plus-circle"></i>
                                        เพิ่มรายการ
                                    </button>
                                </div>
                            </form><!-- End Horizontal Form -->
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <h5 class="card-title">
                                <i class="fas fa-history"></i>
                                รายการรับเข้าล่าสุด
                            </h5>
                            <table id="tableBasic" class="table table-striped table-borderless nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Trans::Code</th>
                                        <th>ผู้นำฝาก</th>
                                        <th>รายการนำฝาก</th>
                                        <th class="text-center">จำนวน/กิโลกรัม</th>
                                        <th class="text-center">วันที่</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($history as $res)
                                    <tr>
                                        <td class="text-center">{{ $res->tran_code }}</td>
                                        <td>{{ $res->name }}</td>
                                        <td>{{ $res->item_name }}</td>
                                        <td class="text-center">{{ $res->tran_amount }}</td>
                                        <td class="text-center">{{ DateTimeThai($res->created_at) }}</td>
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
</section>

@endsection
@section('script')

@endsection
