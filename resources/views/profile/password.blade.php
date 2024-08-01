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
                                <h4 style="margin-bottom: 0px">Ganti Password</h4>
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
        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
            <div class="panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Ganti Password</h3>
                </div>

                <div class="panel-body">
                  <?php if (session()->has('errors')): ?>
                    <div class='alert alert-danger'>Password gagal diperbarui.</div>
                  <?php endif; ?>

                  <?php if (session()->has('success')): ?>
                    <div class='alert alert-success'><?= session('success'); ?></div>
                  <?php endif; ?>

                    <form action="/password" method="post">
                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="PUT">
                      <div class="form-group">
                            <label>Password Lama</label>
                            <input type="password" class="form-control" placeholder="Masukkan Password Lama .." name="password_lama" required="required" min="8">
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" class="form-control" placeholder="Masukkan Password Baru .." name="password_baru" required="required" min="8">
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" placeholder="Konfirmasi Password Baru .." name="konfirmasi_password_baru" required="required" min="8">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Simpan" onclick="confirm('Anda yakin? Mengganti password artinya akan mengganti akun password untuk semua sistem yang terintegrasi dengan SSO.')">
                        </div>
                    </form>

                </div>

            </div>
        </div>

    </div>
</div>
@endsection
