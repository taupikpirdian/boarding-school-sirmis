<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\KategoriAcara;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class KategoriAcaraController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kategori_acara= KategoriAcara::orderBy('created_at', 'desc')->get();
        return view('admin.kategoriacara.list',array('kategori_acara'=>$kategori_acara, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.kategoriacara.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $kategori_acara = new KategoriAcara;
        $kategori_acara->kategori_acara   = Input::get('kategori_acara');
        $kategori_acara->save();

        // redirect
        return Redirect::action('admin\KategoriAcaraController@index')->with('flash-success','The user has been added.');
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
        $kategori_acara = KategoriAcara::where('id', $id)->firstOrFail();   
        return view('admin.kategoriacara.show', compact('kategori_acara'),array('user' => $user));
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
        $kategori_acara = KategoriAcara::where('id', $id)->firstOrFail();   
        return view('admin.kategoriacara.edit', compact('kategori_acara'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $kategori_acara = KategoriAcara::findOrFail($id);
        $kategori_acara->kategori_acara      = Input::get('kategori_acara');
        $kategori_acara->save();

        return Redirect::action('admin\KategoriAcaraController@index', compact('kategori_acara'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $kategori_acara = KategoriAcara::where('id', $id)->firstOrFail();
        $kategori_acara->delete();
        return Redirect::action('admin\KategoriAcaraController@index');
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
        $kategori_acara = KategoriAcara::where('kategori_acara','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.kategoriacara.list', compact('kategori_acara'),array('user' => $user));
    }
}