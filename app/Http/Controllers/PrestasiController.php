<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestasi;

class PrestasiController extends Controller
{
    public function index()
    {
       $prestasi_sirmis = Prestasi::orderBy('created_at', 'desc')->paginate(6);
       return view('prestasi', compact('prestasi_sirmis'));
    }

    public function prestasi($id)
    {
       $prestasi_sirmis = Prestasi::where('id', $id)->firstOrFail();
       return view('prestasi_detail', compact('prestasi_sirmis'));
    }

    public function search(Request $request){
        $search = $request->get('search');
        $prestasi_sirmis = Prestasi::where('name','LIKE','%'.$search.'%')
        ->orwhere('jenis','LIKE','%'.$search.'%')
        ->paginate(10);
        return view('prestasi', compact('prestasi_sirmis'));
    }
}
