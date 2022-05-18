<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GaleriPesantren;

class GaleriPesantrenFrontController extends Controller
{
    public function index()
    {
       $galeri_pesantren = GaleriPesantren::whereIdKategori(1)->orderBy('created_at', 'desc')->paginate(15);
       return view('galeri_pesantren', compact('galeri_pesantren'));
    }
}
