<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\PendaftaranTsanawiyah;
use App\Log;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use File;

class FrontPendaftaranTsanawiyahController extends Controller
{
    public function index()
    {
        $pendaftaran_tsanawiyah = PendaftaranTsanawiyah::orderBy('created_at', 'desc')->get();
        return view('pendaftaran_tsanawiyah',compact('pendaftaran_tsanawiyah'));
    }

    public function create(Request $request)
    {
        $getSantri = Input::get('nm_lengkap');
        $getAyah   = Input::get('nama_ibu');
        $getIbu    = Input::get('nama_ayah');
        $user      = Auth::user()->id;

        if ($getSantri) {
            $pendaftaran_tsanawiyah = new PendaftaranTsanawiyah;
            $pendaftaran_tsanawiyah->user_id          = $user;
            $pendaftaran_tsanawiyah->nisn             = Input::get('nisn');
            $pendaftaran_tsanawiyah->nm_lengkap       = Input::get('nm_lengkap');
            $pendaftaran_tsanawiyah->tempat_lahir     = Input::get('tempat_lahir');
            $pendaftaran_tsanawiyah->tanggal_lahir    = Input::get('tanggal_lahir');
            $pendaftaran_tsanawiyah->alamat_siswa     = Input::get('alamat_siswa');
            $pendaftaran_tsanawiyah->jk               = Input::get('jk');
            $pendaftaran_tsanawiyah->no_tlp           = Input::get('no_tlp');
            $pendaftaran_tsanawiyah->jenjang          = Input::get('jenjang');
            $pendaftaran_tsanawiyah->ukuran_seragam   = Input::get('ukuran_seragam');
            $pendaftaran_tsanawiyah->pesantren        = Input::get('pesantren');
    
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
                $image->fit(300, 400);
                $image->save($destinationPath.'/'.$imageName);
                //original
                $destinationPath = public_path('images/pendaftaran/tsanawiyah/');
                $photo = Image::make($photo)->encode('jpg', 50);
                $photo->resize(300, 400);
                $photo->save($destinationPath.'/'.$imageName);
                //save data image to db
                $pendaftaran_tsanawiyah->photo = $imageName;
            }

            $pendaftaran_tsanawiyah->save();
            $log = new Log;
            $log->user_id        = $user;
            $log->aktifitas      = "Create data santri";
            $log->save();
        } elseif($getAyah) {
            $pendaftaran_tsanawiyah = PendaftaranTsanawiyah::where('user_id', $user)->firstOrFail();   
            $pendaftaran_tsanawiyah->nama_ibu         = Input::get('nama_ibu');
            $pendaftaran_tsanawiyah->tmpt_lahir_ibu   = Input::get('tmpt_lahir_ibu');
            $pendaftaran_tsanawiyah->alamat_ibu       = Input::get('alamat_ibu');
            $pendaftaran_tsanawiyah->pekerjaan_ibu    = Input::get('pekerjaan_ibu');
            $pendaftaran_tsanawiyah->penghasilan_ibu  = Input::get('penghasilan_ibu');
            $pendaftaran_tsanawiyah->pendidikan_ibu   = Input::get('pendidikan_ibu');
            $pendaftaran_tsanawiyah->no_tlp_ibu       = Input::get('no_tlp_ibu');
            $pendaftaran_tsanawiyah->save();

            $log = new Log;
            $log->user_id        = $user;
            $log->aktifitas      = "Create data ibu";
            $log->save();
        } elseif($getIbu){
            $pendaftaran_tsanawiyah = PendaftaranTsanawiyah::where('user_id', $user)->firstOrFail();   
            $pendaftaran_tsanawiyah->nama_ayah        = Input::get('nama_ayah');
            $pendaftaran_tsanawiyah->tmpt_lahir_ayah  = Input::get('tmpt_lahir_ayah');
            $pendaftaran_tsanawiyah->alamat_ayah      = Input::get('alamat_ayah');
            $pendaftaran_tsanawiyah->pekerjaan_ayah   = Input::get('pekerjaan_ayah');
            $pendaftaran_tsanawiyah->penghasilan_ayah = Input::get('penghasilan_ayah');
            $pendaftaran_tsanawiyah->pendidikan_ayah  = Input::get('pendidikan_ayah');
            $pendaftaran_tsanawiyah->no_tlp_ayah      = Input::get('no_tlp_ayah');
            $pendaftaran_tsanawiyah->save();

            $log = new Log;
            $log->user_id        = $user;
            $log->aktifitas      = "Create data ayah";
            $log->save();
        }
        // redirect
        return Redirect::back()->withErrors(['Data berhasil disimpan', 'The Message']);
    }

    public function update(Request $request, $id)
    {
        $getSantri = Input::get('nm_lengkap');
        $getAyah   = Input::get('nama_ibu');
        $getIbu    = Input::get('nama_ayah');
        $user      = Auth::user()->id;

        if ($getSantri) {
            $pendaftaran_tsanawiyah = PendaftaranTsanawiyah::where('id', $id)->firstOrFail();
            $pendaftaran_tsanawiyah->user_id          = $user;
            $pendaftaran_tsanawiyah->nisn             = Input::get('nisn');
            $pendaftaran_tsanawiyah->nm_lengkap       = Input::get('nm_lengkap');
            $pendaftaran_tsanawiyah->tempat_lahir     = Input::get('tempat_lahir');
            $pendaftaran_tsanawiyah->tanggal_lahir    = Input::get('tanggal_lahir');
            $pendaftaran_tsanawiyah->alamat_siswa     = Input::get('alamat_siswa');
            $pendaftaran_tsanawiyah->jk               = Input::get('jk');
            $pendaftaran_tsanawiyah->no_tlp           = Input::get('no_tlp');
            $pendaftaran_tsanawiyah->jenjang          = Input::get('jenjang');
            $pendaftaran_tsanawiyah->ukuran_seragam   = Input::get('ukuran_seragam');
            $pendaftaran_tsanawiyah->pesantren        = Input::get('pesantren');
    
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
                $image->fit(300, 400);
                $image->save($destinationPath.'/'.$imageName);
                //original
                $destinationPath = public_path('images/pendaftaran/tsanawiyah/');
                $photo = Image::make($photo)->encode('jpg', 50);
                $photo->resize(300, 400);
                $photo->save($destinationPath.'/'.$imageName);
                //save data image to db
                $pendaftaran_tsanawiyah->photo = $imageName;
            }

            $pendaftaran_tsanawiyah->save();
            $log = new Log;
            $log->user_id        = $user;
            $log->aktifitas      = "Update data santri";
            $log->save();
        } elseif($getAyah) {
            $pendaftaran_tsanawiyah = PendaftaranTsanawiyah::where('id', $id)->firstOrFail();  
            $pendaftaran_tsanawiyah->nama_ibu         = Input::get('nama_ibu');
            $pendaftaran_tsanawiyah->tmpt_lahir_ibu   = Input::get('tmpt_lahir_ibu');
            $pendaftaran_tsanawiyah->alamat_ibu       = Input::get('alamat_ibu');
            $pendaftaran_tsanawiyah->pekerjaan_ibu    = Input::get('pekerjaan_ibu');
            $pendaftaran_tsanawiyah->penghasilan_ibu  = Input::get('penghasilan_ibu');
            $pendaftaran_tsanawiyah->pendidikan_ibu   = Input::get('pendidikan_ibu');
            $pendaftaran_tsanawiyah->no_tlp_ibu       = Input::get('no_tlp_ibu');
            $pendaftaran_tsanawiyah->save();

            $log = new Log;
            $log->user_id        = $user;
            $log->aktifitas      = "Update data ibu";
            $log->save();
        } elseif($getIbu){
            $pendaftaran_tsanawiyah = PendaftaranTsanawiyah::where('id', $id)->firstOrFail();  
            $pendaftaran_tsanawiyah->nama_ayah        = Input::get('nama_ayah');
            $pendaftaran_tsanawiyah->tmpt_lahir_ayah  = Input::get('tmpt_lahir_ayah');
            $pendaftaran_tsanawiyah->alamat_ayah      = Input::get('alamat_ayah');
            $pendaftaran_tsanawiyah->pekerjaan_ayah   = Input::get('pekerjaan_ayah');
            $pendaftaran_tsanawiyah->penghasilan_ayah = Input::get('penghasilan_ayah');
            $pendaftaran_tsanawiyah->pendidikan_ayah  = Input::get('pendidikan_ayah');
            $pendaftaran_tsanawiyah->no_tlp_ayah      = Input::get('no_tlp_ayah');
            $pendaftaran_tsanawiyah->save();

            $log = new Log;
            $log->user_id        = $user;
            $log->aktifitas      = "Update data ayah";
            $log->save();
        }
        // redirect
        return Redirect::back()->withErrors(['Data berhasil diubah', 'The Message']);
    }
}