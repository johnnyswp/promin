            <div class="row">

              <div class="col-md-12"><br></div>

            </div>     
            
            {{Form::model($producto, ['route' => ['productos-mx.save', $producto->id],'files' => true, 'method' => 'POST'])}}
            <input type="hidden" name="type" value="entrada">
            <div class="row">

            

              <div class="col-md-4 col-sm-6 col-xs-12">

                <ul class="lista_check">

                  <li><label for="">Nombre de motor </label>{{Form::text('nombreMotor', NULL, ['class'=>'form-control w85'])}} </li>

                  <li><label for="">Tipo de motor </label>{{Form::text('tipoMotor', NULL, ['class'=>'form-control w85'])}}</li>

                  <li><label for="">Modelo de motor </label>{{Form::text('modeloMotor', NULL, ['class'=>'form-control w85'])}}</li>

                  <li><label for="">Serie de motor</label>{{Form::text('SerieMotor', NULL, ['class'=>'form-control w85'])}}</li>

                </ul>

                

                <h2>Motor</h2>

                <ul class="lista_check">

                  <li><label class="checkbox-inline">{{Form::checkbox('motor[]', 'Radiador',in_array("Radiador", explode(',', $producto->motor)))}} Radiador</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('motor[]', 'Ventilador',in_array("Ventilador", explode(',', $producto->motor)))}} Ventilador</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('motor[]', 'Banda ventilador',in_array("Banda ventilador", explode(',', $producto->motor)))}} Banda ventilador</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('motor[]', 'Bomba de agua',in_array("Bomba de agua", explode(',', $producto->motor)))}} Bomba de agua</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('motor[]', 'Bomba de transferencia',in_array("Bomba de transferencia", explode(',', $producto->motor)))}} Bomba de transferencia</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('motor[]', 'Banda de inyección',in_array("Banda de inyección", explode(',', $producto->motor)))}} Banda de inyección</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('motor[]', 'Turbocargador',in_array("Turbocargador", explode(',', $producto->motor)))}} Turbocargador</label></li>

                  <li><hr></li>

                </ul>

                

                <h2>Tren de rodaje</h2>

                <ul class="lista_check">

                  <li><label class="checkbox-inline">{{Form::checkbox('trenRodaje[]', 'Ruedas guía',in_array("Ruedas guía", explode(',', $producto->trenRodaje)))}} Ruedas guía</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('trenRodaje[]', 'Sproket',in_array("Sproket", explode(',', $producto->trenRodaje)))}} Sproket</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('trenRodaje[]', 'Rodillos superiores',in_array("Rodillos superiores", explode(',', $producto->trenRodaje)))}} Rodillos superiores</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('trenRodaje[]', 'Rodillos inferiores',in_array("Rodillos inferiores", explode(',', $producto->trenRodaje)))}} Rodillos inferiores</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('trenRodaje[]', 'Cadenas',in_array("Cadenas", explode(',', $producto->trenRodaje)))}} Cadenas</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('trenRodaje[]', 'Zapatas',in_array("Zapatas", explode(',', $producto->trenRodaje)))}} Zapatas</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('trenRodaje[]', 'Llantas',in_array("Llantas", explode(',', $producto->trenRodaje)))}} Llantas</label></li>

                  <li><hr></li>

                </ul>

                

                <h2>Sistema eléctrico</h2>

                <ul class="lista_check">

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico[]', 'Motor de arranque',in_array("Motor de arranque", explode(',', $producto->sistemaElectrico)))}} Motor de arranque</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico[]', 'Generador',in_array("Generador", explode(',', $producto->sistemaElectrico)))}} Generador</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico[]', 'Alternador',in_array("Alternador", explode(',', $producto->sistemaElectrico)))}} Alternador</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico[]', 'Regulador',in_array("Regulador", explode(',', $producto->sistemaElectrico)))}} Regulador</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico[]', 'Precalentador',in_array("Precalentador", explode(',', $producto->sistemaElectrico)))}} Precalentador</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico[]', 'Paro automático',in_array("Paro automático", explode(',', $producto->sistemaElectrico)))}} Paro automático</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico[]', 'Baterías',in_array("Baterías", explode(',', $producto->sistemaElectrico)))}} Baterías</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico[]', 'Instalación',in_array("Instalación", explode(',', $producto->sistemaElectrico)))}} Instalación</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico[]', 'Claxon',in_array("Claxon", explode(',', $producto->sistemaElectrico)))}} Claxon</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico[]', 'Luces',in_array("Luces", explode(',', $producto->sistemaElectrico)))}} Luces</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico[]', 'Calaveras',in_array("Calaveras", explode(',', $producto->sistemaElectrico)))}} Calaveras</label></li>

                  <li><hr></li>

                </ul>

                

                <h2>Tablero de instrumentos</h2>

                <ul class="lista_check">

                  <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos[]', 'Horómetro',in_array("Horómetro", explode(',', $producto->tableroInstrumentos)))}} Horómetro</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos[]', 'Amperímetro',in_array("Amperímetro", explode(',', $producto->tableroInstrumentos)))}} Amperímetro</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos[]', 'Termómetro',in_array("Termómetro", explode(',', $producto->tableroInstrumentos)))}} Termómetro</label></li>

                  <li>

                    <label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos[]', 'Refrigerante de motor',in_array("Refrigerante de motor", explode(',', $producto->tableroInstrumentos)))}} Refrigerante de motor</label>

                    <ul>

                      <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos[]', 'Aceite de motor',in_array("Aceite de motor", explode(',', $producto->tableroInstrumentos)))}} Aceite de motor</label></li>

                      <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos[]', 'Aceite de transmisión',in_array("Aceite de transmisión", explode(',', $producto->tableroInstrumentos)))}} Aceite de transmisión</label></li>    

                    </ul>

                  </li>                  

                  <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos[]', 'Tacómetro',in_array("Tacómetro", explode(',', $producto->tableroInstrumentos)))}} Tacómetro</label></li>

                  <li>

                    <label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos[]', 'Manómetros',in_array("Manómetros", explode(',', $producto->tableroInstrumentos)))}} Manómetros</label>

                    <ul>

                      <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos[]', 'Aceite de motor',in_array("Aceite de motor", explode(',', $producto->tableroInstrumentos)))}} Aceite de motor</label></li>

                      <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos[]', 'Aceite de transmisión',in_array("Aceite de transmisión", explode(',', $producto->tableroInstrumentos)))}} Aceite de transmisión</label></li>

                      <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos[]', 'Combustible aire',in_array("Combustible aire", explode(',', $producto->tableroInstrumentos)))}} Combustible aire</label></li>    

                    </ul>

                  </li>

                </ul>



              </div> <!-- FIN COL 1 -->



              <div class="col-md-4 col-sm-6 col-xs-12">

                <h2>Frenos</h2>

                <ul class="lista_check">

                  <li><label class="checkbox-inline">{{Form::checkbox('frenos[]', 'De mano',in_array("De mano", explode(',', $producto->frenos)))}} De mano</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('frenos[]', 'De pie',in_array("De pie", explode(',', $producto->frenos)))}} De pie</label></li>

                  <li><hr></li>

                </ul>



                <h2>Sistema hidráulico</h2>

                <ul class="lista_check">

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaHidraulico[]', 'Bomba hidráulica',in_array("Bomba hidráulica", explode(',', $producto->sistemaHidraulico)))}} Bomba hidráulica</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaHidraulico[]', 'Banco de válvulas',in_array("Banco de válvulas", explode(',', $producto->sistemaHidraulico)))}} Banco de válvulas</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaHidraulico[]', 'Mangueras y conexiones',in_array("Mangueras y conexiones", explode(',', $producto->sistemaHidraulico)))}} Mangueras y conexiones</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaHidraulico[]', 'Pistones hidráulicos',in_array("Pistones hidráulicos", explode(',', $producto->sistemaHidraulico)))}} Pistones hidráulicos</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaHidraulico[]', 'Acumulador de nitrógeno',in_array("Acumulador de nitrógeno", explode(',', $producto->sistemaHidraulico)))}} Acumulador de nitrógeno</label></li>

                  <li><hr></li>

                </ul>



                <h2>Equipos</h2>

                <ul class="lista_check">

                  <li><label class="checkbox-inline">{{Form::checkbox('equipos[]', 'Cuchillas',in_array("Cuchillas", explode(',', $producto->equipos)))}} Cuchillas</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('equipos[]', 'Gavilanes',in_array("Gavilanes", explode(',', $producto->equipos)))}} Gavilanes</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('equipos[]', 'Escarificador',in_array("Escarificador", explode(',', $producto->equipos)))}} Escarificador</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('equipos[]', 'Empujador',in_array("Empujador", explode(',', $producto->equipos)))}} Empujador</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('equipos[]', 'Cargador',in_array("Cargador", explode(',', $producto->equipos)))}} Cargador</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('equipos[]', 'Retroexcavador',in_array("Retroexcavador", explode(',', $producto->equipos)))}} Retroexcavador</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('equipos[]', 'Cucharón o bote',in_array("Cucharón o bote", explode(',', $producto->equipos)))}} Cucharón o bote</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('equipos[]', 'Lanza de arrastre',in_array("Lanza de arrastre", explode(',', $producto->equipos)))}} Lanza de arrastre</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('equipos[]', 'Tirón o alacrán',in_array("Tirón o alacrán", explode(',', $producto->equipos)))}} Tirón o alacrán</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('equipos[]', 'Gancho',in_array("Gancho", explode(',', $producto->equipos)))}} Gancho</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('equipos[]', 'Pluma',in_array("Pluma", explode(',', $producto->equipos)))}} Pluma</label></li>

                  <li>

                    <label class="checkbox-inline">{{Form::checkbox('equipos[]', 'Cables',in_array("Cables", explode(',', $producto->equipos)))}} Cables</label>

                    <ul>

                      <li><label class="checkbox-inline">{{Form::checkbox('equipos[]', 'de sostén',in_array("de sostén", explode(',', $producto->equipos)))}} de sostén</label></li>

                      <li><label class="checkbox-inline">{{Form::checkbox('equipos[]', 'de levante',in_array("de levante", explode(',', $producto->equipos)))}} de levante</label></li>

                      <li><label class="checkbox-inline">{{Form::checkbox('equipos[]', 'de arrastre',in_array("de arrastre", explode(',', $producto->equipos)))}} de arrastre</label></li>

                    </ul>

                  </li>

                  <li><hr></li>

                </ul>



                <h2>Filtros, niveles y tapones</h2>

                <ul class="lista_check">

                  <li><label class="checkbox-inline">{{Form::checkbox('filtros[]', 'Combustible',in_array("Combustible", explode(',', $producto->filtros)))}} Combustible</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('filtros[]', 'Aceite de motor',in_array("Aceite de motor", explode(',', $producto->filtros)))}} Aceite de motor</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('filtros[]', 'Transmisión',in_array("Transmisión", explode(',', $producto->filtros)))}} Transmisión</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('filtros[]', 'Hidráulico',in_array("Hidráulico", explode(',', $producto->filtros)))}} Hidráulico</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('filtros[]', 'Aire',in_array("Aire", explode(',', $producto->filtros)))}} Aire</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('filtros[]', 'Refrigerante',in_array("Refrigerante", explode(',', $producto->filtros)))}} Refrigerante</label></li>

                  <li><hr></li>

                </ul>



                <h2>Carrocería</h2>

                <ul class="lista_check">

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Asientos',in_array("Asientos", explode(',', $producto->carroceria)))}} Asientos</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Cristales',in_array("Cristales", explode(',', $producto->carroceria)))}} Cristales</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Volante',in_array("Volante", explode(',', $producto->carroceria)))}} Volante</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Perillas y placas',in_array("Perillas", explode(',', $producto->carroceria)))}} Perillas y placas</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Rines',in_array("Rines", explode(',', $producto->carroceria)))}} Rines</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Tanque combustible',in_array("Tanque combustible", explode(',', $producto->carroceria)))}} Tanque combustible</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Tanque hidráulico',in_array("Tanque hidráulico", explode(',', $producto->carroceria)))}} Tanque hidráulico</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Silenciador',in_array("Silenciador", explode(',', $producto->carroceria)))}} Silenciador</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Hojalatería',in_array("Hojalatería", explode(',', $producto->carroceria)))}} Hojalatería</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Pintura',in_array("Pintura", explode(',', $producto->carroceria)))}} Pintura</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Limpiaparabrisas',in_array("Limpiaparabrisas", explode(',', $producto->carroceria)))}} Limpiaparabrisas</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Casta',in_array("Casta", explode(',', $producto->carroceria)))}} Casta</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Parabrisas y cristales',in_array("Parabrisas", explode(',', $producto->carroceria)))}} Parabrisas y cristales</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Estribos',in_array("Estribos", explode(',', $producto->carroceria)))}} Estribos</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Tapas de motor',in_array("Tapas de motor", explode(',', $producto->carroceria)))}} Tapas de motor</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria[]', 'Tolvas',in_array("Tolvas", explode(',', $producto->carroceria)))}} Tolvas</label></li>

                </ul>

                

              </div> <!-- FIN COL 2 -->



              <div class="col-md-4 col-sm-6 col-xs-12">

                <h2>Rodillos y vibratorios</h2>

                <ul class="lista_check">

                  <li><label class="checkbox-inline">{{Form::checkbox('rodillosVibratorios[]', 'Bandas',in_array("Bandas", explode(',', $producto->rodillosVibratorios)))}} Bandas</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('rodillosVibratorios[]', 'Clutch',in_array("Clutch", explode(',', $producto->rodillosVibratorios)))}} Clutch</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('rodillosVibratorios[]', 'Acelerador remoto',in_array("Acelerador remoto", explode(',', $producto->rodillosVibratorios)))}} Acelerador remoto</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('rodillosVibratorios[]', 'Raspadores',in_array("Raspadores", explode(',', $producto->rodillosVibratorios)))}} Raspadores</label></li>

                  <li><hr></li>

                </ul>

                

                <h2>Transmisión</h2>

                <ul class="lista_check">

                  <li><label for="">Marca </label>{{Form::text('transmicionMarca', NULL, ['class'=>'form-control w85'])}}</li>

                  <li><label for="">Modelo </label>{{Form::text('transmicionModelo', NULL, ['class'=>'form-control w85'])}}</li>

                  <li><label for="">Serie </label>{{Form::text('transmicionMserie', NULL, ['class'=>'form-control w85'])}}</li>

                  <li><label class="checkbox-inline">{{Form::checkbox('transmicion[]', 'Clutch',in_array("Clutch", explode(',', $producto->transmicion)))}} Clutch</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('transmicion[]', 'Crucetas',in_array("Crucetas", explode(',', $producto->transmicion)))}} Crucetas</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('transmicion[]', 'Flecha cardan',in_array("Flecha cardan", explode(',', $producto->transmicion)))}} Flecha cardan</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('transmicion[]', 'Caja de velocidades',in_array("Caja de velocidades", explode(',', $producto->transmicion)))}} Caja de velocidades</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('transmicion[]', 'Diferencial',in_array("Diferencial", explode(',', $producto->transmicion)))}} Diferencial</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('transmicion[]', 'Manos finales',in_array("Manos finales", explode(',', $producto->transmicion)))}} Manos finales</label></li>

                  <li><hr></li>

                </ul>



                <h2>Varios</h2>

                <ul class="lista_check">

                  <li><label class="checkbox-inline">{{Form::checkbox('varios[]', 'Espejos laterales',in_array("Espejos laterales", explode(',', $producto->varios)))}} Espejos laterales</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('varios[]', 'Retrovisor',in_array("Retrovisor", explode(',', $producto->varios)))}} Retrovisor</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('varios[]', 'Alarma de reversa',in_array("Alarma de reversa", explode(',', $producto->varios)))}} Alarma de reversa</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('varios[]', 'Kit de martillo',in_array("Kit de martillo", explode(',', $producto->varios)))}} Kit de martillo</label></li>

                  <li><label class="checkbox-inline">{{Form::checkbox('varios[]', 'Guarda o limpiador',in_array("Guarda o limpiador", explode(',', $producto->varios)))}} Guarda o limpiador</label></li>

                  <li><label for="">Otros </label>{{Form::textarea('variosOtros', NULL, ['class'=>'form-control','style'=>"height: 100px;"])}}</li>

                  <li>

                    <label for="">Combustible</label>

                    <ul class="lista_radio_inline">

                      <li><label class="radio-inline">{{Form::radio('combustible', '1/4')}} 1/4</label></li>

                      <li><label class="radio-inline">{{Form::radio('combustible', '1/2')}} 1/2</label></li>

                      <li><label class="radio-inline">{{Form::radio('combustible', '3/4')}} 3/4</label></li>

                      <li><label class="radio-inline">{{Form::radio('combustible', 'Lleno')}} Lleno</label></li>

                    </ul>

                  </li>

                  <li>

                    <label for="">Toma de fotografías</label>

                    <ul class="lista_radio_inline">

                      <li><label class="radio-inline">{{Form::radio('tomaFotos', 'Si')}} Si</label></li>

                      <li><label class="radio-inline">{{Form::radio('tomaFotos', 'No')}} No</label></li>

                    </ul>

                  </li>

                  <li>

                    <label for="">Avaluó de llantas</label>

                    <ul class="lista_radio_inline">

                      <li><label class="radio-inline">{{Form::radio('avaluoLlantas', 'Si')}} Si</label></li>

                      <li><label class="radio-inline">{{Form::radio('avaluoLlantas', 'No')}} No</label></li>

                    </ul>

                  </li>

                  <li>

                    <label for="">Status llantas</label>

                    <ul class="lista_radio_inline">

                      <li><label class="radio-inline">{{Form::radio('statusLlantas', 'Si')}} Si</label></li>

                      <li><label class="radio-inline">{{Form::radio('statusLlantas', 'No')}} No</label></li>

                    </ul>

                  </li>

                  <li><label for="">Observaciones llantas </label>{{Form::textarea('observacionesLlantas', NULL, ['class'=>'form-control','style'=>"height: 100px;"])}}</li> <!-- sólo mostrarlo si la opción anterior es SI-->



                </ul>

              </div> <!-- FIN COL 3 -->

                

            </div><!-- FIN ROW -->





            <div class="row">

              <div class="col-md-12"><hr></div>

            </div><!-- FIN ROW -->



            <div class="row">

              <div class="col-md-12">

                <h2>Status</h2>

                <ul class="lista_radio_inline">

                  <li><label class="radio-inline">{{Form::radio('status', 'Recibido', true)}} Recibido</label></li>

                  <li><label class="radio-inline">{{Form::radio('status', 'Mecánica')}} Mecánica</label></li>

                  <li><label class="radio-inline">{{Form::radio('status', 'Hojalatería y pintura')}} Hojalatería y pintura</label></li>

                  <li><label class="radio-inline">{{Form::radio('status', 'Eléctrico')}} Eléctrico</label></li>

                  <li><label class="radio-inline">{{Form::radio('status', 'Listo')}} Listo</label></li>

                </ul>

              </div>

            </div>



            <div class="row">

              <div class="col-md-12">

                <h2>Observaciones generales</h2>

                <ul class="lista_radio_inline">

                  <li><label class="radio-inline">{{Form::radio('observacioneGenerales', 'Buen estado', true)}} Buen estado</label></li>

                  <li><label class="radio-inline">{{Form::radio('observacioneGenerales', 'Mal estado')}} Mal estado</label></li>

                  <li><label class="radio-inline">{{Form::radio('observacioneGenerales', 'Faltante')}} Faltante</label></li>

                  <li><label class="radio-inline">{{Form::radio('observacioneGenerales', 'Ver observación')}} Ver observación</label></li>                  

                </ul>

                {{Form::textarea('observaciones', NULL, ['class'=>'form-control','style'=>"height: 100px;"])}}

              </div>

            </div><!-- FIN ROW -->

            <div class="row">
              <div class="col-md-12">
                <h2>Acciones</h2>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-3">
                <a href="{{url('/admin/pdf/'.$producto->id)}}" class="btn btn-info btn-sm" alt="Descargar"><i class="fa fa-cloud-download"></i> Descargar PDF</a>
              </div>
              <div class="col-md-6">
                <div class="input-group" style="width: 100%;">
                  <input type="text" class="form-control" placeholder="mail@example.com" id="email-tags">
                  <button class="btn btn-info send-email-pro" id="{{$producto->id}}" type="button" style="margin-top: 10px;"><i class="fa fa-envelope"></i> Enviar</button>
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->
            </div>

            <div class="row">

              <div class="col-md-12">

                <hr>

                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>

              </div>

            </div>

           {{Form::close()}}