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
                                รายการบัญชี
                            </h5>
                        </div>
                        <div class="col-md-6 text-end" style="margin-top: 0.8rem;">
                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#newMember">
                                <i class="fas fa-folder-plus"></i>
                                เปิดบัญชีใหม่
                            </a>
                        </div>
                   </div>
                    <div class="pagetitle">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">ระบบสมาชิก</li>
                                <li class="breadcrumb-item active">รายการบัญชี</li>
                            </ol>
                        </nav>
                        <table id="tableBasic" class="table table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">ACC-NO.</th>
                                    <th>ชื่อผู้ถือบัญชี</th>
                                    <th class="text-center">ยอดเงิน</th>
                                    <th class="text-center">วันที่เปิดบัญชี</th>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">หมายเหตุ</th>
                                    <th class="text-center"><i class="fa fa-bars"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $res)
                                <tr>
                                    <td class="text-center">{{ $res->acc_id }}</td>
                                    <td class="text-center">{{ $res->acc_no }}</td>
                                    <td>{{ $res->name }}</td>
                                    <td class="text-center fw-bold">{{ number_format($res->acc_amount,2)." ฿" }}</td>
                                    <td class="text-center">{{ DateThai($res->acc_open) }}</td>
                                    <td class="text-center">
                                        <small>
                                            <span class="{{ 'text-'.$res->ast_color }}">
                                                {!! $res->ast_icon !!}
                                            </span>
                                            {{ $res->ast_name }}
                                        </small>
                                    </td>
                                    <td class="text-center">
                                        <small class="text-muted">
                                            {{ $res->acc_note }}
                                        </small>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="badge bg-primary">
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
</section>

@endsection
@section('script')

@endsection
