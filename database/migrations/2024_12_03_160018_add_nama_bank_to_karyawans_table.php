<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaBankToKaryawansTable extends Migration
{
    public function up()
    {
        Schema::table('karyawan', function (Blueprint $table) {
            $table->string('nama_bank')->nullable(); // Menambahkan kolom nama_bank
        });
    }

    public function down()
    {
        Schema::table('karyawan', function (Blueprint $table) {
            $table->dropColumn('nama_bank'); // Menghapus kolom nama_bank jika migrasi dibatalkan
        });
    }
}
