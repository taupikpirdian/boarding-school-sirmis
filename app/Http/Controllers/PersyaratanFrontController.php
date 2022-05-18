<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persyaratan;

class PersyaratanFrontController extends Controller
{
    public function index()
    {
       $persyaratan = Persyaratan::first();
       return view('persyaratan', compact('persyaratan'));
    }
}
