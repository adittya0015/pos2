<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->enum('pkp', ['PKP', 'Non-PKP']);
            $table->integer('stok_min');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('jumlah_stok');
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('id_jenis');
            $table->unsignedBigInteger('id_uom');
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
        Schema::dropIfExists('barangs');
    }
}
