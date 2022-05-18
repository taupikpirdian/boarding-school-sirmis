<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\PekerjaanOrtu;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class PekerjaanOrtuController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pekerjaan_ortu= PekerjaanOrtu::orderBy('created_at', 'desc')->get();
        return view('admin.pekerjaanortu.list',array('pekerjaan_ortu'=>$pekerjaan_ortu, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.pekerjaanortu.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $pekerjaan_ortu = new PekerjaanOrtu;
        $pekerjaan_ortu->pekerjaan_ortu   = Input::get('pekerjaan_ortu');
        $pekerjaan_ortu->save();

        // redirect
        return Redirect::action('admin\PekerjaanOrtuController@index')->with('flash-success','The user has been added.');
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
        $pekerjaan_ortu = PekerjaanOrtu::where('id', $id)->firstOrFail();   
        return view('admin.pekerjaanortu.show', compact('pekerjaan_ortu'),array('user' => $user));
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
        $pekerjaan_ortu = PekerjaanOrtu::where('id', $id)->firstOrFail();   
        return view('admin.pekerjaanortu.edit', compact('pekerjaan_ortu'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $pekerjaan_ortu = PekerjaanOrtu::findOrFail($id);
        $pekerjaan_ortu->pekerjaan_ortu      = Input::get('pekerjaan_ortu');
        $pekerjaan_ortu->save();

        return Redirect::action('admin\PekerjaanOrtuController@index', compact('pekerjaan_ortu'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $pekerjaan_ortu = PekerjaanOrtu::where('id', $id)->firstOrFail();
        $pekerjaan_ortu->delete();
        return Redirect::action('admin\PekerjaanOrtuController@index');
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
        $pekerjaan_ortu = PekerjaanOrtu::where('pekerjaan_ortu','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.pekerjaanortu.list', compact('pekerjaan_ortu'),array('user' => $user));
    }
}