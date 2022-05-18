<?php

use Illuminate\Database\Seeder;
use App\KategoriBerita;

class KategoriBeritaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_berita = new KategoriBerita();
        $kategori_berita->id = '1';
        $kategori_berita->kategori_berita = 'Pesantren';
        $kategori_berita->save();

        $kategori_berita = new KategoriBerita();
        $kategori_berita->id = '2';
        $kategori_berita->kategori_berita = 'Aliyah';
        $kategori_berita->save();

        $kategori_berita = new KategoriBerita();
        $kategori_berita->id = '3';
        $kategori_berita->kategori_berita = 'Tsanawiyah';
        $kategori_berita->save();
    }
}
