<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('documentos', function (Blueprint $table) {
                $table->increments('id');            
                $table->integer('producto_id')->nullable();             
                $table->string('comentario')->nullable();
                $table->string('documento')->nullable();
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
        
        Schema::drop('documentos');
    }
}