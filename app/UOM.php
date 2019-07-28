<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UOM extends Model
{
    protected $guarded = [];

    protected $table = 'uom';

    public $timestamps = false;

    protected $fillable = [
        'kd_uom', 'keterangan',
    ];

    public function barang()
    {
        return $this->hasMany('App\Barang');
    }
}
