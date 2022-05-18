<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\PendaftaranAliyah;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use File;

class FrontPendaftaranAliyahController extends Controller
{
    public function index()
    {
        $pendaftaran_aliyah = PendaftaranAliyah::orderBy('created_at', 'desc')->get();
        return view('pendaftaran_aliyah',compact('pendaftaran_aliyah'));
    }

    public function create(Request $request)
    {
        $pendaftaran_aliyah = new PendaftaranAliyah;
        $pendaftaran_aliyah->nm_lengkap       = Input::get('nm_lengkap');
        $pendaftaran_aliyah->tempat_lahir     = Input::get('tempat_lahir');
        $pendaftaran_aliyah->tanggal_lahir    = Input::get('tanggal_lahir');
        $pendaftaran_aliyah->alamat_siswa     = Input::get('alamat_siswa');
        $pendaftaran_aliyah->jk               = Input::get('jk');
        $pendaftaran_aliyah->no_tlp           = Input::get('no_tlp');
        $pendaftaran_aliyah->ukuran_seragam   = Input::get('ukuran_seragam');
        $pendaftaran_aliyah->pesantren        = Input::get('pesantren');

        // addfoto
        $photo = $request->file('photo');
        if($photo){
            $imageName = time().'.'.$photo->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/pendaftaran/aliyah/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($photo->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/pendaftaran/aliyah/');
            $photo = Image::make($photo)->encode('jpg', 50);
            $photo->save($destinationPath.'/'.$imageName);
            //save data image to db
            $pendaftaran_aliyah->photo = $imageName;
        }

        $pendaftaran_aliyah->nama_ibu         = Input::get('nama_ibu');
        $pendaftaran_aliyah->tmpt_lahir_ibu   = Input::get('tmpt_lahir_ibu');
        $pendaftaran_aliyah->alamat_ibu       = Input::get('alamat_ibu');
        $pendaftaran_aliyah->pekerjaan_ibu    = Input::get('pekerjaan_ibu');
        $pendaftaran_aliyah->penghasilan_ibu  = Input::get('penghasilan_ibu');
        $pendaftaran_aliyah->pendidikan_ibu   = Input::get('pendidikan_ibu');
        $pendaftaran_aliyah->no_tlp_ibu       = Input::get('no_tlp_ibu');

        $pendaftaran_aliyah->nama_ayah        = Input::get('nama_ayah');
        $pendaftaran_aliyah->tmpt_lahir_ayah  = Input::get('tmpt_lahir_ayah');
        $pendaftaran_aliyah->alamat_ayah      = Input::get('alamat_ayah');
        $pendaftaran_aliyah->pekerjaan_ayah   = Input::get('pekerjaan_ayah');
        $pendaftaran_aliyah->penghasilan_ayah = Input::get('penghasilan_ayah');
        $pendaftaran_aliyah->pendidikan_ayah  = Input::get('pendidikan_ayah');
        $pendaftaran_aliyah->no_tlp_ayah      = Input::get('no_tlp_ayah');
        $pendaftaran_aliyah->save();
        // redirect
        return Redirect::action('KonfirmasiController@index')->with('flash-success','The user has been added.');
    }
}