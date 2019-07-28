<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    protected $table = 'penerimaan';

    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'id_supplier');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}


