<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GaleriPesantren;

class GaleriMtsFrontController extends Controller
{
    public function index()
    {
       $galeri_pesantren = GaleriPesantren::whereIdKategori(3)->orderBy('created_at', 'desc')->paginate(15);
       return view('galeri_mts', compact('galeri_pesantren'));
    }
}
