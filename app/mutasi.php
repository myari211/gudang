<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mutasi extends Model
{
    protected $table = "mutasi";
    protected $fillable = ['id_barang', 'id_gudang', 'masuk', 'keluar'];
}
