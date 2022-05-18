<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\KategoriPimpinan;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class KategoriPimpinanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kategori_pimpinan=  KategoriPimpinan::orderBy('created_at', 'desc')->get();
        return view('admin.kategori_pimpinan.list',array('kategori_pimpinan'=>$kategori_pimpinan, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.kategori_pimpinan.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $kategori_pimpinan = new  KategoriPimpinan;
        $kategori_pimpinan->kategori_pimpinan   = Input::get('kategori_pimpinan');
        $kategori_pimpinan->save();

        // redirect
        return Redirect::action('admin\KategoriPimpinanController@index')->with('flash-success','The user has been added.');
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
        $kategori_pimpinan =  KategoriPimpinan::where('id', $id)->firstOrFail();   
        return view('admin.kategori_pimpinan.show', compact('kategori_pimpinan'),array('user' => $user));
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
        $kategori_pimpinan =  KategoriPimpinan::where('id', $id)->firstOrFail();   
        return view('admin.kategori_pimpinan.edit', compact('kategori_pimpinan'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $kategori_pimpinan =  KategoriPimpinan::findOrFail($id);
        $kategori_pimpinan->kategori_pimpinan      = Input::get('kategori_pimpinan');
        $kategori_pimpinan->save();

        return Redirect::action('admin\KategoriPimpinanController@index', compact('kategori_pimpinan'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $kategori_pimpinan =  KategoriPimpinan::where('id', $id)->firstOrFail();
        $kategori_pimpinan->delete();
        return Redirect::action('admin\KategoriPimpinanController@index');
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
        $kategori_pimpinan = KategoriPimpinan::where('kategori_pimpinan','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.kategori_pimpinan.list', compact('kategori_pimpinan'),array('user' => $user));
    }
}