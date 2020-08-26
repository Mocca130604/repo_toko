<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';
    public $timestamps = false;
    
    protected $fillable = ['id_order' ,'tanggal_order','id_customer','id_barang'];
}
