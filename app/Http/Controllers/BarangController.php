<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\barang;
use App\gudang;
use App\category_barang;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::all();
        $gudang = Gudang::all();
        $category = Category_barang::all();

        $edit = DB::table('barang')
        ->join('gudangs', 'barang.lokasi_gudang','=','gudangs.id')
        ->join('category_barang', 'barang.category_barang', '=', 'category_barang.id_category')
        ->select('barang.*', 'gudangs.*', 'category_barang.*')
        ->get();

        return view('barang', compact('barang', 'gudang', 'category', 'edit'));
    }

    public function add(Request $request){
        $barang = new Barang;
        $barang->lokasi_gudang = $request->lokasi_gudang;
        $barang->category_barang = $request->category_barang;
        $barang->merk_barang = $request->merk_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_beli = $request->harga_beli;
        $barang->tipe_barang = $request->tipe_barang;
        $barang->harga_jual = $request->harga_jual;
        $barang->save();

        return redirect('/barang');
    }

    public function edit(Request $request, $id){
        $barang = Barang::find($id);
        $barang->lokasi_gudang = $request->lokasi_gudang;
        $barang->category_barang = $request->category_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_beli = $request->harga_beli;
        $barang->tipe_barang = $request->tipe_barang;
        $barang->harga_jual = $request->harga_jual;
        $barang->save();


        return redirect('/barang');
    }

    public function delete($id){
        $barang = Barang::find($id);
        $barang->delete($id);

        return redirect('/barang');
    }

}
