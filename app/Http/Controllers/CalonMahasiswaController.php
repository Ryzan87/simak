<?php

namespace App\Http\Controllers;

use App\Imports\CalonMahasiswaImport;
use App\Models\CalonMahasiswaModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CalonMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $calon_mahasiswa = CalonMahasiswaModel::query();

        if ($request->query('search')) {
            $calon_mahasiswa = $calon_mahasiswa->where('nama_sekolah', 'like', '%' . $request->query('search') . '%');
            $calon_mahasiswa = $calon_mahasiswa->orWhere('kelas', 'like', '%' . $request->query('search') . '%');
            $calon_mahasiswa = $calon_mahasiswa->orWhere('nama_siswa', 'like', '%' . $request->query('search') . '%');
            $calon_mahasiswa = $calon_mahasiswa->orWhere('no_hp', 'like', '%' . $request->query('search') . '%');
        }

        return view('calon-mahasiswa.staff.index', [
            'calon_mahasiswa' => $calon_mahasiswa->paginate(),
        ]);
    }

    public function import(Request $request)
    {
        Excel::import(new CalonMahasiswaImport, $request->file('file'));

        return redirect()->route('calon-mahasiswa.index');
    }

    public function clear(Request $request)
    {
        CalonMahasiswaModel::truncate();

        return redirect()->route('calon-mahasiswa.index');
    }
}
