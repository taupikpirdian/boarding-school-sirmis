<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataGuruMtsController extends Controller
{
    public function index()
    {
       return view('biodata_guru_mts');
    }
}
