<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table="barang";
    protected $fillable = ['lokasi_gudang',
                            'category_barang',
                            'nama_barang', 
                            'harga_beli', 
                            'merk_barang',
                            'tipe_barang',
                            'harga_jual'];
}
