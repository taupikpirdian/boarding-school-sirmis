<?php

namespace App\Http\Controllers;
use App\Berita;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function berita()
    {
        $beritas = Berita::leftjoin('kategori_beritas', 'kategori_beritas.id', '=', 'beritas.id_kategori')
        ->orderBy('beritas.created_at', 'desc')
        ->select(
            'beritas.id',
            'beritas.judul',
            'beritas.id_kategori',
            'beritas.isi',
            'beritas.img',
            'beritas.slug',
            'beritas.created_at',
            'kategori_beritas.kategori_berita')
        ->paginate(10);
        return view('berita', compact('beritas'));
    }
}
