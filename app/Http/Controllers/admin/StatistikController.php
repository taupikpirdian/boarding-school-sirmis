<?php

namespace App\Http\Controllers\admin;
use App\PendaftaranTsanawiyah;
use App\Http\Controllers\Controller;

class StatistikController extends Controller
{
    public function tsanawiyah()
    {
      $countSmp = PendaftaranTsanawiyah::where('jenjang', "SMP")->count();
      $countSmpMondok = PendaftaranTsanawiyah::where('jenjang', "SMP")->where('pesantren', "Iya")->count();
      $countSmpTidakMondok = PendaftaranTsanawiyah::where('jenjang', "SMP")->where('pesantren', "Tidak")->count();
      return view('admin.statistik_tsanawiyah', compact('countSmp', 'countSmpMondok', 'countSmpTidakMondok'));
    }

    public function aliyah()
    {
      $countSma = PendaftaranTsanawiyah::where('jenjang', "SMA")->count();
      $countSmaMondok = PendaftaranTsanawiyah::where('jenjang', "SMA")->where('pesantren', "Iya")->count();
      $countSmaTidakMondok = PendaftaranTsanawiyah::where('jenjang', "SMA")->where('pesantren', "Tidak")->count(); 
      return view('admin.statistik_aliyah', compact('countSma', 'countSmaMondok', 'countSmaTidakMondok'));
    }
}