<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gudang extends Model
{
    protected $table = 'gudangs';
    protected $fillable = ['lokasi', 'kapasitas', 'keterangan'];
}
