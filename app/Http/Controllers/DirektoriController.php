<?php

namespace App\Http\Controllers;

use App\BiodataGuruPesantren;
use App\StatusGuru;
use App\KategoriGuru;
use App\Matpel;
use App\Pimpinan;
use App\KategoriPimpinan;
use App\VisiMisi;
use App\KategoriVisiMisi;
use App\DetailLembaga;
use App\KategoriLembaga;
use Illuminate\Http\Request;

class DirektoriController extends Controller
{
    public function aliyah()
    {
       $aliyah = BiodataGuruPesantren::leftjoin('kategori_gurus', 'kategori_gurus.id', '=', 'biodata_guru_pesantrens.id_kategori')
        ->leftjoin('status_gurus','status_gurus.id', '=' ,'biodata_guru_pesantrens.id_status')
        ->leftjoin('matpels','matpels.id', '=' ,'biodata_guru_pesantrens.id_matapelajaran')
        ->whereIdKategori(2)
        ->orderBy('biodata_guru_pesantrens.created_at', 'desc')
        ->select(
            'biodata_guru_pesantrens.id',
            'biodata_guru_pesantrens.nama',
            'biodata_guru_pesantrens.nip',
            'biodata_guru_pesantrens.tempat_lahir',
            'biodata_guru_pesantrens.tanggal_lahir',
            'biodata_guru_pesantrens.jk',
            'biodata_guru_pesantrens.id_status',
            'biodata_guru_pesantrens.alamat',
            'biodata_guru_pesantrens.id_matapelajaran',
            'biodata_guru_pesantrens.id_kategori',
            'biodata_guru_pesantrens.awal_masuk',
            'biodata_guru_pesantrens.img',
            'kategori_gurus.kategori_guru',
            'status_gurus.status_guru',
            'matpels.matpel')
        ->get();

        $pimpinan_aliyah = Pimpinan::leftjoin('kategori_pimpinans', 'kategori_pimpinans.id', '=', 'pimpinans.id_kategori')
        ->whereIdKategori(2)
        ->orderBy('pimpinans.created_at', 'desc')
        ->select(
            'pimpinans.id',
            'pimpinans.name',
            'pimpinans.jabatan',
            'pimpinans.img',
            'pimpinans.id_kategori',
            'kategori_pimpinans.kategori_pimpinan')
        ->get();

        $visi_misi_aliyah = VisiMisi::leftjoin('kategori_visi_misis', 'kategori_visi_misis.id', '=', 'visi_misis.id_kategori')
        ->whereIdKategori(2)
        ->orderBy('visi_misis.created_at', 'desc')
        ->select(
            'visi_misis.id',
            'visi_misis.visi',
            'visi_misis.misi',
            'visi_misis.id_kategori',
            'kategori_visi_misis.kategori_visimisi')
        ->get();

        $detail_lembaga_aliyah = DetailLembaga::leftjoin('kategori_lembagas', 'kategori_lembagas.id', '=', 'detail_lembagas.id_kategori')
        ->whereIdKategori(2)
        ->orderBy('detail_lembagas.created_at', 'desc')
        ->select(
            'detail_lembagas.id',
            'detail_lembagas.deskripsi',
            'kategori_lembagas.kategori_lembaga')
        ->get();

       return view('aliyah', compact('aliyah', 'pimpinan_aliyah', 'visi_misi_aliyah', 'detail_lembaga_aliyah'));
    }

