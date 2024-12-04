<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaPerusahaanToKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('karyawan', function (Blueprint $table) {
        $table->string('nama_perusahaan')->nullable();
    });
}

public function down()
{
    Schema::table('karyawan', function (Blueprint $table) {
        $table->dropColumn('nama_perusahaan');
    });
}

}
