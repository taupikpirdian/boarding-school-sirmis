<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\JenisKelamin;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class JenisKelaminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $jenis_kelamin = JenisKelamin::orderBy('created_at', 'desc')->get();
        return view('admin.jenis_kelamin.list',array('jenis_kelamin'=>$jenis_kelamin, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.jenis_kelamin.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $jenis_kelamin = new JenisKelamin;
        $jenis_kelamin->name     = Input::get('name');
        $jenis_kelamin->save();

        // redirect
        return Redirect::action('admin\JenisKelaminController@index')->with('flash-success','The user has been added.');
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
        $jenis_kelamin = JenisKelamin::where('id', $id)->firstOrFail();   
        return view('admin.jenis_kelamin.show', compact('jenis_kelamin'),array('user' => $user));
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
        $jenis_kelamin = JenisKelamin::where('id', $id)->firstOrFail();   
        return view('admin.jenis_kelamin.edit', compact('jenis_kelamin'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $jenis_kelamin = JenisKelamin::findOrFail($id);
        $jenis_kelamin->name      = Input::get('name');
        $jenis_kelamin->save();

        return Redirect::action('admin\JenisKelaminController@index', compact('jenis_kelamin'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $jenis_kelamin = JenisKelamin::where('id', $id)->firstOrFail();
        $jenis_kelamin->delete();
        return Redirect::action('admin\JenisKelaminController@index');
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
        $jenis_kelamin = JenisKelamin::where('name','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.jenis_kelamin.list', compact('jenis_kelamin'),array('user' => $user));
    }
}