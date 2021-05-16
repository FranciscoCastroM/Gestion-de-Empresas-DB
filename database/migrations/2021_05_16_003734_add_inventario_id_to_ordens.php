<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInventarioIdToOrdens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordens', function (Blueprint $table) {
            $table->unsignedBigInteger('inventario_id');
            $table->foreign('inventario_id')->references('id')->on('inventarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordens', function (Blueprint $table) {
            $table->dropForeign(['inventario_id']);
            $table->dropColumn('inventario_id');
        });
    }
}
