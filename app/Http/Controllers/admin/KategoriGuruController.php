<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\KategoriGuru;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class KategoriGuruController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kategori_guru = KategoriGuru::orderBy('created_at', 'desc')->get();
        return view('admin.kategoriguru.list',array('kategori_guru'=>$kategori_guru, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.kategoriguru.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $kategori_guru = new KategoriGuru;
        $kategori_guru->kategori_guru     = Input::get('kategori_guru');
        $kategori_guru->save();

        // redirect
        return Redirect::action('admin\KategoriGuruController@index')->with('flash-success','The user has been added.');
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
        $kategori_guru = KategoriGuru::where('id', $id)->firstOrFail();   
        return view('admin.kategoriguru.show', compact('kategori_guru'),array('user' => $user));
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
        $kategori_guru = KategoriGuru::where('id', $id)->firstOrFail();   
        return view('admin.kategoriguru.edit', compact('kategori_guru'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $kategori_guru = KategoriGuru::findOrFail($id);
        $kategori_guru->kategori_guru      = Input::get('kategori_guru');
        $kategori_guru->save();

        return Redirect::action('admin\KategoriGuruController@index', compact('kategori_guru'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $kategori_guru = KategoriGuru::where('id', $id)->firstOrFail();
        $kategori_guru->delete();
        return Redirect::action('admin\KategoriGuruController@index');
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
        $kategori_guru = KategoriGuru::where('kategori_guru','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.kategoriguru.list', compact('kategori_guru'),array('user' => $user));
    }
}