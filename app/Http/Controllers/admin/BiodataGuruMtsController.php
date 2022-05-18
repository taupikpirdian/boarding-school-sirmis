<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\BiodataGuruMts;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class BiodataGuruMtsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $biodata_guru_mts = BiodataGuruMts::orderBy('created_at', 'desc')->get();
        return view('admin.biodata_guru_mts.list',array('biodata_guru_mts'=>$biodata_guru_mts, 'user' => $user));
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.biodata_guru_mts.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        
        // store
        $biodata_guru_mts = new BiodataGuruMts;
        $biodata_guru_mts ->nama              = Input::get('nama');
        $biodata_guru_mts ->nip               = Input::get('nip');
        $biodata_guru_mts ->tempat_lahir      = Input::get('tempat_lahir');
        $biodata_guru_mts ->tanggal_lahir     = Input::get('tanggal_lahir');
        $biodata_guru_mts ->jk                = Input::get('jk');
        $biodata_guru_mts ->status            = Input::get('status');
        $biodata_guru_mts ->alamat            = Input::get('alamat');
        $biodata_guru_mts ->matpel            = Input::get('matpel');
        $biodata_guru_mts ->awal_masuk        = Input::get('awal_masuk');
        
        //add
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/biodata2/guru/mts/thumbs');
              $image = Image::make($img->getRealPath());
              $image->fit(400, 400);
              $image->save($destinationPath.'/'.$imageName);

            //original
            $destinationPath = public_path('images/biodata2/guru/mts');
            $img = Image::make($img)->encode('jpg', 100);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $biodata_guru_mts->img = $imageName;
        }

        $biodata_guru_mts->save();
        // redirect
        return Redirect::action('admin\BiodataGuruMtsController@index')->with('flash-success','The user has been added.');
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
        $biodata_guru_mts = BiodataGuruMts::where('id', $id)->firstOrFail();   
        return view('admin.biodata_guru_mts.show', compact('biodata_guru_mts'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show_biodata_guru_mts()
    {
        $biodata_guru_mts = BiodataGuruMts::orderBy('created_at', 'desc')->get();
       return view('biodata_guru_mts', array('biodata_guru_mts'=>$biodata_guru_mts));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $biodata_guru_mts = BiodataGuruMts::where('id', $id)->firstOrFail();   
        return view('admin.biodata_guru_mts.edit', compact('biodata_guru_mts'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $biodata_guru_mts = BiodataGuruMts::findOrFail($id); 
        $biodata_guru_mts ->nama              = Input::get('nama');
        $biodata_guru_mts ->nip               = Input::get('nip');
        $biodata_guru_mts ->tempat_lahir      = Input::get('tempat_lahir');
        $biodata_guru_mts ->tanggal_lahir     = Input::get('tanggal_lahir');
        $biodata_guru_mts ->jk                = Input::get('jk');
        $biodata_guru_mts ->status            = Input::get('status');
        $biodata_guru_mts ->alamat            = Input::get('alamat');
        $biodata_guru_mts ->matpel            = Input::get('matpel');
        $biodata_guru_mts ->awal_masuk        = Input::get('awal_masuk');
        
        //add foto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/biodata2/guru/mts/thumbs');
              $image = Image::make($img->getRealPath());
              $image->fit(400, 400);
              $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/biodata2/guru/mts');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $biodata_guru_mts->img = $imageName;
        }

        $biodata_guru_mts->save();
        return Redirect::action('admin\BiodataGuruMtsController@index', compact('biodata_guru_mts'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $biodata_guru_mts = BiodataGuruMts::where('id', $id)->firstOrFail();
        $biodata_guru_mts->delete();
        return Redirect::action('admin\BiodataGuruMtsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $user = Auth::user();
        $search = $request->get('search');
        $biodata_guru_mts = BiodataGuruMts::where('nama','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.biodata_guru_mts.list', compact('biodata_guru_mts'),array('user' => $user));
    }
}