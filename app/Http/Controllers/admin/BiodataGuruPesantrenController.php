<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\BiodataGuruPesantren;
use App\StatusGuru;
use App\KategoriGuru;
use App\Matpel;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use File;

class BiodataGuruPesantrenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $biodata_guru_pesantren = BiodataGuruPesantren::orderBy('created_at', 'desc')->get();
        $biodata_guru_pesantren = BiodataGuruPesantren::leftjoin('kategori_gurus', 'kategori_gurus.id', '=', 'biodata_guru_pesantrens.id_kategori')
        ->leftjoin('status_gurus','status_gurus.id', '=' ,'biodata_guru_pesantrens.id_status')
        ->leftjoin('matpels','matpels.id', '=' ,'biodata_guru_pesantrens.id_matapelajaran')
        ->orderBy('biodata_guru_pesantrens.created_at', 'desc')
        ->select(
            'biodata_guru_pesantrens.id',
            'biodata_guru_pesantrens.nama',
            'biodata_guru_pesantrens.nip',
            'biodata_guru_pesantrens.tempat_lahir',
            'biodata_guru_pesantrens.tanggal_lahir',
            'biodata_guru_pesantrens.jk',
            'biodata_guru_pesantrens.id_status',
            'biodata_guru_pesantrens.alamat',
            'biodata_guru_pesantrens.id_matapelajaran',
            'biodata_guru_pesantrens.id_kategori',
            'biodata_guru_pesantrens.awal_masuk',
            'biodata_guru_pesantrens.img',
            'kategori_gurus.kategori_guru',
            'status_gurus.status_guru',
            'matpels.matpel')
        ->paginate(25);
        return view('admin.biodata_guru_pesantren.list',array('biodata_guru_pesantren'=>$biodata_guru_pesantren, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $status_guru=StatusGuru::pluck('status_guru', 'id');
        $kategori_guru=KategoriGuru::pluck('kategori_guru', 'id');
        $matpel=Matpel::pluck('matpel', 'id');
        return View::make('admin.biodata_guru_pesantren.create', compact('status_guru', 'kategori_guru', 'matpel') ,array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $biodata_guru_pesantren = new BiodataGuruPesantren;
        $biodata_guru_pesantren ->nama              = Input::get('nama');
        $biodata_guru_pesantren ->nip               = Input::get('nip');
        $biodata_guru_pesantren ->tempat_lahir      = Input::get('tempat_lahir');
        $biodata_guru_pesantren ->tanggal_lahir     = Input::get('tanggal_lahir');
        $biodata_guru_pesantren ->jk                = Input::get('jk');
        $biodata_guru_pesantren ->id_status         = Input::get('id_status');
        $biodata_guru_pesantren ->alamat            = Input::get('alamat');
        $biodata_guru_pesantren ->id_matapelajaran  = Input::get('id_matapelajaran');
        $biodata_guru_pesantren ->id_kategori       = Input::get('id_kategori');
        $biodata_guru_pesantren ->awal_masuk        = Input::get('awal_masuk');
        // add image
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/biodataguru/pesantren/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/biodataguru/pesantren');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $biodata_guru_pesantren->img = $imageName;
        }

        $biodata_guru_pesantren->save();
        // redirect
        return Redirect::action('admin\BiodataGuruPesantrenController@index')->with('flash-success','The user has been added.');
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
        $biodata_guru_pesantren = BiodataGuruPesantren::leftjoin('kategori_gurus', 'kategori_gurus.id', '=', 'biodata_guru_pesantrens.id_kategori')
        ->leftjoin('status_gurus','status_gurus.id', '=' ,'biodata_guru_pesantrens.id_status')
        ->leftjoin('matpels','matpels.id', '=' ,'biodata_guru_pesantrens.id_matapelajaran')
        ->orderBy('biodata_guru_pesantrens.created_at', 'desc')
        ->select(
            'biodata_guru_pesantrens.id',
            'biodata_guru_pesantrens.nama',
            'biodata_guru_pesantrens.nip',
            'biodata_guru_pesantrens.tempat_lahir',
            'biodata_guru_pesantrens.tanggal_lahir',
            'biodata_guru_pesantrens.jk',
            'biodata_guru_pesantrens.id_status',
            'biodata_guru_pesantrens.alamat',
            'biodata_guru_pesantrens.id_matapelajaran',
            'biodata_guru_pesantrens.id_kategori',
            'biodata_guru_pesantrens.awal_masuk',
            'biodata_guru_pesantrens.img',
            'kategori_gurus.kategori_guru',
            'status_gurus.status_guru',
            'matpels.matpel')
        ->where('biodata_guru_pesantrens.id', $id)
        ->firstOrFail();   
        return view('admin.biodata_guru_pesantren.show', compact('biodata_guru_pesantren'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show_biodata_guru_pesantren()
    {
        $biodata_guru_pesantren = BiodataGuruPesantren::orderBy('created_at', 'desc')->get();
        return view('biodata_guru_pesantren', array('biodata_guru_pesantren'=>$biodata_guru_pesantren));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $status_guru=StatusGuru::pluck('status_guru', 'id');
        $kategori_guru=KategoriGuru::pluck('kategori_guru', 'id');
        $matpel=Matpel::pluck('matpel', 'id');
        $biodata_guru_pesantren = BiodataGuruPesantren::where('id', $id)->firstOrFail();   
        return view('admin.biodata_guru_pesantren.edit', compact('biodata_guru_pesantren', 'status_guru', 'kategori_guru', 'matpel'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $biodata_guru_pesantren = BiodataGuruPesantren::findOrFail($id); 
        $biodata_guru_pesantren ->nama              = Input::get('nama');
        $biodata_guru_pesantren ->nip               = Input::get('nip');
        $biodata_guru_pesantren ->tempat_lahir      = Input::get('tempat_lahir');
        $biodata_guru_pesantren ->tanggal_lahir     = Input::get('tanggal_lahir');
        $biodata_guru_pesantren ->jk                = Input::get('jk');
        $biodata_guru_pesantren ->id_status         = Input::get('id_status');
        $biodata_guru_pesantren ->alamat            = Input::get('alamat');
        $biodata_guru_pesantren ->id_matapelajaran  = Input::get('id_matapelajaran');
        $biodata_guru_pesantren ->id_kategori       = Input::get('id_kategori');
        $biodata_guru_pesantren ->awal_masuk        = Input::get('awal_masuk');
        
        //add foto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/biodataguru/pesantren/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/biodataguru/pesantren');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $biodata_guru_pesantren->img = $imageName;
        }
        
        $biodata_guru_pesantren->save();
        return Redirect::action('admin\BiodataGuruPesantrenController@index', compact('biodata_guru_pesantren'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $biodata_guru_pesantren = BiodataGuruPesantren::where('id', $id)->firstOrFail();
        $biodata_guru_pesantren->delete();
        return Redirect::action('admin\BiodataGuruPesantrenController@index');
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
        $biodata_guru_pesantren = BiodataGuruPesantren::where('nama','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.biodata_guru_pesantren.list', compact('biodata_guru_pesantren'),array('user' => $user));
    }
}