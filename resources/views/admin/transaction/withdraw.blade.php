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
                                <i class="fas fa-clipboard-list"></i>
                                รายการรออนุมัติเบิกถอน
                            </h5>
                        </div>
                    </div>
                    <div class="pagetitle">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">บันทึกรายการ</li>
                                <li class="breadcrumb-item active">อนุมัติรายการเบิกถอน</li>
                            </ol>
                        </nav>
                        <div class="col-md-12">
                            <table id="tableBasic" class="table table-striped table-borderless nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Trans::Code</th>
                                        <th class="text-center">ประเภท</th>
                                        <th>ผู้ทำรายการ</th>
                                        <th class="text-end">ยอดเงิน</th>
                                        <th class="text-center">วันที่ทำรายการ</th>
                                        <th class="text-center">สถานะ</th>
                                        <th class="text-center"><i class="fas fa-bars"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trans as $res)
                                    <tr>
                                        <td class="text-center">{{ $res->tran_code }}</td>
                                        <td class="text-center">
                                            <span class="{{ $res->ttype_color }} fw-bold">
                                                {!! $res->ttype_icon !!}
                                            </span>
                                            {{ $res->ttype_name }}  
                                        </td>
                                        <td>{{ $res->tran_create }}</td>
                                        <td class="text-end">
                                            <span class="fw-bold">
                                                {{ number_format($res->tran_total,2)." ฿" }}
                                            </span>
                                        </td>
                                        <td class="text-center">{{ DateTimeThai($res->created_at) }}</td>
                                        <td class="text-center">
                                            <span class="{{ $res->t_status_color }} fw-bold">
                                                {!! $res->t_status_icon !!}
                                            </span>
                                            {{ $res->t_status_name }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('withdraw.show',$res->tran_id) }}" class="badge bg-primary">
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
    </div>
</section>

@endsection
@section('script')

@endsection
