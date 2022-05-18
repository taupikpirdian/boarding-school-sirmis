<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\BiodataGuruAliyah;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class BiodataGuruAliyahController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $biodata_guru_aliyah = BiodataGuruAliyah::orderBy('created_at', 'desc')->get();
        return view('admin.biodata_guru_aliyah.list',array('biodata_guru_aliyah'=>$biodata_guru_aliyah, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.biodata_guru_aliyah.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $biodata_guru_aliyah = new BiodataGuruAliyah;
        $biodata_guru_aliyah ->nama              = Input::get('nama');
        $biodata_guru_aliyah ->nip               = Input::get('nip');
        $biodata_guru_aliyah ->tempat_lahir      = Input::get('tempat_lahir');
        $biodata_guru_aliyah ->tanggal_lahir     = Input::get('tanggal_lahir');
        $biodata_guru_aliyah ->jk                = Input::get('jk');
        $biodata_guru_aliyah ->status            = Input::get('status');
        $biodata_guru_aliyah ->alamat            = Input::get('alamat');
        $biodata_guru_aliyah ->matpel            = Input::get('matpel');
        $biodata_guru_aliyah ->awal_masuk        = Input::get('awal_masuk');
        
        //add
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/biodata/guru/aliyah/thumbs');
              $image = Image::make($img->getRealPath());
              $image->fit(400, 400);
              $image->save($destinationPath.'/'.$imageName);

            //original
            $destinationPath = public_path('images/biodata/guru/aliyah');
            $img = Image::make($img)->encode('jpg', 100);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $biodata_guru_aliyah->img = $imageName;
        }

        $biodata_guru_aliyah->save();
        // redirect
        return Redirect::action('admin\BiodataGuruAliyahController@index')->with('flash-success','The user has been added.');
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
        $biodata_guru_aliyah = BiodataGuruAliyah::where('id', $id)->firstOrFail();   
        return view('admin.biodata_guru_aliyah.show', compact('biodata_guru_aliyah'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show_biodata_guru_aliyah()
    {
        $biodata_guru_aliyah = BiodataGuruAliyah::orderBy('created_at', 'desc')->get();
        return view('biodata_guru_aliyah', array('biodata_guru_aliyah'=>$biodata_guru_aliyah));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $biodata_guru_aliyah = BiodataGuruAliyah::where('id', $id)->firstOrFail();   
        return view('admin.biodata_guru_aliyah.edit', compact('biodata_guru_aliyah'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $biodata_guru_aliyah = BiodataGuruAliyah::findOrFail($id); 
        $biodata_guru_aliyah ->nama              = Input::get('nama');
        $biodata_guru_aliyah ->nip               = Input::get('nip');
        $biodata_guru_aliyah ->tempat_lahir      = Input::get('tempat_lahir');
        $biodata_guru_aliyah ->tanggal_lahir     = Input::get('tanggal_lahir');
        $biodata_guru_aliyah ->jk                = Input::get('jk');
        $biodata_guru_aliyah ->status            = Input::get('status');
        $biodata_guru_aliyah ->alamat            = Input::get('alamat');
        $biodata_guru_aliyah ->matpel            = Input::get('matpel');
        $biodata_guru_aliyah ->awal_masuk        = Input::get('awal_masuk');
        
        //add foto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/biodata/guru/aliyah/thumbs');
              $image = Image::make($img->getRealPath());
              $image->fit(200, 200);
              $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/biodata/guru/aliyah');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $biodata_guru_aliyah->img = $imageName;
        }
        
        $biodata_guru_aliyah->save();
        return Redirect::action('admin\BiodataGuruAliyahController@index', compact('biodata_guru_aliyah'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $biodata_guru_aliyah = BiodataGuruAliyah::where('id', $id)->firstOrFail();
        $biodata_guru_aliyah->delete();
        return Redirect::action('admin\BiodataGuruAliyahController@index');
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
        $biodata_guru_aliyah = BiodataGuruAliyah::where('nama','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.biodata_guru_aliyah.list', compact('biodata_guru_aliyah'),array('user' => $user));
    }
}