<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\KategoriKegiatan;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class KategoriKegiatanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categorys = KategoriKegiatan::orderBy('created_at', 'desc')->get();
        return view('admin.kategori_kegiatan.list',array('categorys'=>$categorys, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('admin.kategori_kegiatan.create');
    }

    public function store(Request $request)
    {
        // store
        $category = new KategoriKegiatan;
        $category->name             = Input::get('name');
        $category->save();

        // redirect
        return Redirect::action('admin\KategoriKegiatanController@index')->with('flash-success','The user has been added.');
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
        $category = KategoriKegiatan::where('id', $id)->firstOrFail();   
        return view('admin.kategori_kegiatan.show', compact('category'),array('user' => $user));
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
        $category = KategoriKegiatan::where('id', $id)->firstOrFail();   
        return view('admin.kategori_kegiatan.edit', compact('category'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $category = KategoriKegiatan::findOrFail($id);
        $category->name             = Input::get('name');
        $category->save();

        return Redirect::action('admin\KategoriKegiatanController@index', compact('category'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $category = KategoriKegiatan::where('id', $id)->firstOrFail();
        $category->delete();
        return Redirect::action('admin\KategoriKegiatanController@index');
    }
}