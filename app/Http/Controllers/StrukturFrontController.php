<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Struktur;

class StrukturFrontController extends Controller
{
    public function index()
    {
       $struktur_sirmis = Struktur::orderBy('created_at', 'desc')->get();
       return view('struktur', compact('struktur_sirmis'));
    }
}
