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
                                <h4 style="margin-bottom: 0px">Data Arsip</h4>
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
            <h3 class="panel-title">Semua Arsip</h3>
        </div>
        <div class="panel-body">

            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Waktu Pelaksanaan</th>
                        <th>Waktu Upload</th>
                        <th>Arsip </th>
                        <th>Kategori</th>
                        <th>Petugas</th>
                        <th>Keterangan</th>
                        <th class="text-center" width="21%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($arsip as $a) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>{{ \Carbon\Carbon::parse($a['arsip_pelaksanaan'])->locale('id')->format('l, j F Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($a['arsip_create'])->locale('id')->format('l, j F Y | H:i') }}</td>
                            <td>

                                <b>KODE</b> : <?= $a['arsip_kode'] ?> <br>
                                <b>Nama</b> : <?= $a['arsip_nama'] ?><br>
                                <b>Jenis</b> : <?= $a['arsip_tipe'] ?><br>
                            </td>
                            <td><?= $a->kategori->kategori_nama  ?></td>
                            <td><?= $a['arsip_petugas'] ?></td>
                            <td><?= $a['arsip_keterangan'] ?></td>
                            <td class="text-center">
                                <div class="modal fade" id="exampleModal_<?= $a['arsip_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">PERINGATAN!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus data ini? <br>file dan semua yang berhubungan akan dihapus secara permanen.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                                <a href="/arsip/delete/<?= $a['arsip_id']; ?>" class="btn btn-primary"><i class="fa fa-check"></i> &nbsp; Ya, hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="btn-group">
                                    <a class="btn btn-default" href="/arsip/download/<?= $a['arsip_id']; ?>"><i class="fa fa-download"></i></a>
                                    <a href="/arsip/preview/<?= $a['arsip_id']; ?>" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>
                                    {{-- <a href="/arsip/edit/<? // = // $a['arsip_id']; ?>" class="btn btn-default"><i class="fa fa-wrench"></i></a> --}}
                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_<?= $a['arsip_id']; ?>">
                                        <i class="fa fa-trash"></i>
                                    </button> --}}
                                </div>
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
