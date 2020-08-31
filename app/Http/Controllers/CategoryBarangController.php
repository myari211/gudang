<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\category_barang;

class CategoryBarangController extends Controller
{
    public function index(){
        $category = Category_barang::all();

        return view('category_barang', compact('category'));
    }

    public function add(Request $request){
        $category = new Category_barang;

        $category->jenis = $request->jenis;
        $category->save();

        return redirect('/category_barang');
    }

    public function edit(Request $request){
        DB::table('category_barang')->where('id_category', $request->id)->update([
            'jenis'=>$request->jenis
        ]); 

        return redirect('/category_barang');
    }

    public function delete(Request $request){
        DB::table('category_barang')->where('id_category', $request->id)->delete();

        return redirect('/category_barang');
    }
}
