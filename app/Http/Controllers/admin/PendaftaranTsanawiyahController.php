<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\PendaftaranTsanawiyah;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use File;

class PendaftaranTsanawiyahController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pendaftaran_tsanawiyah = PendaftaranTsanawiyah::orderBy('created_at', 'desc')
        ->where('jenjang', "MTS")
        ->paginate(50);
        return view('admin.pendaftaran_tsanawiyah.list',array('pendaftaran_tsanawiyah'=>$pendaftaran_tsanawiyah, 'user' => $user));
    } 

    public function statistik_mts()
    {
        $user = Auth::user();
        $pendaftaran_tsanawiyah = PendaftaranTsanawiyah::orderBy('created_at', 'desc')->get();
        return view('admin.Statistik.mts',array('pendaftaran_tsanawiyah'=>$pendaftaran_tsanawiyah, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.pendaftaran_tsanawiyah.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $pendaftaran_tsanawiyah = new PendaftaranTsanawiyah;
        $pendaftaran_tsanawiyah ->nm_lengkap       = Input::get('nm_lengkap');
        $pendaftaran_tsanawiyah ->tempat_lahir     = Input::get('tempat_lahir');
        $pendaftaran_tsanawiyah ->tanggal_lahir    = Input::get('tanggal_lahir');
        $pendaftaran_tsanawiyah ->alamat_siswa     = Input::get('alamat_siswa');
        $pendaftaran_tsanawiyah ->jk               = Input::get('jk');
        $pendaftaran_tsanawiyah ->no_tlp           = Input::get('no_tlp');
        $pendaftaran_tsanawiyah ->ukuran_seragam   = Input::get('ukuran_seragam');
        $pendaftaran_tsanawiyah ->pesantren        = Input::get('pesantren');

        // addfoto
        $photo = $request->file('photo');
        if($photo){
            $imageName = time().'.'.$photo->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/pendaftaran/tsanawiyah/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($photo->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/pendaftaran/tsanawiyah/');
            $photo = Image::make($photo)->encode('jpg', 50);
            $photo->resize(400, 400);
            $photo->save($destinationPath.'/'.$imageName);
            //save data image to db
            $pendaftaran_tsanawiyah->photo = $imageName;
        }

        $pendaftaran_tsanawiyah ->nama_ibu         = Input::get('nama_ibu');
        $pendaftaran_tsanawiyah ->tmpt_lahir_ibu   = Input::get('tmpt_lahir_ibu');
        $pendaftaran_tsanawiyah ->alamat_ibu       = Input::get('alamat_ibu');
        $pendaftaran_tsanawiyah ->pekerjaan_ibu    = Input::get('pekerjaan_ibu');
        $pendaftaran_tsanawiyah ->penghasilan_ibu  = Input::get('penghasilan_ibu');
        $pendaftaran_tsanawiyah ->pendidikan_ibu   = Input::get('pendidikan_ibu');
        $pendaftaran_tsanawiyah ->no_tlp_ibu       = Input::get('no_tlp_ibu');

        $pendaftaran_tsanawiyah ->nama_ayah        = Input::get('nama_ayah');
        $pendaftaran_tsanawiyah ->tmpt_lahir_ayah  = Input::get('tmpt_lahir_ayah');
        $pendaftaran_tsanawiyah ->alamat_ayah      = Input::get('alamat_ayah');
        $pendaftaran_tsanawiyah ->pekerjaan_ayah   = Input::get('pekerjaan_ayah');
        $pendaftaran_tsanawiyah ->penghasilan_ayah = Input::get('penghasilan_ayah');
        $pendaftaran_tsanawiyah ->pendidikan_ayah  = Input::get('pendidikan_ayah');
        $pendaftaran_tsanawiyah ->no_tlp_ayah      = Input::get('no_tlp_ayah');
        $pendaftaran_tsanawiyah ->save();
        // redirect
        return Redirect::action('admin\PendaftaranTsanawiyahController@index')->with('flash-success','The user has been added.');
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
        $pendaftaran_tsanawiyah = PendaftaranTsanawiyah::where('id', $id)->firstOrFail();   
        return view('admin.pendaftaran_tsanawiyah.show', compact('pendaftaran_tsanawiyah'),array('user' => $user));
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
        $pendaftaran_tsanawiyah = PendaftaranTsanawiyah::where('id', $id)->firstOrFail();   
        return view('admin.pendaftaran_tsanawiyah.edit', compact('pendaftaran_tsanawiyah'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $pendaftaran_tsanawiyah = PendaftaranTsanawiyah::findOrFail($id); 
        $pendaftaran_tsanawiyah ->nm_lengkap       = Input::get('nm_lengkap');
        $pendaftaran_tsanawiyah ->tempat_lahir     = Input::get('tempat_lahir');
        $pendaftaran_tsanawiyah ->tanggal_lahir    = Input::get('tanggal_lahir');
        $pendaftaran_tsanawiyah ->alamat_siswa     = Input::get('alamat_siswa');
        $pendaftaran_tsanawiyah ->jk               = Input::get('jk');
        $pendaftaran_tsanawiyah ->no_tlp           = Input::get('no_tlp');
        $pendaftaran_tsanawiyah ->ukuran_seragam   = Input::get('ukuran_seragam');
        $pendaftaran_tsanawiyah ->pesantren        = Input::get('pesantren');

        // addfoto
        $photo = $request->file('photo');
        if($photo){
            $imageName = time().'.'.$photo->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/pendaftaran/tsanawiyah/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($photo->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/pendaftaran/tsanawiyah/');
            $photo = Image::make($photo)->encode('jpg', 50);
            $photo->resize(400, 400);
            $photo->save($destinationPath.'/'.$imageName);
            //save data image to db
            $pendaftaran_tsanawiyah->photo = $imageName;
        }

        $pendaftaran_tsanawiyah ->nama_ibu         = Input::get('nama_ibu');
        $pendaftaran_tsanawiyah ->tmpt_lahir_ibu   = Input::get('tmpt_lahir_ibu');
        $pendaftaran_tsanawiyah ->alamat_ibu       = Input::get('alamat_ibu');
        $pendaftaran_tsanawiyah ->pekerjaan_ibu    = Input::get('pekerjaan_ibu');
        $pendaftaran_tsanawiyah ->penghasilan_ibu  = Input::get('penghasilan_ibu');
        $pendaftaran_tsanawiyah ->pendidikan_ibu   = Input::get('pendidikan_ibu');
        $pendaftaran_tsanawiyah ->no_tlp_ibu       = Input::get('no_tlp_ibu');

        $pendaftaran_tsanawiyah ->nama_ayah        = Input::get('nama_ayah');
        $pendaftaran_tsanawiyah ->tmpt_lahir_ayah  = Input::get('tmpt_lahir_ayah');
        $pendaftaran_tsanawiyah ->alamat_ayah      = Input::get('alamat_ayah');
        $pendaftaran_tsanawiyah ->pekerjaan_ayah   = Input::get('pekerjaan_ayah');
        $pendaftaran_tsanawiyah ->penghasilan_ayah = Input::get('penghasilan_ayah');
        $pendaftaran_tsanawiyah ->pendidikan_ayah  = Input::get('pendidikan_ayah');
        $pendaftaran_tsanawiyah ->no_tlp_ayah      = Input::get('no_tlp_ayah');
        $pendaftaran_tsanawiyah ->save();

        return Redirect::action('admin\PendaftaranTsanawiyahController@index', compact('pendaftaran_tsanawiyah'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function aliyah(Request $request)
    {
        $pendaftaran_tsanawiyah = new PendaftaranTsanawiyah;
        $pendaftaran_tsanawiyah ->nm_lengkap       = Input::get('nm_lengkap');
        $pendaftaran_tsanawiyah ->tempat_lahir     = Input::get('tempat_lahir');
        $pendaftaran_tsanawiyah ->tanggal_lahir    = Input::get('tanggal_lahir');
        $pendaftaran_tsanawiyah ->alamat_siswa     = Input::get('alamat_siswa');
        $pendaftaran_tsanawiyah ->jk               = Input::get('jk');
        $pendaftaran_tsanawiyah ->no_tlp           = Input::get('no_tlp');
        $pendaftaran_tsanawiyah ->ukuran_seragam   = Input::get('ukuran_seragam');
        $pendaftaran_tsanawiyah ->pesantren        = Input::get('pesantren');

        // addfoto
        $photo = $request->file('photo');
        if($photo){
            $imageName = time().'.'.$photo->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/register/ma/thumbs');
              $image = Image::make($photo->getRealPath());
              $image->fit(200, 200);
              $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/register/ma');
            $photo = Image::make($photo)->encode('jpg', 50);
            $photo->save($destinationPath.'/'.$imageName);
            //save data image to db
            $pendaftaran_tsanawiyah->photo = $imageName;
        }

        $pendaftaran_tsanawiyah ->nama_ibu         = Input::get('nama_ibu');
        $pendaftaran_tsanawiyah ->tmpt_lahir_ibu   = Input::get('tmpt_lahir_ibu');
        $pendaftaran_tsanawiyah ->alamat_ibu       = Input::get('alamat_ibu');
        $pendaftaran_tsanawiyah ->pekerjaan_ibu    = Input::get('pekerjaan_ibu');
        $pendaftaran_tsanawiyah ->penghasilan_ibu  = Input::get('penghasilan_ibu');
        $pendaftaran_tsanawiyah ->pendidikan_ibu   = Input::get('pendidikan_ibu');
        $pendaftaran_tsanawiyah ->no_tlp_ibu       = Input::get('no_tlp_ibu');

        $pendaftaran_tsanawiyah ->nama_ayah        = Input::get('nama_ayah');
        $pendaftaran_tsanawiyah ->tmpt_lahir_ayah  = Input::get('tmpt_lahir_ayah');
        $pendaftaran_tsanawiyah ->alamat_ayah      = Input::get('alamat_ayah');
        $pendaftaran_tsanawiyah ->pekerjaan_ayah   = Input::get('pekerjaan_ayah');
        $pendaftaran_tsanawiyah ->penghasilan_ayah = Input::get('penghasilan_ayah');
        $pendaftaran_tsanawiyah ->pendidikan_ayah  = Input::get('pendidikan_ayah');
        $pendaftaran_tsanawiyah ->no_tlp_ayah      = Input::get('no_tlp_ayah');
        $pendaftaran_tsanawiyah ->save();
        // redirect
        return Redirect::action('KonfirmasiController@show')->with('flash-success','The user has been added.');
    }

    public function destroy($id)
    {
        $pendaftaran_tsanawiyah = PendaftaranTsanawiyah::where('id', $id)->firstOrFail();
        $pendaftaran_tsanawiyah->delete();
        return Redirect::action('admin\PendaftaranTsanawiyahController@index');
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
        $pendaftaran_tsanawiyah = PendaftaranTsanawiyah::where('nm_lengkap','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.pendaftaran_tsanawiyah.list', compact('pendaftaran_tsanawiyah'),array('user' => $user));
    }

    public function exportFile($type){
        $pendaftaran_tsanawiyah = PendaftaranTsanawiyah::get()
        ->where('jenjang', "SMP")
        ->toArray();
        return \Excel::create('Pendaftaran Tsanawiyah', function($excel) use ($pendaftaran_tsanawiyah) {
            $excel->sheet('pendaftaran tsanawiyah', function($sheet) use ($pendaftaran_tsanawiyah)
            {
                $sheet->fromArray($pendaftaran_tsanawiyah);
            });
        })->download($type);
    }
}