<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\KategoriGaleri;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class KategoriGaleriController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kategori_galeri = KategoriGaleri::orderBy('created_at', 'desc')->get();
        return view('admin.kategorigaleri.list',array('kategori_galeri'=>$kategori_galeri, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.kategorigaleri.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $kategori_galeri = new KategoriGaleri;
        $kategori_galeri->kategori_galeri   = Input::get('kategori_galeri');
        $kategori_galeri->save();

        // redirect
        return Redirect::action('admin\KategoriGaleriController@index')->with('flash-success','The user has been added.');
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
        $kategori_galeri = KategoriGaleri::where('id', $id)->firstOrFail();   
        return view('admin.kategorigaleri.show', compact('kategori_galeri'),array('user' => $user));
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
        $kategori_galeri = KategoriGaleri::where('id', $id)->firstOrFail();   
        return view('admin.kategorigaleri.edit', compact('kategori_galeri'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $kategori_galeri = KategoriGaleri::findOrFail($id);
        $kategori_galeri->kategori_galeri      = Input::get('kategori_galeri');
        $kategori_galeri->save();

        return Redirect::action('admin\KategoriGaleriController@index', compact('kategori_galeri'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $kategori_galeri = KategoriGaleri::where('id', $id)->firstOrFail();
        $kategori_galeri->delete();
        return Redirect::action('admin\KategoriGaleriController@index');
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
        $kategori_galeri = KategoriGaleri::where('kategori_galeri','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.kategorigaleri.list', compact('kategori_galeri'),array('user' => $user));
    }
}