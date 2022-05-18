<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\DetailLembaga;
use App\KategoriLembaga;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class DetailLembagaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $detail_lembaga = DetailLembaga::leftjoin('kategori_lembagas', 'kategori_lembagas.id', '=', 'detail_lembagas.id_kategori')
        ->orderBy('detail_lembagas.created_at', 'desc')
        ->select(
            'detail_lembagas.id',
            'detail_lembagas.deskripsi',
            'kategori_lembagas.kategori_lembaga')
        ->paginate(10);
        return view('admin.detail_lembaga.list',compact('detail_lembaga'), array('detail_lembaga'=>$detail_lembaga, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $kategori_lembaga=KategoriLembaga::pluck('kategori_lembaga', 'id');
        return View::make('admin.detail_lembaga.create', compact('detail_lembaga', 'kategori_lembaga'), array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $detail_lembaga = new DetailLembaga;
        $detail_lembaga ->deskripsi              = Input::get('deskripsi');
        $detail_lembaga ->id_kategori            = Input::get('id_kategori');
        $detail_lembaga->save();
        // redirect
        return Redirect::action('admin\DetailLembagaController@index')->with('flash-success','The user has been added.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $user = Auth::user();
        $detail_lembaga = DetailLembaga::leftjoin('kategori_lembagas', 'kategori_lembagas.id', '=', 'detail_lembagas.id_kategori')
        ->orderBy('detail_lembagas.created_at', 'desc')
        ->select(
            'detail_lembagas.id',
            'detail_lembagas.deskripsi',
            'kategori_lembagas.kategori_lembaga')
        ->where('detail_lembagas.id', $id)
        ->firstOrFail();   
        return view('admin.detail_lembaga.show', compact('detail_lembaga'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user = Auth::user();
        $detail_lembaga = DetailLembaga::where('id', $id)->firstOrFail();
        $kategori_lembaga=KategoriLembaga::pluck('kategori_lembaga', 'id');   
        return view('admin.detail_lembaga.edit', compact('detail_lembaga', 'kategori_lembaga'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $detail_lembaga = DetailLembaga::findOrFail($id); 
        $detail_lembaga ->deskripsi              = Input::get('deskripsi');
        $detail_lembaga ->id_kategori            = Input::get('id_kategori');
        $detail_lembaga->save();
        return Redirect::action('admin\DetailLembagaController@index', compact('detail_lembaga'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $detail_lembaga = DetailLembaga::where('id', $id)->firstOrFail();
        $detail_lembaga->delete();
        return Redirect::action('admin\DetailLembagaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $user = Auth::user();
        $search = $request->get('search');
        $detail_lembaga = DetailLembaga::where('deskripsi','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.detail_lembaga.list', compact('detail_lembaga'),array('user' => $user));
    }
}