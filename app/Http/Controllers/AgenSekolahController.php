<?php

namespace App\Http\Controllers;

use App\Imports\AgenSekolahImport;
use App\Models\AgenSekolah;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AgenSekolahController extends Controller
{
    public function index(Request $request)
    {
        $agen_sekolah = AgenSekolah::query();

        if ($request->query('search')) {
            $agen_sekolah = $agen_sekolah->where('nama_sekolah', 'like', '%' . $request->query('search') . '%');
            $agen_sekolah = $agen_sekolah->orWhere('nama_agen', 'like', '%' . $request->query('search') . '%');
            $agen_sekolah = $agen_sekolah->orWhere('area', 'like', '%' . $request->query('search') . '%');
            $agen_sekolah = $agen_sekolah->orWhere('no_hp', 'like', '%' . $request->query('search') . '%');
        }

        return view('agen-sekolah.staff.index', [
            'agen_sekolah' => $agen_sekolah->paginate(),
        ]);
    }

    public function import(Request $request)
    {
        Excel::import(new AgenSekolahImport, $request->file('file'));

        return redirect()->route('agen-sekolah.index');
    }

    public function clear(Request $request)
    {
        AgenSekolah::truncate();

        return redirect()->route('agen-sekolah.index');
    }
}
