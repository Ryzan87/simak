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
                                <h4 style="margin-bottom: 0px">Data Kategori</h4>
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
            <h3 class="panel-title">Data kategori</h3>
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a href="/kategori/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah kategori</a>
            </div>
            <br>
            <br>
            <br>
            <?php if (session('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session(('pesan')); ?>
                </div>
            <?php endif; ?>

            <?php if (session('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session(('error')); ?>
                </div>
            <?php endif; ?>

            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama</th>
                        <th>Katerangan</th>
                        <th>Tanggal Pembuatan</th>
                        <th class="text-center" width="10%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($kategori as $k) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $k['kategori_nama'] ?></td>
                            <td><?= $k['kategori_keterangan'] ?></td>
                            <td><?= $k['created_at'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="/kategori/edit/<?= $k['kategori_id']; ?>" class="btn btn-default"><i class="fa fa-wrench"></i></a>
                                    <a href="/kategori/delete/<?= $k['kategori_id']; ?>" class="btn btn-default" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
