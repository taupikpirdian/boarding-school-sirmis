<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendaftaranTsanawiyahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_tsanawiyahs', function (Blueprint $table) {
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

            $table->string('nama_ibu')->nullable();
            $table->string('tmpt_lahir_ibu')->nullable();
            $table->string('alamat_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('no_tlp_ibu')->nullable();

            $table->string('nama_ayah')->nullable();
            $table->string('tmpt_lahir_ayah')->nullable();
            $table->string('alamat_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
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
        Schema::dropIfExists('pendaftaran_tsanawiyahs');
    }
}
