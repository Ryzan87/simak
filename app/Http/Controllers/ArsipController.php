<?php

namespace App\Http\Controllers;
use App\Models\KategoriModel;
use App\Models\ArsipModel;
use App\Models\RiwayatModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArsipController extends Controller
{
    protected $kategoriModel;
    protected $arsipModel;
    protected $riwayatModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->arsipModel = new ArsipModel();
        $this->riwayatModel = new RiwayatModel();
    }

    public function index()
    {
        $data = [
            'arsip' => $this->getArsip()
        ];

        // dd($data);

        if (session()->has('role') && isset(session('role')['is_admin'])) {
            // jika user admin
            return view('arsip/admin/index', $data);
        } else if (session()->has('role') && isset(session('role')['is_staff'])) {
            // jika user staf
            return view('arsip/staff/index', $data);
        }
    }

    public function preview($id)
    {
        // Mengambil data arsip berdasarkan ID
        $arsip = $this->getArsip($id);

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'arsip' => $arsip
        ];

        // Memeriksa peran pengguna dari session
        if (session()->has('role.is_admin')) {
            // Jika pengguna adalah admin
            return view('arsip.preview', $data);
        } elseif (session()->has('role.is_staff')) {
            // Jika pengguna adalah staf
            return view('arsip.preview', $data);
        }

        // Jika tidak memiliki akses, bisa diarahkan ke halaman lain atau menampilkan pesan
        return redirect('/unauthorized');
    }


public function create()
{
    // Mengambil arsip terakhir
    $lastArsip = ArsipModel::orderBy('arsip_id', 'desc')->first();
    if (!$lastArsip) {
        $lastArsip = (object) ['arsip_id' => 0];
    }

    // Mengambil semua kategori
    $kategori = KategoriModel::all();

    // Menyiapkan data untuk dikirim ke view
    $data = [
        'kategori' => $kategori,
        'arsip_kode' => "PK-" . ($lastArsip->arsip_id + 1)
    ];

    // Mengirim data ke view arsip/staff/create
    return view('arsip.staff.create', $data);
}


public function save(Request $request)
{
    ini_set('post_max_size', '200MB');

    // Validasi input
    $validatedData = $request->validate([
        'kode' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'kategori' => 'required|integer',
        'keterangan' => 'nullable|string',
        'pelaksanaan' => 'required|string|max:255',
        'file_input' => 'required|file', // Sesuaikan dengan jenis file yang diizinkan dan ukuran maksimal
    ]);

    // dd($request->all());

    // Menghandle upload file
    if ($request->hasFile('file_input')) {
        $file = $request->file('file_input');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('upload'), $fileName);
    }

    // Mengambil user dari session
    $user = Session::get('profile');

    // Menyimpan data ke database
    ArsipModel::create([
        'arsip_kode' => $validatedData['kode'],
        'arsip_nama' => $validatedData['nama'],
        'kategori_id' => $validatedData['kategori'],
        'arsip_keterangan' => $validatedData['keterangan'],
        'arsip_pelaksanaan' => $validatedData['pelaksanaan'],
        'arsip_file' => $fileName,
        'arsip_tipe' => $file->getClientOriginalExtension(),
        'arsip_petugas' => $user['nama'],
    ]);


    // Mengarahkan kembali ke halaman arsip
    return redirect('/arsip')->with('pesan', 'Arsip berhasil ditambahkan');
}

public function delete($id)
{
    // Mencari data arsip berdasarkan ID
    $arsip = ArsipModel::findOrFail($id);

    // Menghapus file yang terkait dengan arsip
    if (file_exists(public_path('upload/' . $arsip->arsip_file))) {
        unlink(public_path('upload/' . $arsip->arsip_file));
    }

    // Menghapus data arsip dari database
    $arsip->delete();

    // Mengarahkan kembali ke halaman arsip
    return redirect('/arsip')->with('pesan', 'Arsip berhasil dihapus');
}

public function edit($id)
{
    // Mengambil data kategori
    $kategori = KategoriModel::all();

    // Mengambil data arsip berdasarkan ID
    $arsip = ArsipModel::findOrFail($id);

    // Menyiapkan data untuk dikirim ke view
    $data = [
        'kategori' => $kategori,
        'arsip' => $arsip
    ];

    // Mengirim data ke view arsip/staff/edit
    return view('arsip.staff.edit', $data);
}

public function update(Request $request, $id)
{
    // Validasi input
    $validatedData = $request->validate([
        'kode' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'kategori' => 'required|integer|exists:kategori,kategori_id',
        'keterangan' => 'nullable|string',
        'pelaksanaan' => 'nullable|string',
        'file_input' => 'nullable|file|mimes:jpg,jpeg,png,pdf,psd,cdr,ai,zip,rar,xlsx,docx',
    ]);

    // Mendapatkan file yang di-upload
    $fileInput = $request->file('file_input');
    $fileLama = $request->input('file_lama');

    if ($fileInput) {
        // Menyimpan file baru
        $fileName = $fileInput->getClientOriginalName();
        $fileInput->move(public_path('upload'), $fileName);

        // Menghapus file lama jika ada
        if ($fileLama && file_exists(public_path('upload/' . $fileLama))) {
            unlink(public_path('upload/' . $fileLama));
        }
    } else {
        // Jika tidak ada file baru, gunakan file lama
        $fileName = $fileLama;
    }

    // Mendapatkan user dari session
    $user = $request->session()->get('profile');

    // Mengupdate data arsip
    $arsip = ArsipModel::findOrFail($id);
    $arsip->update([
        'arsip_kode' => $validatedData['kode'],
        'arsip_nama' => $validatedData['nama'],
        'kategori_id' => $validatedData['kategori'],
        'arsip_keterangan' => $validatedData['keterangan'],
        'arsip_pelaksanaan' => $validatedData['pelaksanaan'],
        'arsip_file' => $fileName,
        'arsip_petugas' => $user['nama'],
    ]);

    // Menyimpan pesan ke session
    $request->session()->flash('pesan', 'Data berhasil diedit');

    // Mengarahkan kembali ke halaman arsip
    return redirect('/arsip');
}


public function download($id)
{
    // Mengambil data arsip berdasarkan ID
    $file = ArsipModel::findOrFail($id);

    // Memeriksa apakah file ada
    if ($file->arsip_file) {

        // Mendapatkan informasi pengguna dari session
        $user = session('profile');

        if (Session::has('role')) {
            $role = isset(Session::get('role')['is_admin']) ? 1 : 0;
        }

        // Menyimpan riwayat
        RiwayatModel::create([
            'riwayat_user' => $user['nama'],
            'riwayat_arsip' => $file['arsip_id'],
            'role' => $role
        ]);

        // Mendapatkan path file
        $filePath = 'upload/' . $file->arsip_file;

        $x = public_path($filePath);

        // Mengunduh file
        return response()->download($x);
    }

    // Mengarahkan kembali dengan pesan error
    return redirect()->back()->with('error', 'File not found');
}
    private function getArsip($id = null)
    {
        if (is_null($id)) {
            return ArsipModel::with('kategori')
                ->select('arsip.*', 'arsip.created_at as arsip_create')
                ->get();
        }

        return ArsipModel::with('kategori')
            ->select('arsip.*', 'arsip.created_at as arsip_create')
            ->where('arsip_id', $id)
            ->first();
    }
}
