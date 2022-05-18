<?php

use Illuminate\Database\Seeder;
use App\KategoriVisiMisi;

class KategoriVisiMisiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_visimisi = new KategoriVisiMisi();
        $kategori_visimisi->id = '1';
        $kategori_visimisi->kategori_visimisi = 'Pesantren';
        $kategori_visimisi->save();

        $kategori_visimisi = new KategoriVisiMisi();
        $kategori_visimisi->id = '2';
        $kategori_visimisi->kategori_visimisi = 'Aliyah';
        $kategori_visimisi->save();

        $kategori_visimisi = new KategoriVisiMisi();
        $kategori_visimisi->id = '3';
        $kategori_visimisi->kategori_visimisi = 'Tsanawiyah';
        $kategori_visimisi->save();
    }
}
