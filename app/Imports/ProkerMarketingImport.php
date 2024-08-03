<?php

namespace App\Imports;

use App\Models\ProkerMarketing;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProkerMarketingImport implements ToModel, WithStartRow, SkipsEmptyRows
{
    // use SkipsFailures;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ProkerMarketing([
            'nama'  =>  $row[1],
            'deskripsi'     =>  $row[2]
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
