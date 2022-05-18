<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnNisnOnPendaftaranTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftaran_tsanawiyahs', function (Blueprint $table) {
            $table->string('nisn')->after('id');
            $table->string('status')->after('no_tlp_ayah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendaftaran_tsanawiyahs', function (Blueprint $table) {
            $table->dropColumn('nisn');
            $table->dropColumn('status');
        });
    }
}
