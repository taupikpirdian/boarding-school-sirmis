<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Target;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;

class TargetController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $target_sirmis = Target::orderBy('created_at', 'desc')->get();
        return view('admin.target_sirmis.list',array('target_sirmis'=>$target_sirmis, 'user' => $user));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.target_sirmis.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        $target_sirmis = new Target;
        $target_sirmis ->deskripsi       = Input::get('deskripsi');
        $target_sirmis ->save();
        // redirect
        return Redirect::action('admin\TargetController@index')->with('flash-success','The user has been added.');
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
        $target_sirmis = Target::where('id', $id)->firstOrFail();   
        return view('admin.target_sirmis.show', compact('target_sirmis'),array('user' => $user));
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
        $target_sirmis = Target::where('id', $id)->firstOrFail();   
        return view('admin.target_sirmis.edit', compact('target_sirmis'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $target_sirmis = Target::findOrFail($id); 
        $target_sirmis ->deskripsi       = Input::get('deskripsi');
        $target_sirmis ->save();

        return Redirect::action('admin\TargetController@index', compact('target_sirmis'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $target_sirmis = Target::where('id', $id)->firstOrFail();
        $target_sirmis->delete();
        return Redirect::action('admin\TargetController@index');
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
        $target_sirmis = Target::where('deskripsi','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.target_sirmis.list', compact('target_sirmis'),array('user' => $user));
    } 
}