<?php

namespace App\Http\Controllers;
use App\Models\KategoriModel;
use App\Models\ArsipModel;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'kategori' => $this->kategoriModel->getKategori()
        ];

        if (session()->has('role') && isset(session('role')['is_admin'])) {
            // jika user admin
            return view('kategori/admin/index', $data);
        } else if (session()->has('role') && isset(session('role')['is_staff'])) {
            // jika user staf
            return view('kategori/staff/index', $data);
        }
    }

    public function create()
    {
        return view('kategori/admin/create');
    }

    public function save(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'keterangan' => 'nullable|string',
    ]);

    // Menyimpan data ke database
    KategoriModel::create([
        'kategori_nama' => $validatedData['nama'],
        'kategori_keterangan' => $validatedData['keterangan'],
    ]);

    // Menyimpan pesan ke session
    $request->session()->flash('pesan', 'Data berhasil ditambahkan');

    // Mengarahkan kembali ke halaman kategori
    return redirect('/kategori');
}

public function delete($id)
{
    $kategoriHasArsip = ArsipModel::where('kategori_id', $id)->first();

    if ($kategoriHasArsip) {
        return redirect()->back()->with('error', 'Kategori gagal dihapus karena terdapat Arsip yang memiliki kategori tersebut.');
    }

    // Menghapus data kategori berdasarkan ID
    KategoriModel::destroy($id);

    // Menyimpan pesan ke session
    session()->flash('pesan', 'Data berhasil dihapus');

    // Mengarahkan kembali ke halaman kategori
    return redirect('/kategori');
}


    public function edit($id)
{
    // Mengambil data kategori berdasarkan ID
    $kategori = KategoriModel::findOrFail($id);

    // Menyiapkan data untuk dikirim ke view
    $data = [
        'kategori' => $kategori
    ];

    // Mengirim data ke view kategori/admin/edit
    return view('kategori.admin.edit', $data);
}


public function update(Request $request, $id)
{
    // Validasi input
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'keterangan' => 'nullable|string',
    ]);

    // Mengupdate data kategori berdasarkan ID
    $kategori = KategoriModel::findOrFail($id);
    $kategori->update([
        'kategori_nama' => $validatedData['nama'],
        'kategori_keterangan' => $validatedData['keterangan'],
    ]);

    // Menyimpan pesan ke session
    $request->session()->flash('pesan', 'Data berhasil diedit');

    // Mengarahkan kembali ke halaman kategori
    return redirect('/kategori');
}


}
