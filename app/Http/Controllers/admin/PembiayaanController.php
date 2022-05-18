<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Pembiayaan;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class PembiayaanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $costs = Pembiayaan::orderBy('created_at', 'desc')->get();
        return view('admin.pembiayaan_santri.list',array('costs'=>$costs, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('admin.pembiayaan_santri.create');
    }

    public function store(Request $request)
    {
        // store
        $cost = new Pembiayaan;
        $cost->desc             = Input::get('desc');
        $cost->save();

        // redirect
        return Redirect::action('admin\PembiayaanController@index')->with('flash-success','The user has been added.');
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
        $cost = Pembiayaan::where('id', $id)->firstOrFail();   
        return view('admin.pembiayaan_santri.show', compact('cost'),array('user' => $user));
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
        $cost = Pembiayaan::where('id', $id)->firstOrFail();   
        return view('admin.pembiayaan_santri.edit', compact('cost'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $cost = Pembiayaan::findOrFail($id);
        $cost->desc             = Input::get('desc');
        $cost->save();

        return Redirect::action('admin\PembiayaanController@index', compact('cost'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $cost = Pembiayaan::where('id', $id)->firstOrFail();
        $cost->delete();
        return Redirect::action('admin\PembiayaanController@index');
    }
}