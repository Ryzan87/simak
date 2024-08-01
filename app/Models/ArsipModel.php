<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipModel extends Model
{
    use HasFactory;
    protected $table = 'arsip';
    protected $primaryKey = 'arsip_id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $fillable = ['arsip_kode', 'kategori_id', 'arsip_nama', 'arsip_keterangan', 'arsip_pelaksanaan', 'arsip_file', 'arsip_tipe', 'arsip_petugas'];

    public function getArsip($id = false)
    {
        if ($id == false) {
            return $this->select('* , arsip.created_at as arsip_create')
                ->join('kategori', 'kategori.kategori_id = arsip.kategori_id', 'left')
                ->all();
        }

        return $this->select('* , arsip.created_at as arsip_create')
            ->join('kategori', 'kategori.kategori_id = arsip.kategori_id', 'left')
            ->where(['arsip_id' => $id])->first();
    }

    public function getLastArsip()
    {
        return $this->orderBy('arsip_id', 'DESC')->first();
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id');
    }
}
