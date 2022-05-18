<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontGuruMtsController extends Controller
{
    public function index()
    {
       return view('guru_mts');
    }
}
