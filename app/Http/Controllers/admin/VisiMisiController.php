<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\VisiMisi;
use App\KategoriVisiMisi;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class VisiMisiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $visi_misi = VisiMisi::leftjoin('kategori_visi_misis', 'kategori_visi_misis.id', '=', 'visi_misis.id_kategori')
        ->orderBy('visi_misis.created_at', 'desc')
        ->select(
            'visi_misis.id',
            'visi_misis.visi',
            'visi_misis.misi',
            'visi_misis.id_kategori',
            'kategori_visi_misis.kategori_visimisi')
        ->paginate(10);
        return view('admin.visi_misi.list',compact('visi_misi'), array('visi_misi'=>$visi_misi, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $kategori_visimisi=KategoriVisiMisi::pluck('kategori_visimisi', 'id');
        return View::make('admin.visi_misi.create',compact('kategori_visimisi'), array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $visi_misi = new VisiMisi;
        $visi_misi->visi                = Input::get('visi');
        $visi_misi->misi                = Input::get('misi');
        $visi_misi->id_kategori         = Input::get('id_kategori');
        $visi_misi->save();

        // redirect
        return Redirect::action('admin\VisiMisiController@index')->with('flash-success','The user has been added.');
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
        $visi_misi = VisiMisi::leftjoin('kategori_visi_misis', 'kategori_visi_misis.id', '=', 'visi_misis.id_kategori')
        ->where('visi_misis.id', $id)
        ->orderBy('visi_misis.created_at', 'desc')
        ->select(
            'visi_misis.id',
            'visi_misis.visi',
            'visi_misis.misi',
            'visi_misis.id_kategori',
            'kategori_visi_misis.kategori_visimisi')
        ->firstOrFail();
        $kategori_visimisi=KategoriVisiMisi::pluck('kategori_visimisi', 'id');   
        return view('admin.visi_misi.show', compact('visi_misi', 'kategori_visimisi'),array('user' => $user));
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
        $visi_misi = VisiMisi::where('id', $id)->firstOrFail();
        $kategori_visimisi=KategoriVisiMisi::pluck('kategori_visimisi', 'id');   
        return view('admin.visi_misi.edit', compact('visi_misi', 'kategori_visimisi'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $visi_misi = VisiMisi::findOrFail($id);
        $visi_misi->visi                = Input::get('visi');
        $visi_misi->misi                = Input::get('misi');
        $visi_misi->id_kategori         = Input::get('id_kategori');
        $visi_misi->save();

        return Redirect::action('admin\VisiMisiController@index', compact('visi_misi'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $visi_misi = VisiMisi::where('id', $id)->firstOrFail();
        $visi_misi->delete();
        return Redirect::action('admin\VisiMisiController@index');
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
        $visi_misi = VisiMisi::where('visi','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.visi_misi.list', compact('visi_misi'),array('user' => $user));
    }
}