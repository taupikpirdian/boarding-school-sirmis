<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\UkuranSeragam;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class UkuranSeragamController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $ukuran_seragam=  UkuranSeragam::orderBy('created_at', 'desc')->get();
        return view('admin.ukuranseragam.list',array('ukuran_seragam'=>$ukuran_seragam, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.ukuranseragam.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $ukuran_seragam = new  UkuranSeragam;
        $ukuran_seragam->ukuran_seragam   = Input::get('ukuran_seragam');
        $ukuran_seragam->save();

        // redirect
        return Redirect::action('admin\UkuranSeragamController@index')->with('flash-success','The user has been added.');
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
        $ukuran_seragam =  UkuranSeragam::where('id', $id)->firstOrFail();   
        return view('admin.ukuranseragam.show', compact('ukuran_seragam'),array('user' => $user));
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
        $ukuran_seragam =  UkuranSeragam::where('id', $id)->firstOrFail();   
        return view('admin.ukuranseragam.edit', compact('ukuran_seragam'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $ukuran_seragam =  UkuranSeragam::findOrFail($id);
        $ukuran_seragam->ukuran_seragam      = Input::get('ukuran_seragam');
        $ukuran_seragam->save();

        return Redirect::action('admin\UkuranSeragamController@index', compact('ukuran_seragam'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $ukuran_seragam =  UkuranSeragam::where('id', $id)->firstOrFail();
        $ukuran_seragam->delete();
        return Redirect::action('admin\UkuranSeragamController@index');
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
        $ukuran_seragam = UkuranSeragam::where('ukuran_seragam','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.ukuranseragam.list', compact('ukuran_seragam'),array('user' => $user));
    }
}