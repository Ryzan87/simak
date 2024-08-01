<?php

namespace App\Http\Controllers;

use App\Models\CalonMahasiswaModel;
use Illuminate\Http\Request;

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
}
