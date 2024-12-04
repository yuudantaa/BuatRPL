<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PerusahaanIdToKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('karyawan', function (Blueprint $table) {
            $table->unsignedBigInteger('perusahaan_id'); // Harus ada kolom perusahaan_id di tabel karyawan
            $table->foreign('perusahaan_id')->references('id')->on('perusahaans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('karyawan', function (Blueprint $table) {
            $table->dropForeign(['perusahaan_id']);
            $table->dropColumn('perusahaan_id');
        });
    }
}// Periksa kolom perusahaan_id pada tabel karyawan


