<?php

use Illuminate\Database\Seeder;
use App\KategoriGuru;

class KategoriPengajarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_guru = new KategoriGuru();
        $kategori_guru->id = '1';
        $kategori_guru->kategori_guru = 'Pesantren';
        $kategori_guru->save();

        $kategori_guru = new KategoriGuru();
        $kategori_guru->id = '2';
        $kategori_guru->kategori_guru = 'Aliyah';
        $kategori_guru->save();

        $kategori_guru = new KategoriGuru();
        $kategori_guru->id = '3';
        $kategori_guru->kategori_guru = 'Tsanawiyah';
        $kategori_guru->save();
    }
}
