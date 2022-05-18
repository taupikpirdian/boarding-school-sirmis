<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acara;

class AcaraController extends Controller
{
    public function acara()
    {
        $acara = Acara::leftjoin('kategori_acaras', 'kategori_acaras.id', '=', 'acaras.id_kategori')
        ->orderBy('acaras.created_at', 'desc')
        ->select(
            'acaras.id',
            'acaras.judul',
            'acaras.id_kategori',
            'acaras.isi',
            'acaras.img',
            'acaras.tempat',
            'acaras.jam',
            'acaras.tanggal',
            'acaras.bulan',
            'acaras.tahun',
            'acaras.biaya',
            'acaras.created_at',
            'kategori_acaras.kategori_acara')
        ->paginate(6);
       return view('acara', compact('acara'));
    }

    public function search(Request $request){
        $search = $request->get('search');
        $acara = Acara::where('judul','LIKE','%'.$search.'%')->paginate(10);
        return view('acara', compact('acara'));
    }
}
