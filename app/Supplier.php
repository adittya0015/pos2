<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [];

    protected $table = 'supplier';

    public $timestamps = false;

    protected $fillable = [
        'kode_supplier', 'nama_supplier', 'alamat', 'kota', 'telp', 'npwp'
    ];

    public function penerimaan()
    {
        return $this->hasMany('App\Penerimaan');
    }
}
