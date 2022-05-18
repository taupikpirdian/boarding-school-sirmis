<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\KategoriVisiMisi;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class KategoriVisiMisiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kategori_visimisi=  KategoriVisiMisi::orderBy('created_at', 'desc')->get();
        return view('admin.kategori_visimisi.list',array('kategori_visimisi'=>$kategori_visimisi, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.kategori_visimisi.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $kategori_visimisi = new  KategoriVisiMisi;
        $kategori_visimisi->kategori_visimisi   = Input::get('kategori_visimisi');
        $kategori_visimisi->save();

        // redirect
        return Redirect::action('admin\KategoriVisiMisiController@index')->with('flash-success','The user has been added.');
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
        $kategori_visimisi =  KategoriVisiMisi::where('id', $id)->firstOrFail();   
        return view('admin.kategori_visimisi.show', compact('kategori_visimisi'),array('user' => $user));
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
        $kategori_visimisi =  KategoriVisiMisi::where('id', $id)->firstOrFail();   
        return view('admin.kategori_visimisi.edit', compact('kategori_visimisi'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $kategori_visimisi =  KategoriVisiMisi::findOrFail($id);
        $kategori_visimisi->kategori_visimisi      = Input::get('kategori_visimisi');
        $kategori_visimisi->save();

        return Redirect::action('admin\KategoriVisiMisiController@index', compact('kategori_visimisi'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $kategori_visimisi =  KategoriVisiMisi::where('id', $id)->firstOrFail();
        $kategori_visimisi->delete();
        return Redirect::action('admin\KategoriVisiMisiController@index');
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
        $kategori_visimisi = KategoriVisiMisi::where('kategori_visimisi','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.kategori_visimisi.list', compact('kategori_visimisi'),array('user' => $user));
    }
}