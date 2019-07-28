<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPenerimaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail__penerimaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_penerimaan');
            $table->unsignedBigInteger('id_barang');
            $table->integer('qty');
            $table->integer('harga');
            $table->integer('total');
            $table->unsignedBigInteger('id_user');
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
        Schema::dropIfExists('detail__penerimaans');
    }
}
