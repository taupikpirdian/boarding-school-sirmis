<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\KategoriTestimoni;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class KategoriTestimoniController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kategori_testimoni=  KategoriTestimoni::orderBy('created_at', 'desc')->get();
        return view('admin.kategori_testimoni.list',array('kategori_testimoni'=>$kategori_testimoni, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.kategori_testimoni.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $kategori_testimoni = new  KategoriTestimoni;
        $kategori_testimoni->name   = Input::get('kategori_testimoni');
        $kategori_testimoni->save();

        // redirect
        return Redirect::action('admin\KategoriTestimoniController@index')->with('flash-success','The user has been added.');
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
        $kategori_testimoni =  KategoriTestimoni::where('id', $id)->firstOrFail();   
        return view('admin.kategori_testimoni.show', compact('kategori_testimoni'),array('user' => $user));
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
        $kategori_testimoni =  KategoriTestimoni::where('id', $id)->firstOrFail();   
        return view('admin.kategori_testimoni.edit', compact('kategori_testimoni'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $kategori_testimoni =  KategoriTestimoni::findOrFail($id);
        $kategori_testimoni->name      = Input::get('kategori_testimoni');
        $kategori_testimoni->save();

        return Redirect::action('admin\KategoriTestimoniController@index', compact('kategori_testimoni'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $kategori_testimoni =  KategoriTestimoni::where('id', $id)->firstOrFail();
        $kategori_testimoni->delete();
        return Redirect::action('admin\KategoriTestimoniController@index');
    }
}