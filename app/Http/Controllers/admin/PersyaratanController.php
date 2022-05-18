<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Persyaratan;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PersyaratanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $persyaratan = Persyaratan::orderBy('created_at', 'desc')->get();
        return view('admin.persyaratan.list',array('persyaratan'=>$persyaratan, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.persyaratan.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $persyaratan = new Persyaratan;
        $persyaratan->text           = Input::get('text');
        $persyaratan->save();
        // redirect
        return Redirect::action('admin\PersyaratanController@index')->with('flash-success','The user has been added.');
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
        $persyaratan = Persyaratan::where('id', $id)->firstOrFail();  
        return view('admin.persyaratan.show', compact('persyaratan'),array('user' => $user));
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
        $persyaratan = Persyaratan::where('id', $id)->firstOrFail();   
        return view('admin.persyaratan.edit', compact('persyaratan'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $persyaratan = Persyaratan::findOrFail($id); 
        $persyaratan->text          = Input::get('text');
        $persyaratan->save();

        return Redirect::action('admin\PersyaratanController@index', compact('persyaratan'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $persyaratan = Persyaratan::where('id', $id)->firstOrFail();
        $persyaratan->delete();
        return Redirect::action('admin\PersyaratanController@index');
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
        $persyaratan = Persyaratan::where('text','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.persyaratan.list', compact('persyaratan'),array('user' => $user));
    }
}