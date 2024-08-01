<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;
    protected $table      = 'kategori';
    protected $primaryKey = 'kategori_id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $fillable = ['kategori_nama', 'kategori_keterangan'];

    public function getKategori($id = false)
    {
        if ($id == false) {
            return $this->all();
        }

        return $this->where(['kategori_id' => $id])->first();
    }
}
