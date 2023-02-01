@extends('layouts.app')
@section('content')

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <!-- Card -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">ผู้เข้าร่วมโครงการ</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ number_format($mem_num) }} ราย</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">รายการที่รับฝาก</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-box-seam"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>? รายการ</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">ยอดรายการรับฝาก</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-file-earmark-bar-graph"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>? บาท</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">ยอดรายการเบิกจ่าย</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cash-coin"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>? บาท</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card" style="height: 100%;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                <i class="fas fa-comment-dollar"></i>
                                กำหนดราคารายการรับฝาก
                            </h5>
                            <ul class="list-group">
                                @foreach($item as $res)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="fw-bold">
                                            {{ $res->item_name }}
                                        </span>
                                        <span class="fw-bold">
                                            {{ number_format($res->prc_price,2)." ฿" }}/กิโลกรัม
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card" style="height: 100%;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                <i class="fas fa-chart-line"></i>
                                แผนภูมิแสดงสถิติรายการรับฝาก
                            </h5>
                            <!-- Bar Chart -->
                            <canvas id="myChart" style="max-height: 400px;"></canvas>
                            <!-- End Bar CHart -->
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
    const labels = [
        @foreach ($chart as $res)
        [ "{{ $res->item_name }}"],
        @endforeach
    ];
  
    const config = {
      type: 'bar',
      data: {
        datasets: [{
            label: 'รายการรับฝาก/กิโลกรัม',
            data: [
                @foreach ($chart as $res)
                "{{ $res->total }}",
                @endforeach
            ],
            backgroundColor: [
                '#6f42c1c4',
            ],
            borderColor: [
                '#6f42c1c4',
            ],
        }],
        labels: labels
    },
      options: {}
    };

    $(document).ready(function () {
        Chart.defaults.font.family = 'Prompt';
    });

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
@endsection
