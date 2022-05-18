<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiodataGuruPesantrensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_guru_pesantrens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('nip');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('jk');
            $table->integer('id_status');
            $table->string('alamat');
            $table->integer('id_matapelajaran');
            $table->integer('id_kategori');
            $table->string('awal_masuk');
            $table->string('img');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodata_guru_pesantrens');
    }
}
