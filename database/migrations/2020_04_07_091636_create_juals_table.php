<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_unit')->unsigned();
            $table->foreign('id_unit')->references('id')->on('units');
            $table->string('produk');
            $table->string('foto')->nullable();
            $table->integer('harga');
            $table->string('lokasi');
            $table->string('telp');
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
        Schema::dropIfExists('juals');
    }
}
