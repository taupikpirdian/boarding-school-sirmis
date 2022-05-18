<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\PenghasilanOrtu;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class PenghasilanOrtuController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $penghasilan_ortu= PenghasilanOrtu::orderBy('created_at', 'desc')->get();
        return view('admin.penghasilanortu.list',array('penghasilan_ortu'=>$penghasilan_ortu, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.penghasilanortu.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $penghasilan_ortu = new PenghasilanOrtu;
        $penghasilan_ortu->penghasilan_ortu   = Input::get('penghasilan_ortu');
        $penghasilan_ortu->save();

        // redirect
        return Redirect::action('admin\PenghasilanOrtuController@index')->with('flash-success','The user has been added.');
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
        $penghasilan_ortu = PenghasilanOrtu::where('id', $id)->firstOrFail();   
        return view('admin.penghasilanortu.show', compact('penghasilan_ortu'),array('user' => $user));
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
        $penghasilan_ortu = PenghasilanOrtu::where('id', $id)->firstOrFail();   
        return view('admin.penghasilanortu.edit', compact('penghasilan_ortu'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $penghasilan_ortu = PenghasilanOrtu::findOrFail($id);
        $penghasilan_ortu->penghasilan_ortu      = Input::get('penghasilan_ortu');
        $penghasilan_ortu->save();

        return Redirect::action('admin\PenghasilanOrtuController@index', compact('penghasilan_ortu'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $penghasilan_ortu = PenghasilanOrtu::where('id', $id)->firstOrFail();
        $penghasilan_ortu->delete();
        return Redirect::action('admin\PenghasilanOrtuController@index');
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
        $penghasilan_ortu = PenghasilanOrtu::where('penghasilan_ortu','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.penghasilanortu.list', compact('penghasilan_ortu'),array('user' => $user));
    }
}