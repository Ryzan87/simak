<?php

namespace App\Imports;

use App\Models\CalonMahasiswaModel;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CalonMahasiswaImport implements ToModel, WithStartRow, SkipsEmptyRows
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new CalonMahasiswaModel([
            'nama_sekolah'  => $row[1],
            'kelas'         => $row[2],
            'nama_siswa'    => $row[3],
            'no_hp'         => $row[4]
        ]);
    }

    public function startRow(): int
    {
        return 4;
    }
}
