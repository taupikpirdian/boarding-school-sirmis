<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tujuan;

class TujuanFrontController extends Controller
{
    public function index()
    {
       $tujuan_sirmis = Tujuan::orderBy('created_at', 'desc')->get();
       return view('tujuan', compact('tujuan_sirmis'));
    }
}
