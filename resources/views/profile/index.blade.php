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
                                <h4 style="margin-bottom: 0px">Profil</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-3">
                <div class="single-cards-item">
                    <div class="single-product-image">
                        <a href="/profile">


                            <img src="/img/product/profile-bg.jpg">
                        </a>
                    </div>

                    <div class="single-product-text">
                        <img
                            style="object-fit:cover; object-position:center;"
                            class="img-user"
                            src="<?=
                                session()->has('user_image')
                                ? session('user_image')
                                : base_url("gambar/sistem/user.png");
                            ?>"
                        >
                        <h4><a class="cards-hd-dn" href="/profile">
                            <?=
                                session()->has('profile')
                                ? session('profile')['nama']
                                : 'User Marketing';
                            ?>
                        </a></h4>
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

            <div class="col-lg-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h4>Data Diri</h4>
                    </div>
                    <div class="panel-body">

                    <?php if (session()->has('errors')): ?>
                        <div class='alert alert-danger'>Foto profile gagal diperbarui. Pastikan file berukuran kurang dari 3MB dan memiliki ekstensi .jpg atau .png</div>
                    <?php endif; ?>

                    <?php if (session()->has('success')): ?>
                        <div class='alert alert-success'><?= session('success'); ?></div>
                    <?php endif; ?>

                        <form action="/profile" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label>Nama</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nama"
                                    required="required"
                                    value="<?=
                                        session()->has('profile')
                                        ? session('profile')['nama']
                                        : 'User Marketing';
                                    ?>"
                                    disabled
                                >
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="username"
                                    required="required"
                                    value="<?=
                                        session()->has('account')
                                        ? session('account')['email']
                                        : 'user-marketing@simak.dev'
                                    ?>"
                                    disabled
                                >
                            </div>

                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto">
                                <small>Kosongkan jika tidak ingin mengubah foto.</small>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Simpan">
                            </div>

                        </form>

                    </div>
                </div>

            </div>



        </div>
    </div>
</div>
@endsection
