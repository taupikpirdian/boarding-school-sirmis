<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataGuruPesantrenController extends Controller
{
    public function index()
    {
       return view('biodata_guru_pesantren');
    }
}
