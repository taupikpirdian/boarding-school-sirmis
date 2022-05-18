<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Kegiatan;
use App\KategoriKegiatan;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use File;


class KegiatanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kegiatans = Kegiatan::leftjoin('kategori_kegiatans', 'kategori_kegiatans.id', '=', 'kegiatans.kategori_id')
        ->orderBy('kegiatans.created_at', 'desc')
        ->select(
            'kegiatans.id',
            'kegiatans.title',
            'kegiatans.desc',
            'kegiatans.kategori_id',
            'kegiatans.img',
            'kategori_kegiatans.name')
        ->paginate(25);
        return view('admin.kegiatan_directory.list',array('kegiatans'=>$kegiatans, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriKegiatan::pluck('name', 'id');
        return View::make('admin.kegiatan_directory.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        // store
        $kegiatan = new Kegiatan;
        $kegiatan->title             = Input::get('title');
        $kegiatan->desc              = Input::get('desc');
        $kegiatan->kategori_id       = Input::get('kategori_id');
        if ($kegiatan->kategori_id == 1) {
            $kegiatan->class_css     = "in";
        } else {
            # code...
        }
        // addfoto
        $img = $request->file('img');
        $imageName = time().'.'.$img->getClientOriginalExtension();
        //thumbs
        $destinationPath = public_path('images/kegiatan/thumbs/');
        if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
        }
        $image = Image::make($img->getRealPath());
        // $image->fit(400, 400);
        $image->resize(700, 466);
        $image->save($destinationPath.'/'.$imageName);
        //original
        $destinationPath = public_path('images/kegiatan/');
        $img = Image::make($img)->encode('jpg', 50);
        $img->save($destinationPath.'/'.$imageName);
        //save data image to db
        $kegiatan->img = $imageName;
        $kegiatan->save();

        // redirect
        return Redirect::action('admin\KegiatanController@index')->with('flash-success','The user has been added.');
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
        $kegiatan = Kegiatan::leftjoin('kategori_kegiatans', 'kategori_kegiatans.id', '=', 'kegiatans.kategori_id')
        ->orderBy('kegiatans.created_at', 'desc')
        ->where('kegiatans.id', $id)
        ->select(
            'kegiatans.id',
            'kegiatans.title',
            'kegiatans.desc',
            'kegiatans.kategori_id',
            'kegiatans.img',
            'kategori_kegiatans.name')
        ->first();   
        return view('admin.kegiatan_directory.show', compact('kegiatan'),array('user' => $user));
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
        $kegiatan = Kegiatan::where('id', $id)->firstOrFail();   
        $kategori = KategoriKegiatan::pluck('name', 'id');
        return view('admin.kegiatan_directory.edit', compact('kegiatan', 'kategori'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->title             = Input::get('title');
        $kegiatan->desc              = Input::get('desc');
        $kegiatan->kategori_id       = Input::get('kategori_id');
        if ($kegiatan->kategori_id == 1) {
            $kegiatan->class_css     = "in";
        } else {
            # code...
        }
        // addfoto
        $img = $request->file('img');
            if($img){

                $imageName = time().'.'.$img->getClientOriginalExtension();
                //thumbs
                $destinationPath = public_path('images/kegiatan/thumbs/');
                if(!File::exists($destinationPath)){
                    if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            // $image->fit(400, 400);
            $image->resize(700, 466);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/kegiatan/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $kegiatan->img = $imageName;
        }
        $kegiatan->save();

        return Redirect::action('admin\KegiatanController@index', compact('kegiatan'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $kegiatan = Kegiatan::where('id', $id)->firstOrFail();
        $kegiatan->delete();
        return Redirect::action('admin\KegiatanController@index');
    }
}