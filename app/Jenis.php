<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $guarded = [];

    protected $table = 'jenis';

    public $timestamps = false;

    protected $fillable = [
        'kode_jenis', 'nama_jenis', 'merk',
    ];

    public function barang()
    {
        return $this->hasMany('App\Barang');
    }
}
