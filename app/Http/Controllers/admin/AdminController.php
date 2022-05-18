<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\FlowRegister;
use App\Log;
use App\PendaftaranTsanawiyah;
use Image;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user_sirmis = User::orderBy('created_at', 'desc')->first();
        if(Auth::user()->groups()->where("name", "=", "Admin")->first()){
            $logs = Log::orderBy('logs.created_at', 'desc')
                ->select(
                    'logs.created_at',
                    'logs.aktifitas',
                    'users.name'
                    )
                ->leftjoin('users', 'users.id', '=', 'logs.user_id')
                ->limit('10')
                ->get();
            return view('admin.admin',compact('user_sirmis', 'logs'), array('user'=>$user));
        }else{
            return Redirect::back();
        }
    }

    public function dashboard($id)
    {
        $user = Auth::user();
        $user_sirmis = User::where('id', $id)->first();
        if ($user->id == $user_sirmis->id) {
            $logs = Log::orderBy('logs.created_at', 'desc')
                ->select(
                    'logs.created_at',
                    'logs.aktifitas',
                    'users.name'
                    )
                ->leftjoin('users', 'users.id', '=', 'logs.user_id')
                ->where('user_id', $user->id)
                ->limit('6')
                ->get();
      
            $pendaftar = PendaftaranTsanawiyah::where('user_id', $user->id)->first();
            $act = 400;
            if($pendaftar){
                if ($pendaftar->nm_lengkap && $pendaftar->nama_ibu && $pendaftar->nama_ayah) {
                    $act = 0;
                } elseif( ($pendaftar->nm_lengkap && $pendaftar->nama_ibu) || ($pendaftar->nm_lengkap && $pendaftar->nama_ayah) ) {
                    $act = 70;
                }elseif ($pendaftar->nm_lengkap) {
                    $act = 200;
                }else{
                    $act = 300;
                }   
            }
            $flows = FlowRegister::orderBy('created_at', 'desc')->limit(1)->get();
            return view('admin.santri',compact('user_sirmis', 'logs', 'pendaftar', 'act', 'flows'), array('user'=>$user));
        } elseif($user->id != $user_sirmis->id) {
            return Redirect::back();
        }
    }

    public function dataSantri($id)
    {
        $user = Auth::user();
        $user_sirmis = User::where('id', $id)->first();
        if ($user->id == $user_sirmis->id) {
            $pendaftar = PendaftaranTsanawiyah::where('user_id', $user->id)->first();
            return view('admin.profil',compact('user_sirmis', 'pendaftar'), array('user'=>$user));
        } elseif($user->id != $user_sirmis->id) {
            return Redirect::back();
        }
    }

    public function cart($id)
    {
        $user = Auth::user();
        $user_sirmis = User::where('id', $id)->first();
        if ($user->id == $user_sirmis->id) {
            $pendaftar = PendaftaranTsanawiyah::where('user_id', $user->id)->first();
            return view('admin.kartu',compact('user_sirmis', 'pendaftar'), array('user'=>$user));
        } elseif($user->id != $user_sirmis->id) {
            return Redirect::back();
        }
    }
}
