<?php

use Illuminate\Database\Seeder;
use App\KategoriAcara;

class KategoriAcaraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_acara = new KategoriAcara();
        $kategori_acara->id = '1';
        $kategori_acara->kategori_acara = 'Pesantren';
        $kategori_acara->save();

        $kategori_acara = new KategoriAcara();
        $kategori_acara->id = '2';
        $kategori_acara->kategori_acara = 'Aliyah';
        $kategori_acara->save();

        $kategori_acara = new KategoriAcara();
        $kategori_acara->id = '3';
        $kategori_acara->kategori_acara = 'Tsanawiyah';
        $kategori_acara->save();
    }
}
