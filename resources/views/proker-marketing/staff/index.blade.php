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
                                    <h4 style="margin-bottom: 0px">Program Kerja Marketing</h4>
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
                <h3 class="panel-title">Program Kerja Marketing</h3>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-2">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="{{ route('proker-marketing.import') }}" enctype="multipart/form-data"
                                    method="post" id="uploadForm">
                                    @csrf
                                    <label for="file" class="btn btn-success">Upload</label>
                                    <input type="file" name="file" style="display: none" id="file"
                                        accept=".csv, .xlsx">
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <form action="{{ route('proker-marketing.clear') }}" enctype="multipart/form-data"
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
                        <form action="{{ route('proker-marketing.index') }}" method="get">
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
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proker_marketing as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td style="text-align: center">
                                    @if ($item->status)
                                        <span>SELESAI</span>
                                    @else
                                        <strong>BELUM SELESAI</strong>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $proker_marketing->links() }}

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
