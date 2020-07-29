<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogArtikelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_artikel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',128);
            $table->string('nip',50);
            $table->string('departement',50);
            $table->string('kode_pertanyaan',50);
            $table->string('tanggal',20);
            $table->string('waktu',20);
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
        Schema::dropIfExists('log_artikel');
    }
}
