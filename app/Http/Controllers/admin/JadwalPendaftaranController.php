<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\JadwalPendaftaran;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class JadwalPendaftaranController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $schedulles = JadwalPendaftaran::orderBy('created_at', 'desc')->get();
        return view('admin.jadwal_pendaftaran.list',array('schedulles'=>$schedulles, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('admin.jadwal_pendaftaran.create');
    }

    public function store(Request $request)
    {
        // store
        $schedulle = new JadwalPendaftaran;
        $schedulle->desc             = Input::get('desc');
        $schedulle->save();

        // redirect
        return Redirect::action('admin\JadwalPendaftaranController@index')->with('flash-success','The user has been added.');
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
        $schedulle = JadwalPendaftaran::where('id', $id)->firstOrFail();   
        return view('admin.jadwal_pendaftaran.show', compact('schedulle'),array('user' => $user));
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
        $schedulle = JadwalPendaftaran::where('id', $id)->firstOrFail();   
        return view('admin.jadwal_pendaftaran.edit', compact('schedulle'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $schedulle = JadwalPendaftaran::findOrFail($id);
        $schedulle->desc             = Input::get('desc');
        $schedulle->save();

        return Redirect::action('admin\JadwalPendaftaranController@index', compact('schedulle'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $schedulle = JadwalPendaftaran::where('id', $id)->firstOrFail();
        $schedulle->delete();
        return Redirect::action('admin\JadwalPendaftaranController@index');
    }
}