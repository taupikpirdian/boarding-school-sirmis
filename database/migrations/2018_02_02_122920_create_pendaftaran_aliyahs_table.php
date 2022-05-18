<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendaftaranAliyahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_aliyahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nm_lengkap');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('alamat_siswa');
            $table->string('jk');
            $table->string('no_tlp');
            $table->string('ukuran_seragam');
            $table->string('pesantren');
            $table->string('photo');

            $table->string('nama_ibu');
            $table->string('tmpt_lahir_ibu');
            $table->string('alamat_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('penghasilan_ibu');
            $table->string('pendidikan_ibu');
            $table->string('no_tlp_ibu')->nullable();

            $table->string('nama_ayah');
            $table->string('tmpt_lahir_ayah');
            $table->string('alamat_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('penghasilan_ayah');
            $table->string('pendidikan_ayah');
            $table->string('no_tlp_ayah')->nullable();
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
        Schema::dropIfExists('pendaftaran_aliyahs');
    }
}
