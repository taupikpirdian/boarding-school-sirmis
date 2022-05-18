<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\LokasiSirmis;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;

class LokasiSirmisController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $lokasi_sirmis = LokasiSirmis::orderBy('created_at', 'desc')->get();
        return view('admin.lokasi_sirmis.list',array('lokasi_sirmis'=>$lokasi_sirmis, 'user' => $user));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.lokasi_sirmis.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        $lokasi_sirmis = new LokasiSirmis;
        $lokasi_sirmis ->alamat       = Input::get('alamat');
        $lokasi_sirmis ->kontak       = Input::get('kontak');
        $lokasi_sirmis ->email        = Input::get('email');
        $lokasi_sirmis ->save();
        // redirect
        return Redirect::action('admin\LokasiSirmisController@index')->with('flash-success','The user has been added.');
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
        $lokasi_sirmis = LokasiSirmis::where('id', $id)->firstOrFail();   
        return view('admin.lokasi_sirmis.show', compact('lokasi_sirmis'),array('user' => $user));
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
        $lokasi_sirmis = LokasiSirmis::where('id', $id)->firstOrFail();   
        return view('admin.lokasi_sirmis.edit', compact('lokasi_sirmis'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $lokasi_sirmis = LokasiSirmis::findOrFail($id); 
        $lokasi_sirmis ->alamat       = Input::get('alamat');
        $lokasi_sirmis ->kontak       = Input::get('kontak');
        $lokasi_sirmis ->email        = Input::get('email');
        $lokasi_sirmis ->save();

        return Redirect::action('admin\LokasiSirmisController@index', compact('lokasi_sirmis'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $lokasi_sirmis = LokasiSirmis::where('id', $id)->firstOrFail();
        $lokasi_sirmis->delete();
        return Redirect::action('admin\LokasiSirmisController@index');
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
        $lokasi_sirmis = LokasiSirmis::where('alamat','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.lokasi_sirmis.list', compact('lokasi_sirmis'),array('user' => $user));
    } 
}