<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisiMisi;
use App\Tujuan;

class VisiMisiFrontController extends Controller
{
    public function index()
    {
       $visi_misi = VisiMisi::orderBy('created_at', 'desc')->whereIdKategori(1)->limit(1)->get();
       $tujuans = Tujuan::orderBy('created_at', 'desc')->limit(1)->get();
       return view('visimisitarget', compact('visi_misi', 'tujuans'));
    }
}
