<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GaleriPesantren;

class AllGaleriFrontController extends Controller
{
    public function index()
    {
        $galeri_pesantren = GaleriPesantren::orderBy('created_at', 'desc')->paginate(15);
       return view('all_galeri', compact('galeri_pesantren'));
    }
}
