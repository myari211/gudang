<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_barang extends Model
{
    protected $table = 'category_barang';
    protected $fillable = ['jenis', 'keterangan'];
}
