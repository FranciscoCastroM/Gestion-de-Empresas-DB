<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSalidaAlmacenIdToInventarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventarios', function (Blueprint $table) {
            $table->unsignedBigInteger('salidaalmacen_id')->nullable();
            $table->foreign('salidaalmacen_id')->references('id')->on('salida_almacens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventarios', function (Blueprint $table) {
            $table->dropForeign(['salidaalmacen_id']);
            $table->dropColumn('salidaalmacen_id');
        });
    }
}