    public function tsanawiyah()
    {
       $tsanawiyah = BiodataGuruPesantren::leftjoin('kategori_gurus', 'kategori_gurus.id', '=', 'biodata_guru_pesantrens.id_kategori')
        ->leftjoin('status_gurus','status_gurus.id', '=' ,'biodata_guru_pesantrens.id_status')
        ->leftjoin('matpels','matpels.id', '=' ,'biodata_guru_pesantrens.id_matapelajaran')
        ->whereIdKategori(3)
        ->orderBy('biodata_guru_pesantrens.created_at', 'desc')
        ->select(
            'biodata_guru_pesantrens.id',
            'biodata_guru_pesantrens.nama',
            'biodata_guru_pesantrens.nip',
            'biodata_guru_pesantrens.tempat_lahir',
            'biodata_guru_pesantrens.tanggal_lahir',
            'biodata_guru_pesantrens.jk',
            'biodata_guru_pesantrens.id_status',
            'biodata_guru_pesantrens.alamat',
            'biodata_guru_pesantrens.id_matapelajaran',
            'biodata_guru_pesantrens.id_kategori',
            'biodata_guru_pesantrens.awal_masuk',
            'biodata_guru_pesantrens.img',
            'kategori_gurus.kategori_guru',
            'status_gurus.status_guru',
            'matpels.matpel')
        ->get();

        $pimpinan_tsanawiyah = Pimpinan::leftjoin('kategori_pimpinans', 'kategori_pimpinans.id', '=', 'pimpinans.id_kategori')
        ->whereIdKategori(3)
        ->orderBy('pimpinans.created_at', 'desc')
        ->select(
            'pimpinans.id',
            'pimpinans.name',
            'pimpinans.jabatan',
            'pimpinans.img',
            'pimpinans.id_kategori',
            'kategori_pimpinans.kategori_pimpinan')
        ->get();

        $visi_misi_tsanawiyah = VisiMisi::leftjoin('kategori_visi_misis', 'kategori_visi_misis.id', '=', 'visi_misis.id_kategori')
        ->whereIdKategori(3)
        ->orderBy('visi_misis.created_at', 'desc')
        ->select(
            'visi_misis.id',
            'visi_misis.visi',
            'visi_misis.misi',
            'visi_misis.id_kategori',
            'kategori_visi_misis.kategori_visimisi')
        ->get();

        $detail_lembaga_tsanawiyah = DetailLembaga::leftjoin('kategori_lembagas', 'kategori_lembagas.id', '=', 'detail_lembagas.id_kategori')
        ->whereIdKategori(3)
        ->orderBy('detail_lembagas.created_at', 'desc')
        ->select(
            'detail_lembagas.id',
            'detail_lembagas.deskripsi',
            'kategori_lembagas.kategori_lembaga')
        ->get();

       return view('tsanawiyah', compact('tsanawiyah', 'pimpinan_tsanawiyah', 'visi_misi_tsanawiyah', 'detail_lembaga_tsanawiyah'));
    }

    public function pesantren()
    {
       $pesantren = BiodataGuruPesantren::leftjoin('kategori_gurus', 'kategori_gurus.id', '=', 'biodata_guru_pesantrens.id_kategori')
        ->leftjoin('status_gurus','status_gurus.id', '=' ,'biodata_guru_pesantrens.id_status')
        ->leftjoin('matpels','matpels.id', '=' ,'biodata_guru_pesantrens.id_matapelajaran')
        ->whereIdKategori(1)
        ->orderBy('biodata_guru_pesantrens.created_at', 'desc')
        ->select(
            'biodata_guru_pesantrens.id',
            'biodata_guru_pesantrens.nama',
            'biodata_guru_pesantrens.nip',
            'biodata_guru_pesantrens.tempat_lahir',
            'biodata_guru_pesantrens.tanggal_lahir',
            'biodata_guru_pesantrens.jk',
            'biodata_guru_pesantrens.id_status',
            'biodata_guru_pesantrens.alamat',
            'biodata_guru_pesantrens.id_matapelajaran',
            'biodata_guru_pesantrens.id_kategori',
            'biodata_guru_pesantrens.awal_masuk',
            'biodata_guru_pesantrens.img',
            'kategori_gurus.kategori_guru',
            'status_gurus.status_guru',
            'matpels.matpel')
        ->get();

        $pimpinan_pesantren = Pimpinan::leftjoin('kategori_pimpinans', 'kategori_pimpinans.id', '=', 'pimpinans.id_kategori')
        ->whereIdKategori(1)
        ->orderBy('pimpinans.created_at', 'desc')
        ->select(
            'pimpinans.id',
            'pimpinans.name',
            'pimpinans.jabatan',
            'pimpinans.img',
            'pimpinans.id_kategori',
            'kategori_pimpinans.kategori_pimpinan')
        ->get();

        $visi_misi_pesantren = VisiMisi::leftjoin('kategori_visi_misis', 'kategori_visi_misis.id', '=', 'visi_misis.id_kategori')
        ->whereIdKategori(1)
        ->orderBy('visi_misis.created_at', 'desc')
        ->select(
            'visi_misis.id',
            'visi_misis.visi',
            'visi_misis.misi',
            'visi_misis.id_kategori',
            'kategori_visi_misis.kategori_visimisi')
        ->get();

        $detail_lembaga_pesantren = DetailLembaga::leftjoin('kategori_lembagas', 'kategori_lembagas.id', '=', 'detail_lembagas.id_kategori')
        ->whereIdKategori(1)
        ->orderBy('detail_lembagas.created_at', 'desc')
        ->select(
            'detail_lembagas.id',
            'detail_lembagas.deskripsi',
            'kategori_lembagas.kategori_lembaga')
        ->get();

       return view('pesantren', compact('pesantren', 'pimpinan_pesantren', 'visi_misi_pesantren', 'detail_lembaga_pesantren'));
    }
}
