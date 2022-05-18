<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Acara;
use App\KategoriAcara;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use File;

class AcaraController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $acara = Acara::orderBy('created_at', 'desc')->get();
        $acara = Acara::leftjoin('kategori_acaras', 'kategori_acaras.id', '=', 'acaras.id_kategori')
        ->orderBy('acaras.created_at', 'desc')
        ->select(
            'acaras.id',
            'acaras.judul',
            'acaras.id_kategori',
            'acaras.isi',
            'acaras.img',
            'acaras.tempat',
            'acaras.jam',
            'acaras.tanggal',
            'acaras.bulan',
            'acaras.tahun',
            'acaras.biaya',
            'kategori_acaras.kategori_acara')
        ->paginate(25);
        return view('admin.acara.list',array('acara'=>$acara, 'user' => $user));
    }   

    public function acara($id)
    {
        $acara = Acara::orderBy('created_at', 'desc')->get();
        $acaras = Acara::leftjoin('kategori_acaras', 'kategori_acaras.id', '=', 'acaras.id_kategori')
        ->orderBy('acaras.created_at', 'desc')
        ->select(
            'acaras.id',
            'acaras.judul',
            'acaras.id_kategori',
            'acaras.isi',
            'acaras.img',
            'acaras.tempat',
            'acaras.jam',
            'acaras.tanggal',
            'acaras.bulan',
            'acaras.tahun',
            'acaras.biaya',
            'acaras.created_at',
            'kategori_acaras.kategori_acara')
        ->where('acaras.id', $id)
        ->firstOrFail();
        return view('acara_detail',compact('acara', 'acaras'));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $kategori_acara=KategoriAcara::pluck('kategori_acara', 'id');
        return View::make('admin.acara.create', compact('kategori_acara'), array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $acara = new Acara;
        $acara->judul          = Input::get('judul');
        $acara->id_kategori    = Input::get('id_kategori');
        $acara->isi            = Input::get('isi');
        
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/acara/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/acara/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $acara->img = $imageName;
        }

        $acara->tempat     = Input::get('tempat');
        $acara->jam        = Input::get('jam');
        $acara->tanggal    = Input::get('tanggal');
        $acara->bulan      = Input::get('bulan');
        $acara->tahun      = Input::get('tahun');
        $acara->biaya      = Input::get('biaya');
        $acara->save();

        // redirect
        return Redirect::action('admin\AcaraController@index')->with('flash-success','The user has been added.');
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
        $acara = Acara::where('id', $id)->firstOrFail();   
        return view('admin.acara.show', compact('acara'),array('user' => $user));
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
        $acara = Acara::where('id', $id)->firstOrFail();   
        $kategori_acara=KategoriAcara::pluck('kategori_acara', 'id');
        return view('admin.acara.edit', compact('acara', 'kategori_acara'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $acara = Acara::findOrFail($id); 
        $acara->judul          = Input::get('judul');
        $acara->id_kategori    = Input::get('id_kategori');
        $acara->isi            = Input::get('isi');
        
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/acara/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/acara/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $acara->img = $imageName;
        }

        $acara->tempat     = Input::get('tempat');
        $acara->jam        = Input::get('jam');
        $acara->tanggal    = Input::get('tanggal');
        $acara->bulan      = Input::get('bulan');
        $acara->tahun      = Input::get('tahun');
        $acara->biaya      = Input::get('biaya');
        $acara->save();

        return Redirect::action('admin\AcaraController@index', compact('acara'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $acara = Acara::where('id', $id)->firstOrFail();
        $acara->delete();
        return Redirect::action('admin\AcaraController@index');
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
        $acara = Acara::where('judul','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.acara.list', compact('acara'),array('user' => $user));
    }

    public function index_acara()
    {
        $acara = Acara::orderBy('created_at', 'desc')->get();
        return view('acara',array('acara'=>$acara));
    }      
}