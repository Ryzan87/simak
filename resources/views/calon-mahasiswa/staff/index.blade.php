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

            <form action="{{ route('calon-mahasiswa.index') }}" method="get">
                <div class="row">
                    <div class="col-sm-offset-10 col-sm-6">
                        <label>Search: <input type="search" class="form-control input-sm" name="search" value="{{ request()->get('search') }}">
                        </label>
                    </div>
                </div>
            </form>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Sekolah</th>
                        <th>Kelas</th>
                        <th>Nama Siswa</th>
                        <th>No. Hp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($calon_mahasiswa as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_sekolah }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->no_hp }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $calon_mahasiswa->links() }}

        </div>
    </div>
</div>
@endsection
