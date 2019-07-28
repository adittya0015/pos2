<?php

namespace App\Imports;

use App\UOM;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UomImport implements ToModel, WithHeadingRow // USE CLASS YANG DIIMPORT
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new UOM([
            'kd_uom' => $row['kd_uom'],
            'keterangan' => $row['keterangan'],
        ]);
    }
}
