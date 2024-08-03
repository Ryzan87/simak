<?php

namespace App\Imports;

use App\Models\AgenSekolah;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AgenSekolahImport implements ToModel, WithStartRow, SkipsEmptyRows
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new AgenSekolah([
            'nama_sekolah'  =>  $row[2],
            'nama_agen'     =>  $row[3],
            'area'          =>  $row[4],
            'no_hp'         =>  $row[5],
            // 'status'        =>  $row[5]
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
