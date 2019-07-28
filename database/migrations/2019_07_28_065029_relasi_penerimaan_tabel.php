<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelasiPenerimaanTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::table('penerimaan', function (Blueprint $table) {
            $table->foreign('id_supplier')
            ->references('id')->on('supplier')
                ->onDelete('cascade');

            $table->foreign('id_user')
            ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penerimaan', function (Blueprint $table) {
            $table->dropForeign('invoices_id_supplier_foreign');
        });

        Schema::table('penerimaan', function (Blueprint $table) {
            $table->dropForeign('invoices_id_user_foreign');
        });
    }
}
