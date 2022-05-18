<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Matpel;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class MatpelController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $matpel = Matpel::orderBy('created_at', 'desc')->get();
        return view('admin.matpel.list',array('matpel'=>$matpel, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.matpel.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $matpel = new Matpel;
        $matpel->matpel     = Input::get('matpel');
        $matpel->save();

        // redirect
        return Redirect::action('admin\MatpelController@index')->with('flash-success','The user has been added.');
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
        $matpel = Matpel::where('id', $id)->firstOrFail();   
        return view('admin.matpel.show', compact('matpel'),array('user' => $user));
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
        $matpel = Matpel::where('id', $id)->firstOrFail();   
        return view('admin.matpel.edit', compact('matpel'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $matpel = Matpel::findOrFail($id);
        $matpel->matpel      = Input::get('matpel');
        $matpel->save();

        return Redirect::action('admin\MatpelController@index', compact('matpel'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $matpel = Matpel::where('id', $id)->firstOrFail();
        $matpel->delete();
        return Redirect::action('admin\MatpelController@index');
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
        $matpel = Matpel::where('matpel','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.matpel.list', compact('matpel'),array('user' => $user));
    }
}