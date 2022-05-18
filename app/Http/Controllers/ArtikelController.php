<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
       $artikel = Artikel::leftjoin('kategori_artikels', 'kategori_artikels.id', '=', 'artikels.id_kategori')
        ->orderBy('artikels.created_at', 'desc')
        ->select(
            'artikels.id',
            'artikels.judul',
            'artikels.id_kategori',
            'artikels.isi',
            'artikels.img',
            'artikels.file',
            'artikels.created_at',
            'kategori_artikels.kategori_artikel')
        ->paginate(6);
       return view('artikel', compact('artikel', 'artikels'));
    }

    public function search(Request $request){
      $search = $request->get('search');
      $artikel = Artikel::where('judul','LIKE','%'.$search.'%')->paginate(10);
      return view('artikel', compact('artikel'));
    }
}
