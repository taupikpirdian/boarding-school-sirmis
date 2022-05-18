<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Artikel;
use App\KategoriArtikel;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use File;

class ArtikelController extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $artikel = Artikel::leftjoin('kategori_artikels', 'kategori_artikels.id', '=', 'artikels.id_kategori')
    ->orderBy('artikels.created_at', 'desc')
    ->select(
      'artikels.id',
      'artikels.judul',
      'artikels.id_kategori',
      'artikels.isi',
      'artikels.img',
      'artikels.file',
      'kategori_artikels.kategori_artikel')
    ->paginate(25);
    return view('admin.artikel.list', compact('kategori_artikel', 'artikel','user'));
  }     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = Auth::user();
      $kategori_artikel=KategoriArtikel::pluck('kategori_artikel', 'id');
      return View::make('admin.artikel.create', compact('kategori_artikel'),array('user' => $user));
    }

    public function store(Request $request)
    {
      // store
      $artikel = new Artikel;
      $artikel->judul         = Input::get('judul');
      $artikel->isi           = Input::get('isi');
      $artikel->id_kategori   = Input::get('id_kategori');

      $img = $request->file('img');
      if($img){
         $imageName = time().'.'.$img->getClientOriginalExtension();
          //thumbs
          $destinationPath = public_path('images/artikel/thumbs/');
          if(!File::exists($destinationPath)){
              if(File::makeDirectory($destinationPath,0777,true)){
                  throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
              }
          }
          $image = Image::make($img->getRealPath());
          $image->fit(400, 400);
          $image->save($destinationPath.'/'.$imageName);
          //original
          $destinationPath = public_path('images/artikel/');
          $img = Image::make($img)->encode('jpg', 50);
          $img->save($destinationPath.'/'.$imageName);
          //save data image to db
          $artikel->img = $imageName;
      }

      // Upload File
      $files = Input::file('file');
      if(isset($files)){
        $fileName = str_random(10).'.'.$files->getClientOriginalExtension();
        $destinationPath = public_path('/assets/file/artikel');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
            throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $files->move($destinationPath,$fileName);
        $artikel->file   = $fileName;
      }

      $artikel->save();

        // redirect
      return Redirect::action('admin\ArtikelController@index')->with('flash-success','The user has been added.');
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
      $artikel = Artikel::where('id', $id)->firstOrFail();   
      return view('admin.artikel.show', compact('artikel', 'kategori_artikel'),array('user' => $user));
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
      $artikel = Artikel::where('id', $id)->firstOrFail();   
      $kategori_artikel=KategoriArtikel::pluck('kategori_artikel', 'id');   
      return view('admin.artikel.edit', compact('artikel', 'kategori_artikel'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
      $artikel = Artikel::findOrFail($id); 
      $artikel->judul         = Input::get('judul');
      $artikel->isi           = Input::get('isi');
      $artikel->id_kategori   = Input::get('id_kategori');

      $img = $request->file('img');
      if($img){
         $imageName = time().'.'.$img->getClientOriginalExtension();
          //thumbs
          $destinationPath = public_path('images/artikel/thumbs/');
          if(!File::exists($destinationPath)){
              if(File::makeDirectory($destinationPath,0777,true)){
                  throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
              }
          }
          $image = Image::make($img->getRealPath());
          $image->fit(400, 400);
          $image->save($destinationPath.'/'.$imageName);
          //original
          $destinationPath = public_path('images/artikel/');
          $img = Image::make($img)->encode('jpg', 50);
          $img->save($destinationPath.'/'.$imageName);
          //save data image to db
          $artikel->img = $imageName;
      }

      // Upload File
      $files = Input::file('file');
      if(isset($files)){
        $fileName = str_random(10).'.'.$files->getClientOriginalExtension();
        $destinationPath = public_path('/assets/file/artikel');
        if(!File::exists($destinationPath)){
          if(File::makeDirectory($destinationPath,0777,true)){
            throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
          }
        }
        $files->move($destinationPath,$fileName);
        $artikel->file   = $fileName;
      }
      $artikel->save();
      return Redirect::action('admin\ArtikelController@index', compact('artikel'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
      $artikel = Artikel::where('id', $id)->firstOrFail();
      $artikel->delete();
      return Redirect::action('admin\ArtikelController@index');
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
      $artikel = Artikel::where('judul','LIKE','%'.$search.'%')->paginate(10);
      return view('admin.artikel.list', compact('artikel'),array('user' => $user));
    }

    public function index_artikel()
    {
      $artikel = Artikel::orderBy('created_at', 'desc')->get();
      return view('artikel',array('artikel'=>$artikel));
    }      
  }