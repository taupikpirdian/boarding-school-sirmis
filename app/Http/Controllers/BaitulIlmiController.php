<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaitulIlmiController extends Controller
{
    public function index()
    {
       return view('baitul_ilmi.index');
    }
}
