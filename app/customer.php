<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = 'customer';
    public $timestamps = false;
    
    protected $fillable = ['id_customer' ,'nama_customer' ,'alamat_customer'];
}
