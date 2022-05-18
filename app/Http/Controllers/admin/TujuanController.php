<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Tujuan;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class TujuanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tujuan_sirmis = Tujuan::orderBy('created_at', 'desc')->get();
        return view('admin.tujuan_sirmis.list',array('tujuan_sirmis'=>$tujuan_sirmis, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.tujuan_sirmis.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $tujuan_sirmis = new Tujuan;
        $tujuan_sirmis->isi      = Input::get('isi');
        $tujuan_sirmis->save();

        // redirect
        return Redirect::action('admin\TujuanController@index')->with('flash-success','The user has been added.');
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
        $tujuan_sirmis = Tujuan::where('id', $id)->firstOrFail();   
        return view('admin.tujuan_sirmis.show', compact('tujuan_sirmis'),array('user' => $user));
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
        $tujuan_sirmis = Tujuan::where('id', $id)->firstOrFail();   
        return view('admin.tujuan_sirmis.edit', compact('tujuan_sirmis'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $tujuan_sirmis = Tujuan::findOrFail($id);
        $tujuan_sirmis->isi      = Input::get('isi');
        $tujuan_sirmis->save();

        return Redirect::action('admin\TujuanController@index', compact('tujuan_sirmis'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $tujuan_sirmis = Tujuan::where('id', $id)->firstOrFail();
        $tujuan_sirmis->delete();
        return Redirect::action('admin\TujuanController@index');
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
        $tujuan_sirmis = Tujuan::where('isi','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.tujuan_sirmis.list', compact('tujuan_sirmis'),array('user' => $user));
    }
}