<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\PendidikanOrtu;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class PendidikanOrtuController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pendidikan_ortu = PendidikanOrtu::orderBy('created_at', 'desc')->get();
        return view('admin.pendidikanortu.list',array('pendidikan_ortu'=>$pendidikan_ortu, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.pendidikanortu.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $pendidikan_ortu = new PendidikanOrtu;
        $pendidikan_ortu->pendidikan_ortu   = Input::get('pendidikan_ortu');
        $pendidikan_ortu->save();

        // redirect
        return Redirect::action('admin\PendidikanOrtuController@index')->with('flash-success','The user has been added.');
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
        $pendidikan_ortu = PendidikanOrtu::where('id', $id)->firstOrFail();   
        return view('admin.pendidikanortu.show', compact('pendidikan_ortu'),array('user' => $user));
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
        $pendidikan_ortu = PendidikanOrtu::where('id', $id)->firstOrFail();   
        return view('admin.pendidikanortu.edit', compact('pendidikan_ortu'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $pendidikan_ortu = PendidikanOrtu::findOrFail($id);
        $pendidikan_ortu->pendidikan_ortu      = Input::get('pendidikan_ortu');
        $pendidikan_ortu->save();

        return Redirect::action('admin\PendidikanOrtuController@index', compact('pendidikan_ortu'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $pendidikan_ortu = PendidikanOrtu::where('id', $id)->firstOrFail();
        $pendidikan_ortu->delete();
        return Redirect::action('admin\PendidikanOrtuController@index');
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
        $pendidikan_ortu = PendidikanOrtu::where('pendidikan_ortu','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.pendidikanortu.list', compact('pendidikan_ortu'),array('user' => $user));
    }
}