<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Berita;
use App\KategoriBerita;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use File;

class BeritaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $berita = Berita::leftjoin('kategori_beritas', 'kategori_beritas.id', '=', 'beritas.id_kategori')
        ->orderBy('beritas.created_at', 'desc')
        ->select(
            'beritas.id',
            'beritas.judul',
            'beritas.id_kategori',
            'beritas.isi',
            'beritas.img',
            'kategori_beritas.kategori_berita')
        ->paginate(25);
        return view('admin.berita.list', compact('berita','user'));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function berita($id)
    {
        $beritas = Berita::leftjoin('kategori_beritas', 'kategori_beritas.id', '=', 'beritas.id_kategori')
        ->orderBy('beritas.created_at', 'desc')
        ->select(
            'beritas.id',
            'beritas.judul',
            'beritas.id_kategori',
            'beritas.isi',
            'beritas.img',
            'beritas.created_at',
            'kategori_beritas.kategori_berita')
        ->where('beritas.id', $id)
        ->firstOrFail();
        $berita = Berita::orderBy('created_at', 'desc')->get();
        return view('berita_detail',compact('beritas','berita'));
    }

    public function create()
    {
        $user = Auth::user();
        $kategori_berita = KategoriBerita::pluck('kategori_berita', 'id');
        return View::make('admin.berita.create',compact('kategori_berita'),array('user' => $user));
    }

    public function store(Request $request)
    {
        // get last id
        $berita_id = Berita::pluck('id')->last();
        // last id+1
        $last_id = $berita_id + 1;
        // store
        $berita = new Berita;
        $berita->judul        = Input::get('judul');
        $berita->isi          = Input::get('isi');
        $berita->id_kategori  = Input::get('id_kategori');
        $berita->slug         = str_slug($berita->judul).'-'.$last_id;
        $berita->meta_title   = Input::get('meta_title');
        $berita->meta_desc    = Input::get('meta_desc');
        // addfoto
        $img = $request->file('img');
        $imageName = time().'.'.$img->getClientOriginalExtension();
        //thumbs
        $destinationPath = public_path('images/berita/thumbs/');
        if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
        }
        $image = Image::make($img->getRealPath());
        // $image->fit(400, 400);
        $image->resize(500, 600);
        $image->save($destinationPath.'/'.$imageName);
        //original
        $destinationPath = public_path('images/berita/');
        $img = Image::make($img)->encode('jpg', 50);
        $img->save($destinationPath.'/'.$imageName);
        //save data image to db
        $berita->img = $imageName;
        $berita->save();

        // redirect
        return Redirect::action('admin\BeritaController@index')->with('flash-success','The user has been added.');
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
        $berita = Berita::where('id', $id)->firstOrFail();   
        return view('admin.berita.show', compact('berita'),array('user' => $user));
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
        $berita = Berita::where('id', $id)->firstOrFail();
        $kategori_berita = KategoriBerita::pluck('kategori_berita', 'id');
        return view('admin.berita.edit', compact('berita', 'kategori_berita'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id); 
        $berita->judul        = Input::get('judul');
        $berita->isi          = Input::get('isi');
        $berita->id_kategori  = Input::get('id_kategori');
        $berita->slug         = str_slug($berita->judul).'-'.$berita->id;
        $berita->meta_title   = Input::get('meta_title');
        $berita->meta_desc    = Input::get('meta_desc');

        $img = $request->file('img');
        if($img){
          $imageName = time().'.'.$img->getClientOriginalExtension();
          //thumbs
          $destinationPath = public_path('images/berita/thumbs/');
          if(!File::exists($destinationPath)){
              if(File::makeDirectory($destinationPath,0777,true)){
                  throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
              }
          }
          $image = Image::make($img->getRealPath());
        //   $image->fit(400, 400);
          $image->resize(500, 600);
          $image->save($destinationPath.'/'.$imageName);
          //original
          $destinationPath = public_path('images/berita/');
          $img = Image::make($img)->encode('jpg', 50);
          $img->save($destinationPath.'/'.$imageName);
          //save data image to db
          $berita->img = $imageName;
        }
        $berita->save();

        return Redirect::action('admin\BeritaController@index', compact('berita'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $berita = Berita::where('id', $id)->firstOrFail();
        $berita->delete();
        return Redirect::action('admin\BeritaController@index');
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
        $berita = Berita::where('judul','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.berita.list', compact('berita'),array('user' => $user));
    }

    public function berita_home()
    {
        $berita = Berita::orderBy('created_at', 'desc')->get();
        return view('BeritaHome',compact('berita'));
    } 
}
