<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\GaleriTsanawiyah;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;

class GaleriTsanawiyahController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $galeri_tsanawiyah = GaleriTsanawiyah::orderBy('created_at', 'desc')->get();
        return view('admin.galeritsanawiyah.list',array('galeri_tsanawiyah'=>$galeri_tsanawiyah, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.galeritsanawiyah.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        
        // store
        $galeri_tsanawiyah = new GaleriTsanawiyah;
        $galeri_tsanawiyah ->title  = Input::get('title');

        //add foto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/galeri/tsanawiyah/thumbs');
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/galeri/tsanawiyah');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $galeri_tsanawiyah->img = $imageName;
        }
        $galeri_tsanawiyah->save();
        // redirect
        return Redirect::action('admin\GaleriTsanawiyahController@index')->with('flash-success','The user has been added.');
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
        $galeri_tsanawiyah = GaleriTsanawiyah::where('id', $id)->firstOrFail();   
        return view('admin.galeritsanawiyah.show', compact('galeri_tsanawiyah'),array('user' => $user));
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
        $galeri_tsanawiyah = GaleriTsanawiyah::where('id', $id)->firstOrFail();   
        return view('admin.galeritsanawiyah.edit', compact('galeri_tsanawiyah'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $galeri_tsanawiyah = GaleriTsanawiyah::findOrFail($id); 
        $galeri_tsanawiyah ->title   = Input::get('title');
        
        //add foto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/galeri/tsanawiyah/thumbs');
              $image = Image::make($img->getRealPath());
              $image->fit(400, 400);
              $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/galeri/tsanawiyah');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $galeri_tsanawiyah->img = $imageName;
        }
        
        $galeri_tsanawiyah->save();
        return Redirect::action('admin\GaleriTsanawiyahController@index', compact('galeri_tsanawiyah'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $galeri_tsanawiyah = GaleriTsanawiyah::where('id', $id)->firstOrFail();
        $galeri_tsanawiyah->delete();
        return Redirect::action('admin\GaleriTsanawiyahController@index');
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
        $galeri_tsanawiyah = GaleriTsanawiyah::where('title','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.galeritsanawiyah.list', compact('galeri_tsanawiyah'),array('user' => $user));
    }

     public function GaleriTsanawiyah()
    {
    
        $galeri_tsanawiyah = GaleriTsanawiyah::orderBy('created_at', 'desc')->paginate(12);
        return view('galeritsanawiyah',compact('galeri_tsanawiyah'));
    }  
}