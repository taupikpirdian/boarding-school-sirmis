<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(KategoriAcaraTableSeeder::class);
        $this->call(KategoriArtikelTableSeeder::class);
        $this->call(KategoriBeritaTableSeeder::class);
        $this->call(KategoriGaleriTableSeeder::class);
        $this->call(KategoriLembagaTableSeeder::class);
        $this->call(KategoriPengajarTableSeeder::class);
        $this->call(KategoriPimpinanTableSeeder::class);
        $this->call(KategoriVisiMisiTableSeeder::class);
        $this->call(KategoriKegiatanTableSeeder::class);
        
    }
}