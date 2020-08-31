<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi', function (Blueprint $table) {
            $table->id('mutasi_barang');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_gudang');
            $table->string('masuk');
            $table->string('keluar');
            $table->timestamps();
        });

        Schema::table('mutasi', function($table){
            $table->foreign('id_barang')->references('id')->on('barang');
            $table->foreign('id_gudang')->references('id')->on('gudangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutasis');
    }
}
