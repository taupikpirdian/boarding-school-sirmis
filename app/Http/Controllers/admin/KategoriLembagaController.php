<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\KategoriLembaga;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class KategoriLembagaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kategori_lembaga=  KategoriLembaga::orderBy('created_at', 'desc')->get();
        return view('admin.kategori_lembaga.list',array('kategori_lembaga'=>$kategori_lembaga, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.kategori_lembaga.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $kategori_lembaga = new  KategoriLembaga;
        $kategori_lembaga->kategori_lembaga   = Input::get('kategori_lembaga');
        $kategori_lembaga->save();

        // redirect
        return Redirect::action('admin\KategoriLembagaController@index')->with('flash-success','The user has been added.');
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
        $kategori_lembaga =  KategoriLembaga::where('id', $id)->firstOrFail();   
        return view('admin.kategori_lembaga.show', compact('kategori_lembaga'),array('user' => $user));
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
        $kategori_lembaga =  KategoriLembaga::where('id', $id)->firstOrFail();   
        return view('admin.kategori_lembaga.edit', compact('kategori_lembaga'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $kategori_lembaga =  KategoriLembaga::findOrFail($id);
        $kategori_lembaga->kategori_lembaga      = Input::get('kategori_lembaga');
        $kategori_lembaga->save();

        return Redirect::action('admin\KategoriLembagaController@index', compact('kategori_lembaga'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $kategori_lembaga =  KategoriLembaga::where('id', $id)->firstOrFail();
        $kategori_lembaga->delete();
        return Redirect::action('admin\KategoriLembagaController@index');
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
        $kategori_lembaga = KategoriLembaga::where('kategori_lembaga','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.kategori_lembaga.list', compact('kategori_lembaga'),array('user' => $user));
    }
}