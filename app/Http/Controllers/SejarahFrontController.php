<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sejarah;

class SejarahFrontController extends Controller
{
    public function index()
    {
       $sejarah_sirmis = Sejarah::first();
    //    dd($sejarah_sirmis);
       return view('sejarah_sirmis', compact('sejarah_sirmis'));
    }
}
