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

                    @foreach ($errors->all() as $error)
                        <div class="alert alert-warning">
                            {{ $error }}
                        </div>
                    @endforeach

                    <form method="post" action="/arsip/save" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <label>Kode Arsip</label>
                            <input type="text" class="form-control" value="<?= $arsip_kode; ?>" disabled>
                            <input type="hidden" class="form-control" name="kode" value="<?= $arsip_kode; ?>" required="required">
                        </div>

                        <div class="form-group">
                            <label>Nama Arsip</label>
                            <input type="text" class="form-control" name="nama" required="required" value="{{ old('nama') }}">
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori" required="required">
                                <option value="">Pilih kategori</option>
                                <?php
                                foreach ($kategori as $k) {
                                ?>
                                    <option value="<?= $k['kategori_id']; ?>"><?= $k['kategori_nama']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" required="required">{{ old('keterangan') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Waktu Pelaksanaan</label>
                            <input type="date" class="form-control" name="pelaksanaan" required="required" value="{{ old('pelaksanaan') }}">
                        </div>

                        <div class="form-group">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" id="formFile" name="file_input" accept=".jpg,.jpeg,.png,.pdf,.psd,.cdr,.ai,.zip,.rar,.xlsx,.docx" required>
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
