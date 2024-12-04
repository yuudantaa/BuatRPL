<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaBankAndRekeningToPerusahaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perusahaans', function (Blueprint $table) {
            $table->string('nama_bank');
            $table->string('rekening');
        });
    }

    public function down()
    {
        Schema::table('perusahaans', function (Blueprint $table) {
            $table->dropColumn('nama_bank');
            $table->dropColumn('rekening');
        });
    }

}
