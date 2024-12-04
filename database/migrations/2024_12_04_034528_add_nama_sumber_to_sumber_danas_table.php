<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaSumberAndDeskripsiToSumberDanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sumber_danas', function (Blueprint $table) {
            $table->string('nama_sumber');
            $table->string('deskripsi')->nullable(); // Menambahkan kolom deskripsi
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sumber_danas', function (Blueprint $table) {
            $table->dropColumn(['nama_sumber', 'deskripsi']); // Menghapus kedua kolom
            Schema::table('sumber_danas', function (Blueprint $table) {
                $table->string('deskripsi')->nullable();
            });

        });
    }
}
