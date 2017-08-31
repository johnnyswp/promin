<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('gastos', function (Blueprint $table) {
                $table->increments('id');            
                $table->integer('producto_id');             
                $table->string('cantidad')->nullable();
                $table->string('descripcion')->nullable();
                $table->string('precio')->nullable();
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
        
        Schema::drop('gastos');
    }
}
