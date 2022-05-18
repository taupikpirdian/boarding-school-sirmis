<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\KategoriArtikel;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class KategoriArtikelController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kategori_artikel=  KategoriArtikel::orderBy('created_at', 'desc')->get();
        return view('admin.kategoriartikel.list',array('kategori_artikel'=>$kategori_artikel, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.kategoriartikel.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $kategori_artikel = new  KategoriArtikel;
        $kategori_artikel->kategori_artikel   = Input::get('kategori_artikel');
        $kategori_artikel->save();

        // redirect
        return Redirect::action('admin\KategoriArtikelController@index')->with('flash-success','The user has been added.');
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
        $kategori_artikel =  KategoriArtikel::where('id', $id)->firstOrFail();   
        return view('admin.kategoriartikel.show', compact('kategori_artikel'),array('user' => $user));
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
        $kategori_artikel =  KategoriArtikel::where('id', $id)->firstOrFail();   
        return view('admin.kategoriartikel.edit', compact('kategori_artikel'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $kategori_artikel =  KategoriArtikel::findOrFail($id);
        $kategori_artikel->kategori_artikel      = Input::get('kategori_artikel');
        $kategori_artikel->save();

        return Redirect::action('admin\KategoriArtikelController@index', compact('kategori_artikel'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $kategori_artikel =  KategoriArtikel::where('id', $id)->firstOrFail();
        $kategori_artikel->delete();
        return Redirect::action('admin\KategoriArtikelController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request){
        $user = Auth::user();
        $search = $request->get('search');
        $kategori_artikel = KategoriArtikel::where('kategori_artikel','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.kategoriartikel.list', compact('kategori_artikel'),array('user' => $user));
    }
}