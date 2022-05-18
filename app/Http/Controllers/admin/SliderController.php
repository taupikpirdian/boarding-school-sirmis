<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Slide;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use File;

class SliderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $slider_sirmis = Slide::orderBy('created_at', 'desc')->paginate(25);
        return view('admin.slider_sirmis.list',array('slider_sirmis'=>$slider_sirmis, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.slider_sirmis.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $slider_sirmis = new Slide;
        $slider_sirmis->title     = Input::get('title');
        $slider_sirmis->desc      = Input::get('desc');
        // add image
        $img = $request->file('img');
        $imageName = time().'.'.$img->getClientOriginalExtension();
        //thumbs
        $destinationPath = public_path('images/slide/thumbs');
        if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
        }
        $img = Image::make($img->getRealPath());
        $img->resize(1920, 766);
        $img->save($destinationPath.'/'.$imageName);
        //original
        $destinationPath = public_path('images/slide');
        $img = Image::make($img)->encode('jpg', 50);
        $img->save($destinationPath.'/'.$imageName);
        //save data image to db
        $slider_sirmis->img = $imageName;

        $slider_sirmis->save();
        // redirect
        return Redirect::action('admin\SliderController@index')->with('flash-success','The user has been added.');
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
        $slider_sirmis = Slide::where('id', $id)->firstOrFail();   
        return view('admin.slider_sirmis.show', compact('slider_sirmis'),array('user' => $user));
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
        $slider_sirmis = Slide::where('id', $id)->firstOrFail();   
        return view('admin.slider_sirmis.edit', compact('slider_sirmis'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $slider_sirmis = Slide::findOrFail($id);
        $slider_sirmis->title     = Input::get('title');
        $slider_sirmis->desc      = Input::get('desc');
        // addfoto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/slide/thumbs/');
              $image = Image::make($img->getRealPath());
              $image->resize(1920, 766);
              $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/slide/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $slider_sirmis->img = $imageName;
        }
        
        $slider_sirmis->save();
        return Redirect::action('admin\SliderController@index', compact('slider_sirmis'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $slider_sirmis = Slide::where('id', $id)->firstOrFail();
        $slider_sirmis->delete();
        return Redirect::action('admin\SliderController@index');
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
        $slider_sirmis = Slide::where('title','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.slider_sirmis.list', compact('slider_sirmis'),array('user' => $user));
    }
}