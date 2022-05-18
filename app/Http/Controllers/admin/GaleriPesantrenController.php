<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\GaleriPesantren;
use App\KategoriGaleri;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use File;

class GaleriPesantrenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $galeri_pesantren = GaleriPesantren::leftjoin('kategori_galeris', 'kategori_galeris.id', '=', 'galeri_pesantrens.id_kategori')
        ->orderBy('galeri_pesantrens.created_at', 'desc')
        ->select(
            'galeri_pesantrens.id',
            'galeri_pesantrens.title',
            'galeri_pesantrens.img',
            'kategori_galeris.kategori_galeri')
        ->paginate(25);
        return view('admin.galeripesantren.list', compact('galeri_pesantren','user'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $kategori_galeri=KategoriGaleri::pluck('kategori_galeri', 'id');
        return View::make('admin.galeripesantren.create',compact('kategori_galeri'), array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $galeri_pesantren = new GaleriPesantren;
        $galeri_pesantren->title        = Input::get('title');
        $galeri_pesantren->id_kategori  = Input::get('id_kategori');

        // addfoto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/galeri/pesantren/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            // $image->fit(400, 400);
            $image->resize(480, 430);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/galeri/pesantren');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $galeri_pesantren->img = $imageName;
        }
        $galeri_pesantren->save();
        // redirect
        return Redirect::action('admin\GaleriPesantrenController@index')->with('flash-success','The user has been added.');
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
        $galeri_pesantren = GaleriPesantren::where('id', $id)->firstOrFail();   
        return view('admin.galeripesantren.show', compact('galeri_pesantren'),array('user' => $user));
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
        $galeri_pesantren = GaleriPesantren::where('id', $id)->firstOrFail();
        $kategori_galeri=KategoriGaleri::pluck('kategori_galeri', 'id');   
        return view('admin.galeripesantren.edit', compact('galeri_pesantren', 'kategori_galeri'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $galeri_pesantren = GaleriPesantren::findOrFail($id); 
        $galeri_pesantren->title   = Input::get('title');
        $galeri_pesantren->id_kategori  = Input::get('id_kategori');

        // addfoto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/galeri/pesantren/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            // $image->fit(400, 400);
            $image->resize(480, 430);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/galeri/pesantren');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $galeri_pesantren->img = $imageName;
        }
        $galeri_pesantren->save();

        return Redirect::action('admin\GaleriPesantrenController@index', compact('galeri_pesantren'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $galeri_pesantren = GaleriPesantren::where('id', $id)->firstOrFail();
        $galeri_pesantren->delete();
        return Redirect::action('admin\GaleriPesantrenController@index');
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
        $galeri_pesantren = GaleriPesantren::where('title','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.galeripesantren.list', compact('galeri_pesantren'),array('user' => $user));
    }

    public function GaleriPesantren()
    {
        $galeri_pesantren = GaleriPesantren::orderBy('created_at', 'desc')->paginate(12);
        return view('galeripesantren',compact('galeri_pesantren'));
    }  
}