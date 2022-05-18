<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Mondok;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class MondokController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mondok_sirmis = Mondok::orderBy('created_at', 'desc')->get();
        return view('admin.mondok_sirmis.list',array('mondok_sirmis'=>$mondok_sirmis, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.mondok_sirmis.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $mondok_sirmis = new Mondok;
        $mondok_sirmis->name     = Input::get('name');
        $mondok_sirmis->save();

        // redirect
        return Redirect::action('admin\MondokController@index')->with('flash-success','The user has been added.');
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
        $mondok_sirmis = Mondok::where('id', $id)->firstOrFail();   
        return view('admin.mondok_sirmis.show', compact('mondok_sirmis'),array('user' => $user));
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
        $mondok_sirmis = Mondok::where('id', $id)->firstOrFail();   
        return view('admin.mondok_sirmis.edit', compact('mondok_sirmis'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $mondok_sirmis = Mondok::findOrFail($id);
        $mondok_sirmis->name      = Input::get('name');
        $mondok_sirmis->save();

        return Redirect::action('admin\MondokController@index', compact('mondok_sirmis'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $mondok_sirmis = Mondok::where('id', $id)->firstOrFail();
        $mondok_sirmis->delete();
        return Redirect::action('admin\MondokController@index');
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
        $mondok_sirmis = Mondok::where('name','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.mondok_sirmis.list', compact('mondok_sirmis'),array('user' => $user));
    }
}