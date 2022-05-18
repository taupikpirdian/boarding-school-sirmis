<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Jadwal;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;

class JadwalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $jadwal_sirmis = Jadwal::orderBy('created_at', 'desc')->get();
        return view('admin.jadwal_sirmis.list',array('jadwal_sirmis'=>$jadwal_sirmis, 'user' => $user));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.jadwal_sirmis.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        $jadwal_sirmis = new Jadwal;
        $jadwal_sirmis ->deskripsi       = Input::get('deskripsi');
        $jadwal_sirmis ->save();
        // redirect
        return Redirect::action('admin\JadwalController@index')->with('flash-success','The user has been added.');
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
        $jadwal_sirmis = Jadwal::where('id', $id)->firstOrFail();   
        return view('admin.jadwal_sirmis.show', compact('jadwal_sirmis'),array('user' => $user));
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
        $jadwal_sirmis = Jadwal::where('id', $id)->firstOrFail();   
        return view('admin.jadwal_sirmis.edit', compact('jadwal_sirmis'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $jadwal_sirmis = Jadwal::findOrFail($id); 
        $jadwal_sirmis ->deskripsi       = Input::get('deskripsi');
        $jadwal_sirmis ->save();

        return Redirect::action('admin\JadwalController@index', compact('jadwal_sirmis'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $jadwal_sirmis = Jadwal::where('id', $id)->firstOrFail();
        $jadwal_sirmis->delete();
        return Redirect::action('admin\JadwalController@index');
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
        $jadwal_sirmis = Jadwal::where('deskripsi','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.jadwal_sirmis.list', compact('jadwal_sirmis'),array('user' => $user));
    } 
}