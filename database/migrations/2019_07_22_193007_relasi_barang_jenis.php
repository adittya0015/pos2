<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelasiBarangJenis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        Schema::table('barang', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jenis')->change();
            $table->foreign('id_jenis')->references('id')->on('jenis')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_uom')->change();
            $table->foreign('id_uom')->references('id')->on('uom')
                    ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang', function(Blueprint $table) {
            $table->dropForeign('barang_id_jenis_foreign');
        });
        
        Schema::table('products', function(Blueprint $table) {
            $table->dropIndex('barang_id_jenis_foreign');
        });
        
        Schema::table('products', function(Blueprint $table) {
            $table->integer('id_jenis')->change();
        });

        Schema::table('barang', function(Blueprint $table) {
            $table->dropForeign('barang_id_uom_foreign');
        });
        
        Schema::table('products', function(Blueprint $table) {
            $table->dropIndex('barang_id_uom_foreign');
        });
        
        Schema::table('products', function(Blueprint $table) {
            $table->integer('id_uom')->change();
        });
    }
}
