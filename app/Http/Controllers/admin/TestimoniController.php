<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Testimoni;
use App\KategoriTestimoni;
use View;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::leftjoin('kategori_testimonis', 'kategori_testimonis.id', '=', 'testimonis.status_id')
        ->orderBy('testimonis.created_at', 'desc')
        ->select(
            'testimonis.id',
            'testimonis.name',
            'testimonis.desc',
            'testimonis.img',
            'kategori_testimonis.name as kategori')
        ->paginate(25);
        return view('admin.testimoni.list', compact('testimonis'));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $user = Auth::user();
        $kategori_testimonis = KategoriTestimoni::pluck('name', 'id');
        return View::make('admin.testimoni.create',compact('kategori_testimonis'),array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $testimoni = new Testimoni;
        $testimoni->name        = Input::get('name');
        $testimoni->status_id   = Input::get('status_id');
        $testimoni->desc        = Input::get('desc');
        // addfoto
        $img = $request->file('img');
        $imageName = time().'.'.$img->getClientOriginalExtension();
        //thumbs
        $destinationPath = public_path('images/testimoni/thumbs/');
        if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
        }
        $image = Image::make($img->getRealPath());
        // $image->fit(400, 400);
        $image->resize(300, 400);
        $image->save($destinationPath.'/'.$imageName);
        //original
        $destinationPath = public_path('images/testimoni/');
        $img = Image::make($img)->encode('jpg', 50);
        $img->save($destinationPath.'/'.$imageName);
        //save data image to db
        $testimoni->img = $imageName;
        $testimoni->save();

        // redirect
        return Redirect::action('admin\TestimoniController@index')->with('flash-success','The user has been added.');
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
        $testimoni = Testimoni::leftjoin('kategori_testimonis', 'kategori_testimonis.id', '=', 'testimonis.status_id')
        ->where('testimonis.id', $id)
        ->select(
            'testimonis.id',
            'testimonis.name',
            'testimonis.desc',
            'testimonis.img',
            'kategori_testimonis.name as kategori')
        ->firstOrFail();   
        return view('admin.testimoni.show', compact('testimoni'),array('user' => $user));
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
        $testimoni = Testimoni::where('id', $id)->firstOrFail();
        $kategori_testimonis = KategoriTestimoni::pluck('name', 'id');
        return view('admin.testimoni.edit', compact('testimoni', 'kategori_testimonis'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findOrFail($id); 
        $testimoni->name        = Input::get('name');
        $testimoni->status_id   = Input::get('status_id');
        $testimoni->desc        = Input::get('desc');
        // addfoto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/testimoni/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            // $image->fit(400, 400);
            $image->resize(300, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/testimoni/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $Testimoni->img = $imageName;
        }
        $testimoni->save();

        return Redirect::action('admin\TestimoniController@index', compact('testimoni'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $testimoni = Testimoni::where('id', $id)->firstOrFail();
        $testimoni->delete();
        return Redirect::action('admin\TestimoniController@index');
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
        $testimoni = Testimoni::where('name','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.testimoni.list', compact('testimoni'),array('user' => $user));
    }
}
