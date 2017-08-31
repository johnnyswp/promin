<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->increments('id');   
            $table->integer('linea_negocio')->nullable();
            $table->integer('vendedor')->nullable();
            $table->integer('area_interes')->nullable();
            $table->string('tipo_user')->nullable();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('parental_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('email2')->unique()->nullable();
            $table->string('password', 60)->nullable();
            $table->boolean('activated')->default(false);
            $table->string('picture')->nullable();
            $table->string('token')->nullable();
            $table->string('website')->nullable();
            $table->text('comentarios')->nullable();
            $table->string('genero')->nullable();
            $table->string('telephone')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
