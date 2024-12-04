<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaBankToKaryawanTable extends Migration
{
    public function up()
    {
        Schema::table('karyawan', function (Blueprint $table) {
            $table->string('nama_bank')->after('no_rekening'); // Letakkan setelah kolom no_rekening
        });
    }

    public function down()
    {
        Schema::table('karyawan', function (Blueprint $table) {
            $table->dropColumn('nama_bank');
        });
    }
}
