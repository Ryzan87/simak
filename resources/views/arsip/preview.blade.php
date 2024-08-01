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
                  <h4 style="margin-bottom: 0px">Preview Arsip</h4>
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
      <div class="panel-body">
        <?php
        $extention = strtolower($arsip['arsip_tipe']);
        switch ($extention) {
            case 'ai':
                $image = 'icon-illustrator.png';
            break;
            case 'cdr':
                $image = 'icon-cdr.png';
            break;
            case 'psd':
                $image = 'icon-photoshop.png';
            break;
            case 'pdf':
                $image = 'icon-pdf.png';
            break;
            case 'doc':
            case 'docx':
                $image =  'icon-word.png';
            break;
            case 'xls':
            case 'xlsx':
                $image =  'icon-excel.png';
            break;
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                $image = $arsip['arsip_file'];
            break;
            case 'zip':
            case 'rar':
                $image = 'icon-zip.png';
            break;
            default:
                $image = 'icon-file.png';
            break;
        }
        ?>
        <div class="card" style="width: 18rem;">
          <img src="/upload/<?= $image; ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $arsip['arsip_nama']; ?></h5>
            <p class="card-text"><?= $arsip['arsip_keterangan']; ?></p>
            <a href="/arsip/download/<?= $arsip['arsip_id']; ?>" class="btn btn-primary">Download</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
