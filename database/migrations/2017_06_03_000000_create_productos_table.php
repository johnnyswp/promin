<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('productos', function (Blueprint $table) {
                $table->increments('id');            
                $table->integer('linea_negocio_id')->nullable();             
                $table->integer('tipo_producto_id')->nullable();
                $table->integer('marcas_id')->nullable();
                $table->integer('modelo_id')->nullable();
                $table->string('serie')->nullable();
                $table->string('nFact')->nullable();
                $table->string('nPedi')->nullable();
                $table->string('horometro')->nullable();
                $table->string('asesor_id')->nullable();
                $table->string('picture')->nullable();
                $table->string('priceVenta')->nullable();
                $table->string('descripcion')->nullable();
                $table->string('linkMercadoLibre')->nullable();
                $table->string('LinkMachineryTrader')->nullable();
                $table->string('alto')->nullable();
                $table->string('largo')->nullable();
                $table->string('ancho')->nullable();
                $table->string('peso')->nullable();
                $table->string('keywork')->nullable();
                $table->string('nombreMotor')->nullable();
                $table->string('tipoMotor')->nullable();
                $table->string('modeloMotor')->nullable();
                $table->string('SerieMotor')->nullable();
                $table->string('motor')->nullable();
                $table->string('trenRodaje')->nullable();
                $table->string('sistemaElectrico')->nullable();
                $table->string('tableroInstrumentos')->nullable();
                $table->string('frenos')->nullable();
                $table->string('sistemaHidraulico')->nullable();
                $table->string('equipos')->nullable();
                $table->string('filtros')->nullable();
                $table->string('carroceria')->nullable();
                $table->string('rodillosVibratorios')->nullable();
                $table->string('transmicion')->nullable();
                $table->string('transmicionMarca')->nullable();
                $table->string('transmicionModelo')->nullable();
                $table->string('transmicionMserie')->nullable();
                $table->string('varios')->nullable();
                $table->string('variosOtros')->nullable();
                $table->string('combustible')->nullable();
                $table->string('tomaFotos')->nullable();
                $table->string('avaluoLlantas')->nullable();
                $table->string('statusLlantas')->nullable();
                $table->string('observacionesLlantas')->nullable();
                $table->string('status')->nullable();
                $table->string('observacioneGenerales')->nullable();
                $table->string('observaciones')->nullable();
                $table->string('state')->nullable();
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
        
        Schema::drop('productos');
    }
}
