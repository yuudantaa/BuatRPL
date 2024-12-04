<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('no_rekening');
            $table->string('status');
            $table->string('department');
            $table->date('joining_date');
            $table->unsignedBigInteger('perusahaan_id');  // Add perusahaan_id column
            $table->foreign('perusahaan_id')->references('id')->on('perusahaans')->onDelete('cascade');  // Add foreign key constraint
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
