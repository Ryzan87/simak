@extends('layout.main')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="traffice-source-area mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="{{ route('staff.index') }}">
                    <div class="white-box analytics-info-cs">
                        <h3 class="box-title">Petugas</h3>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <div id="sparklinedash"></div>
                            </li>
                            <li class="text-right sp-cn-r">
                                <i class="fa fa-level-up" aria-hidden="true"></i>
                                <?= $staffMarketing; ?>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="{{ route('arsip.index') }}">
                    <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <h3 class="box-title">Total Arsip</h3>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <div id="sparklinedash3"></div>
                            </li>
                            <li class="text-right graph-three-ctn">
                                <i class="fa fa-level-up" aria-hidden="true"></i>
                                <?= $arsipCount; ?>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="{{ route('kategori.index') }}">
                    <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <h3 class="box-title">Kategori Arsip</h3>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <div id="sparklinedash4"></div>
                            </li>
                            <li class="text-right graph-four-ctn">
                                <i class="fa fa-level-down" aria-hidden="true"></i>
                                <?= $kategori; ?>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="{{ route('riwayat.index') }}">
                    <div class="white-box analytics-info-cs res-mg-t-30 table-mg-t-pro-n">
                        <h3 class="box-title">Riwayat Unduhan</h3>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <div id="sparklinedash2"></div>
                            </li>
                            <li class="text-right graph-two-ctn">
                                <i class="fa fa-level-up" aria-hidden="true"></i>
                                <?= $riwayatCount; ?>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="product-sales-chart">
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="caption pro-sl-hd">
                                    <span class="caption-subject"><b>Grafik pengunduhan arsip</b></span>
                                </div>
                            </div>
                            <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="actions graph-rp graph-rp-dl">
                                    <p>Grafik jumlah unduh arsip perhari selama sebulan</p>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <ul class="list-inline cus-product-sl-rp">
                        <li>
                            <h5><i class="fa fa-circle" style="color: #006DF0;"></i>Jumlah Unduhan</h5>
                        </li>
                    </ul>
                    <div id="extra-area-chart" style="height: 356px;">
                        <canvas id="salesChart"></canvas>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="single-cards-item">
                    <div class="single-product-image">
                        <a href="/profile">

                            <img src="img/product/profile-bg.jpg" alt="">
                        </a>
                    </div>

                    <div class="single-product-text">
                        <img src="<?=
                                    session()->has('user_image')
                                        ? session('user_image')
                                        : base_url("gambar/sistem/user.png");
                                    ?>" class="img-user" style="object-fit:cover; object-position:center;">

                        <h4>
                            <a class="cards-hd-dn" href="/profile">
                                <?=
                                session()->has('profile')
                                    ? session('profile')['nama']
                                    : 'User Marketing';
                                ?>
                            </a>
                        </h4>
                        <h5>
                            <?=
                            session()->has('role') && isset(session('role')['is_admin'])
                                ? 'Admin Marketing'
                                : 'Staf Marketing';
                            ?>
                        </h5>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
    // Your Chart.js code
    const labels = @json(array_column($riwayat, 'riwayat_user'));
    const data = @json(array_column($riwayat, 'riwayat_count'));
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar', // You can change this to 'bar', 'pie', etc.
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Unduhan',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
