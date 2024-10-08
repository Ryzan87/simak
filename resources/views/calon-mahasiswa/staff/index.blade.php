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
                                    <h4 style="margin-bottom: 0px">Data Calon Mahasiswa</h4>
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
                <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-2">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="{{ route('calon-mahasiswa.import') }}" enctype="multipart/form-data"
                                    method="post" id="uploadForm">
                                    @csrf
                                    <label for="file" class="btn btn-success">Upload</label>
                                    <input type="file" name="file" style="display: none" id="file"
                                        accept=".csv, .xlsx">
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <form action="{{ route('calon-mahasiswa.clear') }}" enctype="multipart/form-data"
                                    method="post" id="uploadForm">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="1">
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('apakah anda yakin?')">Clear Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-10 col-sm-6">
                        <form action="{{ route('calon-mahasiswa.index') }}" method="get">
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
                            <th>Kelas</th>
                            <th>Nama Siswa</th>
                            <th>No. Hp</th>
                            <th>Aksi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($calon_mahasiswa as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration + ($calon_mahasiswa->currentPage() - 1) * $calon_mahasiswa->perPage() }}
                                </td>
                                <td>{{ $item->nama_sekolah }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->nama_siswa }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>
                                    @if (!$item->is_pendaftaran)
                                        <form action="{{ route('calon-mahasiswa.update', $item->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-info btn-sm">Selesaikan</button>
                                        </form>
                                    @else
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if ($item->is_pendaftaran)
                                        <span>TERDAFTAR</span>
                                    @else
                                        <strong>BELUM TERDAFTAR</strong>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $calon_mahasiswa->links() }}

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
