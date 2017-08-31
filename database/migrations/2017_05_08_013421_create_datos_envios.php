<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosEnvios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('datos_envios', function (Blueprint $table) {
                $table->increments('id');            
                $table->integer('user_id')->unsigned()->index();             
                $table->integer('activo')->nullable();
                $table->string('cp')->nullable();
                $table->string('calle')->nullable();
                $table->string('n_ext')->nullable();
                $table->string('n_int')->nullable();
                $table->string('colonia')->nullable();
                $table->string('municipio')->nullable();
                $table->string('estado')->nullable();
                $table->string('pais')->nullable();
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
        
        Schema::drop('datos_envios');
    }
}
