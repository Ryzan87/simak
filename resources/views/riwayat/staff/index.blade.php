@extends('layout.main')
@section('content')
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data Riwayat Unduh Arsip Saya</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="panel panel">

        <div class="panel-heading">
            <h3 class="panel-title">Data Riwayat Unduhan Arsip Saya</h3>
        </div>
        <div class="panel-body">


            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th width="18%">Waktu Unduhan</th>
                        <th width="30%">User</th>
                        <th width="30%">Arsip yang diunduh</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach ($riwayat as $r) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date('Y-m-d H:i:s', strtotime($r['riwayat_create']))
                                ?></td>
                            <td><?= $r['riwayat_user']
                                ?></td>
                            <td>
                                <a style="color: blue" href="/arsip/preview/<?= $r['riwayat_arsip']; ?>">
                                    <?= $r->arsip->arsip_nama ?>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>


        </div>

    </div>
</div>
@endsection
