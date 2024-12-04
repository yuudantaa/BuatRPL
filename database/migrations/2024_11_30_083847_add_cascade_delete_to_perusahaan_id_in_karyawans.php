<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCascadeDeleteToPerusahaanIdInKaryawans extends Migration
{
    public function up()
    {
        Schema::table('karyawan', function (Blueprint $table) {
            $table->dropForeign(['perusahaan_id']);
            $table->foreign('perusahaan_id')
                ->references('id')->on('perusahaans')
                ->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::table('karyawan', function (Blueprint $table) {
            $table->dropForeign(['perusahaan_id']);
            $table->foreign('perusahaan_id')
                ->references('id')->on('perusahaans');
        });
    }
}
