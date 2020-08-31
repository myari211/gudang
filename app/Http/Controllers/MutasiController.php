<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\barang;
use App\gudang;
use App\mutasi;

class MutasiController extends Controller
{
    public function index(){
        $mutasi = DB::table('mutasi')
        ->join('barang', 'mutasi.id_barang', '=', 'barang.id')
        ->join('gudangs', 'mutasi.id_gudang', '=', 'gudangs.id')
        ->get();

        $barang = DB::table('barang')->get();

        return view('mutasi', compact('mutasi', 'barang'));
    }
}
