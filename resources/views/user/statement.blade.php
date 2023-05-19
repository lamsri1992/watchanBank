@extends('layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="pagetitle">
                        <h5 class="card-title fw-bold">
                            <i class="fas fa-history"></i>
                            STATEMENT
                        </h5>
                        <table id="tableBasic" class="table table-striped table-borderless nowrap">
                            <thead>
                                <tr>
                                    <th class="text-center">Trans::Code</th>
                                    <th class="text-center">วันที่ทำรายการ</th>
                                    <th class="text-center">ประเภท</th>
                                    <th class="">รายการ</th>
                                    <th class="text-center">จำนวน/กิโลกรัม</th>
                                    <th class="text-end">จำนวนเงิน</th>
                                    <th class="text-end">รวม</th>
                                    <th class="text-center">ผู้ทำรายการ</th>
                                    <th class="text-center">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($history as $res)
                                <tr>
                                    <td class="text-center">{{ $res->tran_code }}</td>
                                    <td class="text-center">{{ DateTimeThai($res->tran_created_at) }}</td>
                                    <td class="text-center">
                                        <span class="{{ $res->ttype_color }} fw-bold">
                                            {!! $res->ttype_icon !!}
                                        </span>
                                        {{ $res->ttype_name }}  
                                    </td>
                                    <td class="">{{ $res->item_name }}</td>
                                    <td class="text-center">{{ $res->tran_amount }}</td>
                                    <td class="text-end">{{ number_format($res->tran_total / $res->tran_amount,2)." ฿" }}</td>
                                    <td class="text-end">
                                        <span class="fw-bold">
                                            {{ number_format($res->tran_total,2)." ฿" }}
                                        </span>
                                    </td>
                                    <td class="text-center">{{ $res->tran_create }}</td>
                                    <td class="text-center">
                                        <span class="{{ $res->t_status_color }} fw-bold">
                                            {!! $res->t_status_icon !!}
                                        </span>
                                        {{ $res->t_status_name }}
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

@endsection
@section('script')

@endsection
