<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_negocios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo',12)->nullable();
            $table->string('nombre',200)->nullable();
            $table->string('siglas', 50)->nullable();
            $table->text('descripcion')->nullable();
            $table->text('picture')->nullable();
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
        Schema::dropIfExists('linea_negocios');
    }
}
