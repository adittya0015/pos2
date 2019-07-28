<?php

namespace App\Exports;

use App\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Barang::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'kode_barang',
            'nama_barang',
            'pkp',
            'Stok_min',
            'Harga_beli',
            'Harga_jual',
            'Jumlah_stok',
            'Keterangan',
            'Id_jenis',
            'Id_uom',
            'Created at',
            'Updated at'
        ];
    }
}
