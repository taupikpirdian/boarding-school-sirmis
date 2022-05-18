<?php

use Illuminate\Database\Seeder;
use App\KategoriArtikel;

class KategoriArtikelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_artikel = new KategoriArtikel();
        $kategori_artikel->id = '1';
        $kategori_artikel->kategori_artikel = 'Pesantren';
        $kategori_artikel->save();

        $kategori_artikel = new KategoriArtikel();
        $kategori_artikel->id = '2';
        $kategori_artikel->kategori_artikel = 'Aliyah';
        $kategori_artikel->save();

        $kategori_artikel = new KategoriArtikel();
        $kategori_artikel->id = '3';
        $kategori_artikel->kategori_artikel = 'Tsanawiyah';
        $kategori_artikel->save();
    }
}
