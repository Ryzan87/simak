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
                                    <h4 style="margin-bottom: 0px">Data Agen Sekolah</h4>
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
                <h3 class="panel-title">Data Agen Sekolah</h3>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-2">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="{{ route('agen-sekolah.import') }}" enctype="multipart/form-data"
                                    method="post" id="uploadForm">
                                    @csrf
                                    <label for="file" class="btn btn-success">Upload Excel</label>
                                    <input type="file" name="file" style="display: none" id="file"
                                        accept=".csv, .xlsx">
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <form action="{{ route('agen-sekolah.clear') }}" enctype="multipart/form-data"
                                    method="post" id="uploadForm">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="1">
                                    <button type="submit" class="btn btn-danger">Clear Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-10 col-sm-6">
                        <form action="{{ route('agen-sekolah.index') }}" method="get">
                            <label>Search: <input type="search" class="form-control input-sm" name="search"
                                    value="{{ request()->get('search') }}">
                            </label>
                        </form>
                    </div>
                </div>

                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama Sekolah</th>
                            <th>Nama Agen</th>
                            <th>Area</th>
                            <th>No. Telepon</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agen_sekolah as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration + ($agen_sekolah->currentPage() - 1) * $agen_sekolah->perPage() }}
                                </td>
                                <td>{{ $item->nama_sekolah }}</td>
                                <td>{{ $item->nama_agen }}</td>
                                <td>{{ $item->area }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td style="text-align: center">
                                    {{ $item->status }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $agen_sekolah->links() }}

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            // Tangkap event perubahan pada input file
            $('#file').change(function() {
                // Tampilkan dialog konfirmasi
                const userConfirmed = confirm(
                    "Apakah Anda yakin ingin melanjutkan proses upload file ini?");

                if (userConfirmed) {
                    // Jika pengguna memilih "Ya", submit form
                    $('#uploadForm').submit();
                } else {
                    // Jika pengguna memilih "Tidak", kosongkan input file
                    $(this).val('');
                }
            });

            // Menangkap event submit pada form
            $('#uploadForm').on('submit', function(event) {
                // Cegah submit otomatis jika file tidak dipilih
                if ($('#file').val() === '') {
                    event.preventDefault();
                    alert('Silakan pilih file terlebih dahulu.');
                }
            });
        });
    </script>
@endpush
