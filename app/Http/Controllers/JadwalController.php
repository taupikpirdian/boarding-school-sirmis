<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
       $jadwal_sirmis = Jadwal::first();
       return view('jadwal', compact('jadwal_sirmis'));
    }
}
