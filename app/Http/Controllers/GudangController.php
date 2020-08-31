<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\gudang;

class GudangController extends Controller
{
    public function index(){
        $gudang = Gudang::paginate(7);

        return view('gudang', compact('gudang'));
    }

    public function add(Request $request){
        $gudang = new Gudang;
        $gudang->lokasi = $request->lokasi;
        $gudang->kapasitas = $request->kapasitas;
        $gudang->save();

        return redirect('/gudang');
    }

    public function edit(Request $request, $id){
        $gudang = Gudang::find($id);

        $gudang->lokasi = $request->lokasi;
        $gudang->kapasitas = $request->kapasitas;
        $gudang->save();

        return redirect('/gudang');
    }

    public function delete($id){
        $gudang = Gudang::find($id);
        $gudang->delete();

        return redirect('/gudang');
    }
}
