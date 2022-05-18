<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\GaleriAliyah;
use App\KategoriGaleri;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;

class GaleriAliyahController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $galeri_aliyah = GaleriAliyah::orderBy('created_at', 'desc')->get();
        return view('admin.galerialiyah.list',array('galeri_aliyah'=>$galeri_aliyah, 'user' => $user));
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
        return View::make('admin.galerialiyah.create',compact('kategori_galeri'), array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $galeri_aliyah= new GaleriAliyah;
        $galeri_aliyah->title        = Input::get('title');
        $galeri_aliyah->id_kategori  = Input::get('id_kategori');

        //add foto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/galeri/aliyah/thumbs');
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/galeri/aliyah');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $galeri_aliyah->img = $imageName;
        }
        $galeri_aliyah->save();
        // redirect
        return Redirect::action('admin\GaleriAliyahController@index')->with('flash-success','The user has been added.');
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
        $galeri_aliyah = GaleriAliyah::where('id', $id)->firstOrFail();   
        return view('admin.galerialiyah.show', compact('galeri_aliyah'),array('user' => $user));
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
        $galeri_aliyah = GaleriAliyah::where('id', $id)->firstOrFail();   
        return view('admin.galerialiyah.edit', compact('galeri_aliyah'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $galeri_aliyah = GaleriAliyah::findOrFail($id); 
        $galeri_aliyah->title       = Input::get('title');
        $galeri_aliyah->id_kategori  = Input::get('id_kategori');
        
        //add foto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/galeri/aliyah/thumbs');
              $image = Image::make($img->getRealPath());
              $image->fit(400, 400);
              $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/galeri/aliyah');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $galeri_aliyah->img = $imageName;
        }

        $galeri_aliyah->save();
        return Redirect::action('admin\GaleriAliyahController@index', compact('galeri_aliyah'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $galeri_aliyah = GaleriAliyah::where('id', $id)->firstOrFail();
        $galeri_aliyah->delete();
        return Redirect::action('admin\GaleriAliyahController@index');
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
        $galeri_aliyah = GaleriAliyah::where('title','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.galerialiyah.list', compact('galeri_aliyah'),array('user' => $user));
    }

     public function GaleriAliyah()
    {
    
        $galeri_aliyah = GaleriAliyah::orderBy('created_at', 'desc')->paginate(12);
        return view('galerialiyah',compact('galeri_aliyah'));
    }  
}