<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcaraFrontController extends Controller
{
    public function index()
    {
       return view('acara_detail');
    }
}
