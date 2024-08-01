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
                                <h4 style="margin-bottom: 0px">Data Petugas</h4>
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
            <h3 class="panel-title">Data Petugas</h3>
        </div>
        <div class="panel-body" style="display: flex; flex-wrap: wrap; gap: 1rem;">

        <?php foreach ($data['users'] as $item): ?>
            <div class="card">
                <div class="card-img-wrapper">
                    <img src="<?= $item['image']; ?>" alt="User Image" class="card-img-top" style="object-fit: cover; object-positing: center; height: 100%; width: 100%;">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $item['nama']; ?></h5>
                    <p class="card-text"><?= $item['email']; ?></p>
                    {{-- <a href="https://wa.me/<?// = // $item['no_hp']; ?>" target="_blank" rel="nofollow" class="card-btn btn-success">WhatsApp</a> --}}
                </div>
            </div>
        <?php endforeach; ?>

        </div>
    </div>
</div>
@endsection
