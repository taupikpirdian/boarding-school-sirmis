<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class UsersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_sirmis = User::orderBy('created_at', 'desc')->get();
        return view('admin.user_sirmis.list',array('user_sirmis'=>$user_sirmis, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.user_sirmis.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        
        // store
        $user_sirmis = new User;
        $user_sirmis->name      = Input::get('name');
        $user_sirmis->email     = Input::get('email');
        $user_sirmis->password  = bcrypt(Input::get('password'));
        // addfoto
        $photo = $request->file('photo');
        $imageName = time().'.'.$photo->getClientOriginalExtension();

        //thumbs
        $destinationPath = public_path('images/user/thumbs');
          $image = Image::make($photo->getRealPath());
          $image->fit(200, 200);
          $image->save($destinationPath.'/'.$imageName);

        //original
        $destinationPath = public_path('images/user');
        $photo = Image::make($photo)->encode('jpg', 50);
        $photo->save($destinationPath.'/'.$imageName);
        //save data image to db
        $user_sirmis->photo = $imageName;
        $user_sirmis->save();

        // redirect
        return Redirect::action('admin\UsersController@index')->with('flash-success','The user has been added.');


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
        $user_sirmis = User::where('id', $id)->firstOrFail();   
        return view('admin.user_sirmis.show', compact('user_sirmis'),array('user' => $user));
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
        $user_sirmis = User::where('id', $id)->firstOrFail();   
        return view('admin.user_sirmis.edit', compact('user_sirmis'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $user_sirmis = User::findOrFail($id);
        $user_sirmis->name      = Input::get('name');
        $user_sirmis->email     = Input::get('email');
        $user_sirmis->password  = bcrypt(Input::get('password'));
        $photo = $request->file('photo');
        $imageName = time().'.'.$photo->getClientOriginalExtension();

        //thumbs
        $destinationPath = public_path('images/user/thumbs');
          $image = Image::make($photo->getRealPath());
          $image->fit(200, 200);
          $image->save($destinationPath.'/'.$imageName);

        //original
        $destinationPath = public_path('images/user');
        $photo = Image::make($photo)->encode('jpg', 50);
        $photo->save($destinationPath.'/'.$imageName);
        //save data image to db
        $user_sirmis->photo = $imageName;
        $user_sirmis->save();

        return Redirect::action('admin\UsersController@index', compact('user_sirmis'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $user_sirmis = User::where('id', $id)->firstOrFail();
        $user_sirmis->delete();
        return Redirect::action('admin\UsersController@index');
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
        $user_sirmis = User::where('name','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.user_sirmis.list', compact('user_sirmis'),array('user' => $user));
    }
}