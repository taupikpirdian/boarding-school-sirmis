<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\KategoriBerita;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class KategoriBeritaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kategori_berita=  KategoriBerita::orderBy('created_at', 'desc')->get();
        return view('admin.kategoriberita.list',array('kategori_berita'=>$kategori_berita, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.kategoriberita.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $kategori_berita = new  KategoriBerita;
        $kategori_berita->kategori_berita   = Input::get('kategori_berita');
        $kategori_berita->save();

        // redirect
        return Redirect::action('admin\KategoriBeritaController@index')->with('flash-success','The user has been added.');
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
        $kategori_berita =  KategoriBerita::where('id', $id)->firstOrFail();   
        return view('admin.kategoriberita.show', compact('kategori_berita'),array('user' => $user));
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
        $kategori_berita =  KategoriBerita::where('id', $id)->firstOrFail();   
        return view('admin.kategoriberita.edit', compact('kategori_berita'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $kategori_berita =  KategoriBerita::findOrFail($id);
        $kategori_berita->kategori_berita      = Input::get('kategori_berita');
        $kategori_berita->save();

        return Redirect::action('admin\KategoriBeritaController@index', compact('kategori_berita'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $kategori_berita =  KategoriBerita::where('id', $id)->firstOrFail();
        $kategori_berita->delete();
        return Redirect::action('admin\KategoriBeritaController@index');
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
        $kategori_berita = KategoriBerita::where('kategori_berita','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.kategoriberita.list', compact('kategori_berita'),array('user' => $user));
    }
}