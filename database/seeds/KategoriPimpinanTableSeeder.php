<?php

use Illuminate\Database\Seeder;
use App\KategoriPimpinan;

class KategoriPimpinanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_pimpinan = new KategoriPimpinan();
        $kategori_pimpinan->id = '1';
        $kategori_pimpinan->kategori_pimpinan = 'Pesantren';
        $kategori_pimpinan->save();

        $kategori_pimpinan = new KategoriPimpinan();
        $kategori_pimpinan->id = '2';
        $kategori_pimpinan->kategori_pimpinan = 'Aliyah';
        $kategori_pimpinan->save();

        $kategori_pimpinan = new KategoriPimpinan();
        $kategori_pimpinan->id = '3';
        $kategori_pimpinan->kategori_pimpinan = 'Tsanawiyah';
        $kategori_pimpinan->save();
    }
}
