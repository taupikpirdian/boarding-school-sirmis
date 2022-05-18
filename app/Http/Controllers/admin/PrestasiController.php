<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Prestasi;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use File;

class PrestasiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $prestasi_sirmis = Prestasi::orderBy('created_at', 'desc')->paginate(25);
        return view('admin.prestasi_sirmis.list',array('prestasi_sirmis'=>$prestasi_sirmis, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.prestasi_sirmis.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $prestasi_sirmis = new Prestasi;
        $prestasi_sirmis->name          = Input::get('name');
        $prestasi_sirmis->jenis         = Input::get('jenis');
        $prestasi_sirmis->deskripsi     = Input::get('deskripsi');
        // add image
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/prestasi/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/prestasi');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $prestasi_sirmis->img = $imageName;
        }

        $prestasi_sirmis->save();
        // redirect
        return Redirect::action('admin\PrestasiController@index')->with('flash-success','The user has been added.');
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
        $prestasi_sirmis = Prestasi::where('id', $id)->firstOrFail();   
        return view('admin.prestasi_sirmis.show', compact('prestasi_sirmis'),array('user' => $user));
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
        $prestasi_sirmis = Prestasi::where('id', $id)->firstOrFail();   
        return view('admin.prestasi_sirmis.edit', compact('prestasi_sirmis'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $prestasi_sirmis = Prestasi::findOrFail($id);
        $prestasi_sirmis->name          = Input::get('name');
        $prestasi_sirmis->jenis         = Input::get('jenis');
        $prestasi_sirmis->deskripsi     = Input::get('deskripsi');
        // addfoto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/prestasi/thumbs');
              $image = Image::make($img->getRealPath());
              $image->fit(400, 400);
              $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/prestasi');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $prestasi_sirmis->img = $imageName;
        }

        $prestasi_sirmis->save();
        return Redirect::action('admin\PrestasiController@index', compact('prestasi_sirmis'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $prestasi_sirmis = Prestasi::where('id', $id)->firstOrFail();
        $prestasi_sirmis->delete();
        return Redirect::action('admin\PrestasiController@index');
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
        $prestasi_sirmis = Prestasi::where('name','LIKE','%'.$search.'%')
        ->orwhere('jenis','LIKE','%'.$search.'%')
        ->paginate(10);
        return view('admin.prestasi_sirmis.list', compact('prestasi_sirmis'),array('user' => $user));
    }
}