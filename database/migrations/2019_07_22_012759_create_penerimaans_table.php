<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerimaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sub_total');
            $table->integer('potongan');
            $table->integer('grand_total');
            $table->text('keterangan')->nullable();
            $table->string('input_by');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_supplier');
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
        Schema::dropIfExists('penerimaans');
    }
}
