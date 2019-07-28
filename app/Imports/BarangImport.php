<?php

namespace App\Imports;

use App\Barang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangImport implements ToModel, WithHeadingRow // USE CLASS YANG DIIMPORT
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Barang([
            'kode_barang' => $row['kode_barang'],
            'nama_barang' => $row['nama_barang'],
            'pkp' => $row['pkp'],
            'stok_min' => $row['stok_min'],
            'harga_beli' => $row['harga_beli'],
            'harga_jual' => $row['harga_jual'],
            'jumlah_stok' => $row['jumlah_stok'],
            'id_jenis' => $row['id_jenis'],
            'id_uom' => $row['id_uom'],
            'keterangan' => $row['keterangan'],
        ]);
    }
}
