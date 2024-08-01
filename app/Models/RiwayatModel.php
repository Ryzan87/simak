<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RiwayatModel extends Model
{
    use HasFactory;
    protected $table = 'riwayat';
  protected $primaryKey = 'riwayat_id';
  protected $useAutoIncrement = true;
  protected $useTimestamps = true;
  protected $fillable = ['riwayat_user', 'riwayat_arsip', 'role'];

  public function getRiwayat($id = null)
{
    // Mengecek role user dari session
    if (session()->has('role') && isset(session('role')['is_admin'])) {
        $role = 1;
    } else if (session()->has('role') && isset(session('role')['is_staff'])) {
        $role = 0;
    }

    // Membuat query dasar
    $query = DB::table('riwayat')
        ->select('riwayat.*', 'riwayat.created_at as riwayat_create', 'arsip.*')
        ->leftJoin('arsip', 'arsip.arsip_id', '=', 'riwayat.riwayat_arsip')
        ->where('riwayat.role', $role);

    // Menentukan apakah akan mengembalikan satu atau semua riwayat
    if ($id === null) {
        return $query->get();
    }

    return $query->where('riwayat.riwayat_id', $id)->first();
}

public function getChart($role)
{
    return DB::table('riwayat')
        ->select('riwayat.riwayat_user', DB::raw('COUNT(riwayat.riwayat_arsip) as riwayat_count'))
        ->leftJoin('arsip', 'arsip.arsip_id', '=', 'riwayat.riwayat_arsip')
        ->where('riwayat.role', $role)
        ->groupBy('riwayat.riwayat_user')
        ->get();
}

  public function arsip()
    {
        return $this->belongsTo(ArsipModel::class, 'riwayat_arsip');
    }
}
