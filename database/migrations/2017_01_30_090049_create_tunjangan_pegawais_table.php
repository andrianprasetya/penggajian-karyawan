<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTunjanganPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunjangan_pegawais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode_tunjangan_id')->unsigned();
            $table->foreign('kode_tunjangan_id')->references('id')->on('tunjangans')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('pegawai_id')->unsigned()->unique();
            $table->foreign('pegawai_id')->references('id')->on('pegawais')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('tunjangan_pegawais');
    }
}
