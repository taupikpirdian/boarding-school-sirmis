<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Sejarah;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class SejarahController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $sejarah_sirmis = Sejarah::orderBy('created_at', 'desc')->get();
        return view('admin.sejarah_sirmis.list',array('sejarah_sirmis'=>$sejarah_sirmis, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.sejarah_sirmis.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $sejarah_sirmis = new Sejarah;
        $sejarah_sirmis->sejarah     = Input::get('sejarah');
        $sejarah_sirmis->save();

        // redirect
        return Redirect::action('admin\SejarahController@index')->with('flash-success','The user has been added.');
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
        $sejarah_sirmis = Sejarah::where('id', $id)->firstOrFail();   
        return view('admin.sejarah_sirmis.show', compact('sejarah_sirmis'),array('user' => $user));
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
        $sejarah_sirmis = Sejarah::where('id', $id)->firstOrFail();   
        return view('admin.sejarah_sirmis.edit', compact('sejarah_sirmis'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $sejarah_sirmis = Sejarah::findOrFail($id);
        $sejarah_sirmis->sejarah      = Input::get('sejarah');
        $sejarah_sirmis->save();

        return Redirect::action('admin\SejarahController@index', compact('sejarah_sirmis'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $sejarah_sirmis = Sejarah::where('id', $id)->firstOrFail();
        $sejarah_sirmis->delete();
        return Redirect::action('admin\SejarahController@index');
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
        $sejarah_sirmis = Sejarah::where('sejarah','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.sejarah_sirmis.list', compact('sejarah_sirmis'),array('user' => $user));
    }
}