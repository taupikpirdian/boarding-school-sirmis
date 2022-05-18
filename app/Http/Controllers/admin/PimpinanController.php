<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Pimpinan;
use App\KategoriPimpinan;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class PimpinanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pimpinan_lembaga = Pimpinan::leftjoin('kategori_pimpinans', 'kategori_pimpinans.id', '=', 'pimpinans.id_kategori')
        ->orderBy('pimpinans.created_at', 'desc')
        ->select(
            'pimpinans.id',
            'pimpinans.name',
            'pimpinans.jabatan',
            'pimpinans.img',
            'pimpinans.id_kategori',
            'kategori_pimpinans.kategori_pimpinan')
        ->paginate(10);
        return view('admin.pimpinan_lembaga.list',array('pimpinan_lembaga'=>$pimpinan_lembaga, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $kategori_pimpinan=KategoriPimpinan::pluck('kategori_pimpinan', 'id');
        return View::make('admin.pimpinan_lembaga.create', compact('kategori_pimpinan'), array('user' => $user));
    }

    public function store(Request $request)
    {
        
        // store
        $pimpinan_lembaga = new Pimpinan;
        $pimpinan_lembaga ->name              = Input::get('name');
        $pimpinan_lembaga ->jabatan           = Input::get('jabatan');
        $pimpinan_lembaga ->id_kategori       = Input::get('id_kategori');
        //add
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/pimpinan/thumbs');
              $image = Image::make($img->getRealPath());
              $image->fit(400, 400);
              $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/pimpinan');
            $img = Image::make($img)->encode('jpg', 100);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $pimpinan_lembaga->img = $imageName;
        }

        $pimpinan_lembaga->save();
        // redirect
        return Redirect::action('admin\PimpinanController@index')->with('flash-success','The user has been added.');
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
        $pimpinan_lembaga = Pimpinan::leftjoin('kategori_pimpinans', 'kategori_pimpinans.id', '=', 'pimpinans.id_kategori')
        ->orderBy('pimpinans.created_at', 'desc')
        ->select(
            'pimpinans.id',
            'pimpinans.name',
            'pimpinans.jabatan',
            'pimpinans.img',
            'pimpinans.id_kategori',
            'kategori_pimpinans.kategori_pimpinan')
        ->where('pimpinans.id', $id)
        ->firstOrFail();   
        return view('admin.pimpinan_lembaga.show', compact('pimpinan_lembaga'),array('user' => $user));
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
        $pimpinan_lembaga = Pimpinan::where('id', $id)->firstOrFail();
        $kategori_pimpinan=KategoriPimpinan::pluck('kategori_pimpinan', 'id');   
        return view('admin.pimpinan_lembaga.edit', compact('pimpinan_lembaga', 'kategori_pimpinan'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $pimpinan_lembaga = Pimpinan::findOrFail($id); 
        $pimpinan_lembaga ->name              = Input::get('name');
        $pimpinan_lembaga ->jabatan           = Input::get('jabatan');
        $pimpinan_lembaga ->id_kategori       = Input::get('id_kategori');
        //add
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/pimpinan/thumbs');
              $image = Image::make($img->getRealPath());
              $image->fit(400, 400);
              $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/pimpinan');
            $img = Image::make($img)->encode('jpg', 100);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $pimpinan_lembaga->img = $imageName;
        }

        $pimpinan_lembaga->save();
        return Redirect::action('admin\PimpinanController@index', compact('pimpinan_lembaga'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $pimpinan_lembaga = Pimpinan::where('id', $id)->firstOrFail();
        $pimpinan_lembaga->delete();
        return Redirect::action('admin\PimpinanController@index');
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
        $pimpinan_lembaga = Pimpinan::where('name','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.pimpinan_lembaga.list', compact('pimpinan_lembaga'),array('user' => $user));
    }
}