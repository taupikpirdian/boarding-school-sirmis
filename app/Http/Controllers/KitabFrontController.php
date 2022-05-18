<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KitabFrontController extends Controller
{
    public function index()
    {
       return view('kitab');
    }
}
