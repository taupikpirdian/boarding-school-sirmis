<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Struktur;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class StrukturController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $struktur_sirmis = Struktur::orderBy('created_at', 'desc')->get();
        return view('admin.struktur_sirmis.list',array('struktur_sirmis'=>$struktur_sirmis, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.struktur_sirmis.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $struktur_sirmis = new Struktur;
        $struktur_sirmis->isi     = Input::get('isi');
        $struktur_sirmis->save();

        // redirect
        return Redirect::action('admin\StrukturController@index')->with('flash-success','The user has been added.');
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
        $struktur_sirmis = Struktur::where('id', $id)->firstOrFail();   
        return view('admin.struktur_sirmis.show', compact('struktur_sirmis'),array('user' => $user));
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
        $struktur_sirmis = Struktur::where('id', $id)->firstOrFail();   
        return view('admin.struktur_sirmis.edit', compact('struktur_sirmis'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $struktur_sirmis = Struktur::findOrFail($id);
        $struktur_sirmis->isi      = Input::get('isi');
        $struktur_sirmis->save();

        return Redirect::action('admin\StrukturController@index', compact('struktur_sirmis'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $struktur_sirmis = Struktur::where('id', $id)->firstOrFail();
        $struktur_sirmis->delete();
        return Redirect::action('admin\StrukturController@index');
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
        $struktur_sirmis = Struktur::where('isi','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.struktur_sirmis.list', compact('struktur_sirmis'),array('user' => $user));
    }
}