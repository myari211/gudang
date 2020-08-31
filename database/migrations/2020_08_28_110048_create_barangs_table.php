<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lokasi_gudang');
            $table->unsignedBigInteger('category_barang');
            $table->string('nama_barang');
            $table->string('merk_barang');
            $table->string('tipe_barang');
            $table->timestamps();
        });

        Schema::table('barang', function($table){
            $table->foreign('lokasi_gudang')->references('id')->on('gudangs');
            $table->foreign('category_barang')->references('id_category')->on('category_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
