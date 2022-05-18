<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Berita;
use App\Acara;
use App\GaleriPesantren;
use App\Prestasi;
use App\VisiMisi;
use App\Tujuan;
use Illuminate\Support\Facades\Input;
use Redirect;
use Excel;
Use Alert;
use App\Testimoni;
use App\User;
use App\TentangPesantren;
use App\Pembiayaan;
use App\JadwalPendaftaran;
use App\KategoriKegiatan;
use App\Kegiatan;
// use App\Providers\SweetAlertServiceProvider;

class HomeController extends Controller
{
    public function index()
    {
        $prestasi_sirmis = Prestasi::orderBy('created_at', 'desc')->limit(3)->get();
        $beritas = Berita::leftjoin('kategori_beritas', 'kategori_beritas.id', '=', 'beritas.id_kategori')
        ->orderBy('beritas.created_at', 'desc')
        ->select(
            'beritas.id',
            'beritas.judul',
            'beritas.id_kategori',
            'beritas.isi',
            'beritas.img',
            'beritas.slug',
            'beritas.created_at',
            'kategori_beritas.kategori_berita')
        ->limit(4)->get();
        $galeri_pesantren = GaleriPesantren::orderBy('created_at', 'desc')->limit(7)->get();
        $acara = Acara::orderBy('created_at', 'desc')->limit(3)->get();
        $slider_sirmis = Slide::orderBy('created_at', 'desc')->limit(3)->get();
        $visi_misis = VisiMisi::orderBy('created_at', 'desc')->limit(1)->get();
        $tujuans = Tujuan::orderBy('created_at', 'desc')->limit(1)->get();
        $tentang_pesantrens = TentangPesantren::orderBy('created_at', 'desc')->limit(1)->get();
        $testimonis = Testimoni::leftjoin('kategori_testimonis', 'kategori_testimonis.id', '=', 'testimonis.status_id')
        ->inRandomOrder()->select(
            'testimonis.id',
            'testimonis.name',
            'testimonis.status_id',
            'testimonis.desc',
            'testimonis.img',
            'testimonis.created_at',
            'kategori_testimonis.name as status')
        ->limit(3)->get();

        $kegiatans = Kegiatan::orderBy('created_at', 'desc')->get();
        $kategori_kegiatans = KategoriKegiatan::orderBy('created_at', 'desc')->get();
        return view('welcome', compact('kategori_kegiatans', 'kegiatans', 'tentang_pesantrens', 'testimonis', 'tujuans', 'slider_sirmis', 'beritas', 'acara', 'galeri_pesantren', 'prestasi_sirmis', 'visi_misis'));
    }
     public function tataTertib()
    {
        return view('tatatertib');
    }
     public function galeri()
    {
        $galeries = GaleriPesantren::orderBy('created_at', 'desc')->paginate(9);
        return view('galeri', compact('galeries'));
    }
    public function jadwalPendaftaran()
    {
        $schedulle = JadwalPendaftaran::first();
        return view('jadwal-pendaftaran', compact('schedulle'));
    }
    public function pembiayaan()
    {
        $cost = Pembiayaan::first();
        return view('pembiayaan', compact('cost'));
    }
    public function ketuaKamar()
    {
        return view('ketuakamar');
    }
    public function pembimbing()
    {
        return view('pembimbing');
    }
    public function pembimbingBahasa()
    {
        return view('pembimbingbahasa');
    }
    public function pembimbingTahfidz()
    {
        return view('pembimbingtahfidz');
    }
    public function skripsi()
    {
        return view('skripsi');
    }

    public function pendaftaranSantri()
    {
        return view('daftar');
    }
}
