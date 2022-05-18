<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;

class ArtikelFrontController extends Controller
{
    public function index($id)
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
        ->where('artikels.id', $id)
        ->first();

        $artikel_v2 = Artikel::orderBy('created_at', 'desc')->limit(3)->get();
        return view('artikel_detail', compact('artikel', 'artikel_v2'));
    }
}
