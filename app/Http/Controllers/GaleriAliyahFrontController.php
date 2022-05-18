<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GaleriPesantren;

class GaleriAliyahFrontController extends Controller
{
    public function index()
    {
       $galeri_pesantren = GaleriPesantren::whereIdKategori(2)->orderBy('created_at', 'desc')->paginate(15);
       return view('galeri_aliyah', compact('galeri_pesantren'));
    }
}
