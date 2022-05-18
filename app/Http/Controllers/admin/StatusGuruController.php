<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\StatusGuru;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class StatusGuruController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $status_guru = StatusGuru::orderBy('created_at', 'desc')->get();
        return view('admin.statusguru.list',array('status_guru'=>$status_guru, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.statusguru.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $status_guru = new StatusGuru;
        $status_guru->status_guru   = Input::get('status_guru');
        $status_guru->save();

        // redirect
        return Redirect::action('admin\StatusGuruController@index')->with('flash-success','The user has been added.');
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
        $status_guru = StatusGuru::where('id', $id)->firstOrFail();   
        return view('admin.statusguru.show', compact('status_guru'),array('user' => $user));
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
        $status_guru = StatusGuru::where('id', $id)->firstOrFail();   
        return view('admin.statusguru.edit', compact('status_guru'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $status_guru = StatusGuru::findOrFail($id);
        $status_guru->status_guru      = Input::get('status_guru');
        $status_guru->save();

        return Redirect::action('admin\StatusGuruController@index', compact('status_guru'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $status_guru = StatusGuru::where('id', $id)->firstOrFail();
        $status_guru->delete();
        return Redirect::action('admin\StatusGuruController@index');
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
        $status_guru = StatusGuru::where('status_guru','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.statusguru.list', compact('status_guru'),array('user' => $user));
    }
}