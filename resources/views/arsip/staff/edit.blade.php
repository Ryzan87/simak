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
                                <h4 style="margin-bottom: 0px">Upload Arsip</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Upload arsip</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">
                        <a href="/arsip" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>

                    <form method="post" action="/arsip/update/<?= $arsip['arsip_id'] ?>" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <label>Kode Arsip</label>
                            <input type="text" class="form-control" value="<?= $arsip['arsip_kode'] ?>" disabled>
                            <input type="hidden" class="form-control" name="kode" value="<?= $arsip['arsip_kode'] ?>" required="required">
                            <input type="hidden" class="form-control" name="file_lama" value="<?= $arsip['arsip_file'] ?>" required="required">
                            <input type="hidden" class="form-control" name="tipe_lama" value="<?= $arsip['arsip_tipe'] ?>" required="required">
                        </div>

                        <div class="form-group">
                            <label>Nama Arsip</label>
                            <input type="text" class="form-control" name="nama" value="<?= $arsip['arsip_nama'] ?>" required="required">
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori" required="required">
                                <option value="">Pilih kategori</option>
                                <?php
                                foreach ($kategori as $k) {
                                ?>
                                    <option value="<?= $k['kategori_id']; ?>" <?= ($k['kategori_id'] == $arsip['kategori_id']) ? 'selected' : '';; ?>><?= $k['kategori_nama']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" required="required"><?= $arsip['arsip_keterangan'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Waktu Pelaksanaan</label>
                            <input type="date" class="form-control" name="pelaksanaan" value="<?= date('Y-m-d', strtotime($arsip['arsip_pelaksanaan'])) ?>" required="required">
                        </div>

                        <div class="form-group">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" id="formFile" name="file_input" value="<?= $arsip['arsip_file'] ?>">
                            <?php if (!empty($arsip['arsip_file'])) : ?>
                                <p>Current file: <?= $arsip['arsip_file']; ?> <a href="{{ route('arsip.edit', $arsip->arsip_id) }}" class="bg-blue" target="_blank">View file</a></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Upload">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


</div>
@endsection
