<?php

namespace App\Imports;

use App\Jenis;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JenisImport implements ToModel, WithHeadingRow // USE CLASS YANG DIIMPORT
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jenis([
            'kode_jenis' => $row['kode_jenis'],
            'nama_jenis' => $row['nama_jenis'],
            'merk' => $row['merk'],
        ]);
    }
}
