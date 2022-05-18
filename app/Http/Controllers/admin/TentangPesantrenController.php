<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\TentangPesantren;
use View;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;

class TentangPesantrenController extends Controller
{
    public function index()
    {
        $abouts = TentangPesantren::get();
        return view('admin.tentang_pesantren.list', compact('abouts'));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return View::make('admin.tentang_pesantren.create');
    }

    public function store(Request $request)
    {
        // store
        $about = new TentangPesantren;
        $about->desc        = Input::get('desc');
        // addfoto
        $img = $request->file('img');
        $imageName = time().'.'.$img->getClientOriginalExtension();
        //thumbs
        $destinationPath = public_path('images/tentang_pesantren/thumbs/');
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
        $destinationPath = public_path('images/tentang_pesantren/');
        $img = Image::make($img)->encode('jpg', 50);
        $img->save($destinationPath.'/'.$imageName);
        //save data image to db
        $about->img = $imageName;
        $about->save();

        // redirect
        return Redirect::action('admin\TentangPesantrenController@index')->with('flash-success','The user has been added.');
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
        $about = TentangPesantren::where('id', $id)->firstOrFail();   
        return view('admin.tentang_pesantren.show', compact('about'),array('user' => $user));
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
        $about = TentangPesantren::where('id', $id)->firstOrFail();
        return view('admin.tentang_pesantren.edit', compact('about'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $about = TentangPesantren::findOrFail($id); 
        $about->desc        = Input::get('desc');
        // addfoto
        $img = $request->file('img');
        $imageName = time().'.'.$img->getClientOriginalExtension();
        //thumbs
        $destinationPath = public_path('images/tentang_pesantren/thumbs/');
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
        $destinationPath = public_path('images/tentang_pesantren/');
        $img = Image::make($img)->encode('jpg', 50);
        $img->save($destinationPath.'/'.$imageName);
        //save data image to db
        $about->img = $imageName;
        $about->save();

        return Redirect::action('admin\TentangPesantrenController@index', compact('about'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $about = TentangPesantren::where('id', $id)->firstOrFail();
        $about->delete();
        return Redirect::action('admin\TentangPesantrenController@index');
    }

}
