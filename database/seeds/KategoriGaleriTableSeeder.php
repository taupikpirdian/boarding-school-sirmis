<?php

use Illuminate\Database\Seeder;
use App\KategoriGaleri;


class KategoriGaleriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_galeri = new KategoriGaleri();
        $kategori_galeri->id = '1';
        $kategori_galeri->kategori_galeri = 'Pesantren';
        $kategori_galeri->save();

        $kategori_galeri = new KategoriGaleri();
        $kategori_galeri->id = '2';
        $kategori_galeri->kategori_galeri = 'Aliyah';
        $kategori_galeri->save();

        $kategori_galeri = new KategoriGaleri();
        $kategori_galeri->id = '3';
        $kategori_galeri->kategori_galeri = 'Tsanawiyah';
        $kategori_galeri->save();
    }
}
