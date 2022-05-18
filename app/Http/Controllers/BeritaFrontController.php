<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;

class BeritaFrontController extends Controller
{
    public function index($slug)
    {
       $berita = Berita::where('slug', $slug)->first();
       return view('berita_detail', compact('berita'));
    }
}
