<?php

use Illuminate\Database\Seeder;
use App\KategoriKegiatan;

class KategoriKegiatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = new KategoriKegiatan();
        $kategori->id = '1';
        $kategori->name = 'OSPS';
        $kategori->save();

        $kategori = new KategoriKegiatan();
        $kategori->id = '2';
        $kategori->name = 'Muhadoroh';
        $kategori->save();

        $kategori = new KategoriKegiatan();
        $kategori->id = '3';
        $kategori->name = 'Marhabaan';
        $kategori->save();

        $kategori = new KategoriKegiatan();
        $kategori->id = '4';
        $kategori->name = 'Ziarah';
        $kategori->save();

        $kategori = new KategoriKegiatan();
        $kategori->id = '5';
        $kategori->name = 'Ngaji';
        $kategori->save();
    }
}
