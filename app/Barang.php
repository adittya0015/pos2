<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $guarded = [];

    protected $fillable = [
        'kode_barang', 'nama_barang', 'pkp', 'stok_min', 'harga_beli', 'harga_jual', 'jumlah_stok', 'keterangan', 'id_jenis', 'id_uom',
    ];

    public function jenis()
    {
        return $this->belongsTo('App\Jenis', 'id_jenis');
    }

    public function uom()
    {
        return $this->belongsTo('App\UOM', 'id_uom');
    }
}
