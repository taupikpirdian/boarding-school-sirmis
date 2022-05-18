<?php

use Illuminate\Database\Seeder;
use App\KategoriLembaga;

class KategoriLembagaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_lembaga = new KategoriLembaga();
        $kategori_lembaga->id = '1';
        $kategori_lembaga->kategori_lembaga = 'Pesantren';
        $kategori_lembaga->save();

        $kategori_lembaga = new KategoriLembaga();
        $kategori_lembaga->id = '2';
        $kategori_lembaga->kategori_lembaga = 'Aliyah';
        $kategori_lembaga->save();

        $kategori_lembaga = new KategoriLembaga();
        $kategori_lembaga->id = '3';
        $kategori_lembaga->kategori_lembaga = 'Tsanawiyah';
        $kategori_lembaga->save();
    }
}
