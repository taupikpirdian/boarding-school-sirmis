<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KegiatanFrontController extends Controller
{
    public function index()
    {
       return view('kegiatan_harian');
    }
}
