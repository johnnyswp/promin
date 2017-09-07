<div class="row">

              <div class="col-md-12"><h2>Ubicación</h2></div>

            </div> <!-- FIN ROW -->

            

            <div class="row">

<?php echo e(Form::model($producto, ['route' => ['productos-unidades.save', $producto->id],'files' => true, 'method' => 'POST'])); ?>

<input type="hidden" name="type" value="unidades">

<div class="row">

  <div class="col-md-6">

    <div class="form-group">

      <label class="control-label col-md-4">Línea de negocio</label>

      <div class="col-md-8">

        <?php echo e(Form::select('linea_negocio_id', $lineas, '', ['class'=>'form-control', 'id'=>'linea'])); ?>

        <?php if($errors->has('linea_negocio_id')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('linea_negocio_id')); ?></strong>
          </span>
        <?php endif; ?>
      </div>

    </div>

  </div>

  

  <div class="col-md-6">

    <div class="form-group">

      <label class="control-label col-md-4">Tipo de Producto</label>

      <div class="col-md-8"  id="tipos-data">

        <?php echo e(Form::select('tipo_producto_id', $tipos, '', ['class'=>'form-control', 'id'=>'tipos'])); ?>

        <?php if($errors->has('tipo_producto_id')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('tipo_producto_id')); ?></strong>
          </span>
        <?php endif; ?>
      </div>

    </div>

  </div>

</div> <!-- FIN ROW -->





<div class="row">

  

  <div class="col-md-6">

    <div class="form-group">

      <label class="control-label col-md-4">Marca</label>

      <div class="col-md-8" id="marcas-data">
         <?php echo e(Form::select('marcas_id', $marcas, '', ['class'=>'form-control', 'id'=>'marcas'])); ?>

         <?php if($errors->has('marcas_id')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('marcas_id')); ?></strong>
          </span>
        <?php endif; ?>
      </div>

    </div>

  </div>



  <div class="col-md-6">

    <div class="form-group">

      <label class="control-label col-md-4">Modelo</label>

      <div class="col-md-8" id="modelos-data">
        <?php echo e(Form::select('modelo_id', $modelos, '', ['class'=>'form-control', 'id'=>'modelos'])); ?>

        <?php if($errors->has('modelo_id')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('modelo_id')); ?></strong>
          </span>
        <?php endif; ?>
      </div>

    </div>

  </div>

            

            </div> <!-- FIN ROW -->

            

            <div class="row">

              <div class="col-md-6">

                <div class="form-group">

                  <label class="control-label col-md-4">Código</label>

                    <div class="col-md-8">

                      <?php echo e(Form::text('codigo', NULL, ['class'=>'form-control'])); ?> <!-- este campo es forzoso para guardar el registro -->
                      <?php if($errors->has('codigo')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('codigo')); ?></strong>
                        </span>
                      <?php endif; ?>
                  </div>

                </div>

              </div>

            </div> <!-- FIN ROW -->



            <div class="row">

              <div class="col-md-12"><hr></div>

            </div> <!-- FIN ROW -->



            <div class="row">

              <div class="col-md-12"><h2>Identificación</h2></div>

            </div> <!-- FIN ROW -->



            <div class="row">

              <div class="col-md-6">

                <label for="">Serie </label><?php echo e(Form::text('serie', NULL, ['class'=>'form-control'])); ?>

                <?php if($errors->has('serie')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('serie')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>

              <div class="col-md-6">

                <label for="">No. de Factura de Compra </label><?php echo e(Form::text('nFact', NULL, ['class'=>'form-control'])); ?>

                <?php if($errors->has('nFact')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('nFact')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>

            </div> <!-- FIN ROW -->



            <div class="row">

              <div class="col-md-3">

                <label for="">Año </label><?php echo e(Form::text('ano', NULL, ['class'=>'form-control'])); ?>

                <?php if($errors->has('ano')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('ano')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>

              <div class="col-md-3">

                <label for="">Motor </label><?php echo e(Form::text('motor', NULL, ['class'=>'form-control'])); ?>

                <?php if($errors->has('motor')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('motor')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>

              <div class="col-md-3">

                <label for="">Combustible </label><?php echo e(Form::text('combustible', NULL, ['class'=>'form-control'])); ?>

                <?php if($errors->has('combustible')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('combustible')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>

              <div class="col-md-3">

                <label for="">Horómetro </label><?php echo e(Form::text('horometro', NULL, ['class'=>'form-control'])); ?>

                <?php if($errors->has('horometro')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('horometro')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>

              <div class="col-md-6">

                <label for="">Link de ficha técnica </label><?php echo e(Form::text('ficha', NULL, ['class'=>'form-control','placeholder'=>'http://www.pagina.com'])); ?>

                <?php if($errors->has('ficha')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('ficha')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>

              <div class="col-md-3">

                <label for="">Asesor </label>

                <?php echo e(Form::select('asesor_id', $accesos, NULL, ['class'=>'form-control', 'id'=>'ase'])); ?>

                <?php if($errors->has('asesor_id')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('asesor_id')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>

            </div> <!-- FIN ROW -->



            <div class="row">

              <div class="col-md-12"><hr></div>

            </div> <!-- FIN ROW -->



            <div class="row">

  <div class="col-md-12">

    <h2>Galería</h2>

    <span>Tamaño recomendado: ancho 800px y alto 533px.</span>

    <span><br>Peso sugerido: 90Kb</span>

    <input id="fileUpload" type="file" name="galeria" multiple>
    <?php if($errors->has('galeria')): ?>
      <span class="help-block">
           <strong><?php echo e($errors->first('galeria')); ?></strong>
       </span>
    <?php endif; ?>
  </div>

</div> <!-- FIN ROW -->



<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  
<div class="row">
  <div class="col-md-6">
    <label for="">Link de Video</label>
    <?php echo e(Form::text('link_video', NULL, ['class'=>'form-control','placeholder'=>'https://www.youtube.com/embed/w40XNaTJURE', 'id'=>'link_video'])); ?>

    <?php if($errors->has('link_video')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('link_video')); ?></strong>
      </span>
    <?php endif; ?>
    <small>Preview</small>
    <div style="position:relative;height:0;padding-bottom:56.25%; border: 1px solid white;"><iframe id="preview_video" src="<?php echo e($producto->link_video); ?>" width="640" height="360" frameborder="0" allowfullscreen style="position:absolute;width:100%;height:100%;left:0;"></iframe></div>
  </div>
</div>

<div class="row">

  <div class="col-md-12">

    <div class="drag" id="image-holder">
    <?php $__currentLoopData = $imgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <img rel="<?php echo e($img->id); ?>" src="<?php echo e($img->picture); ?>" class="img-thumbnail <?php if($img->video!= 1): ?> delete <?php endif; ?>" id="<?php echo e($img->id); ?>" width="150">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

  </div>

</div>  <!-- FIN ROW -->



            <div class="row">

              <div class="col-md-12"><hr></div>

            </div> <!-- FIN ROW -->



            <div class="row">

              <div class="col-md-12"><h2>Oferta</h2></div>

            </div> <!-- FIN ROW -->



            <div class="row">

              <div class="col-md-3">

                <label for="">Precio Venta </label><?php echo e(Form::text('priceVenta', NULL, ['class'=>'form-control','placeholder'=>'$0.00'])); ?>

                <?php if($errors->has('priceVenta')): ?>
                  <span class="help-block">
                       <strong><?php echo e($errors->first('priceVenta')); ?></strong>
                   </span>
                <?php endif; ?>
              </div>

            </div> <!-- FIN ROW -->



            <div class="row">

              <div class="col-md-12">

                <label for="">Descripción </label><?php echo e(Form::textarea('descripcion', NULL, ['class'=>'form-control','style'=>"height: 100px;", 'maxlength'=>'160'])); ?>

                <?php if($errors->has('descripcion')): ?>
                  <span class="help-block">
                       <strong><?php echo e($errors->first('descripcion')); ?></strong>
                   </span>
                <?php endif; ?>
              </div>

            </div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-6">

    <label for="">Link MercadoLibre </label><?php echo e(Form::text('linkMercadoLibre', NULL, ['class'=>'form-control'])); ?>

    <?php if($errors->has('linkMercadoLibre')): ?>
      <span class="help-block">
           <strong><?php echo e($errors->first('linkMercadoLibre')); ?></strong>
       </span>
    <?php endif; ?>

  </div>

  <div class="col-md-6">

    <label for="">Link Machinery Trader </label><?php echo e(Form::text('LinkMachineryTrader', NULL, ['class'=>'form-control'])); ?>

    <?php if($errors->has('LinkMachineryTrader')): ?>
      <span class="help-block">
           <strong><?php echo e($errors->first('LinkMachineryTrader')); ?></strong>
       </span>
    <?php endif; ?>
  </div>

</div> <!-- FIN ROW -->



            <div class="row">

              <div class="col-md-12"><hr></div>

            </div> <!-- FIN ROW -->



            <div class="row">

               <div class="col-md-12"><h2>Stock</h2></div>

            </div> <!-- FIN ROW -->



            <div class="row">

              <div class="col-md-3">

                <label for="">Cantidad inicial de piezas</label><?php echo e(Form::text('cantidad', NULL, ['class'=>'form-control'])); ?>

                <?php if($errors->has('cantidad')): ?>
                  <span class="help-block">
                       <strong><?php echo e($errors->first('cantidad')); ?></strong>
                   </span>
                <?php endif; ?>

              </div>

              <div class="col-md-3">

                <label for="">Mínimo de piezas</label><?php echo e(Form::text('minimo', NULL, ['class'=>'form-control'])); ?>

                <?php if($errors->has('minimo')): ?>
                  <span class="help-block">
                       <strong><?php echo e($errors->first('minimo')); ?></strong>
                   </span>
                <?php endif; ?>
              </div>

            </div> <!-- FIN ROW -->



            <div class="row">

              <div class="col-md-12"><hr></div>

            </div> <!-- FIN ROW -->



<div class="row">

   <div class="col-md-12"><h2>Medidas y peso</h2></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-3">

    <label for="">Alto en cms</label><?php echo e(Form::text('alto', NULL, ['class'=>'form-control'])); ?>

    <?php if($errors->has('alto')): ?>
      <span class="help-block">
           <strong><?php echo e($errors->first('alto')); ?></strong>
       </span>
    <?php endif; ?>
  </div>

  <div class="col-md-3">

    <label for="">Largo en cms</label><?php echo e(Form::text('largo', NULL, ['class'=>'form-control'])); ?>

    <?php if($errors->has('largo')): ?>
      <span class="help-block">
           <strong><?php echo e($errors->first('largo')); ?></strong>
       </span>
    <?php endif; ?>
  </div>

  <div class="col-md-3">

    <label for="">Ancho en cms</label><?php echo e(Form::text('ancho', NULL, ['class'=>'form-control'])); ?>

    <?php if($errors->has('ancho')): ?>
      <span class="help-block">
           <strong><?php echo e($errors->first('ancho')); ?></strong>
       </span>
    <?php endif; ?>
  </div>

  <div class="col-md-3">

    <label for="">Peso en kgs</label><?php echo e(Form::text('peso', NULL, ['class'=>'form-control'])); ?>

    <?php if($errors->has('peso')): ?>
      <span class="help-block">
           <strong><?php echo e($errors->first('peso')); ?></strong>
       </span>
    <?php endif; ?>
  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW -->



<div class="row">

   <div class="col-md-12"><h2>Búsqueda</h2></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12">

    <label for="">Palabras clave. Puedes usar sinónimos o términos relacionados al producto, seperándolos con comas.</label><?php echo e(Form::textarea('keywork', NULL, ['class'=>'form-control','placeholder'=>'Ejemplo: excavadora, escabadora, escavadora','style'=>"height: 100px;", 'maxlength'=>'160'])); ?>

    <?php if($errors->has('keywork')): ?>
      <span class="help-block">
           <strong><?php echo e($errors->first('keywork')); ?></strong>
       </span>
    <?php endif; ?>
  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-6">

    <h2>¿Se publica en PROMIN.mx?</h2>

    <ul class="lista_radio_inline">

      <li><label class="radio-inline"><?php echo e(Form::radio('state', 'public')); ?> Si</label></li>

      <li><label class="radio-inline"><?php echo e(Form::radio('state', 'hidden')); ?> No</label></li>

    </ul>
    <?php if($errors->has('state')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('state')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

  <div class="col-md-6">
    <h2>¿Es producto destacado?</h2>
    <ul class="lista_radio_inline">
      <li><label class="radio-inline"><?php echo e(Form::radio('destacado', '1')); ?> Si</label></li>
      <li><label class="radio-inline"><?php echo e(Form::radio('destacado', '0')); ?> No</label></li>
    </ul>
    <?php if($errors->has('destacado')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('destacado')); ?></strong>
      </span>
    <?php endif; ?>
  </div>
</div> <!-- FIN ROW -->

<div class="row">

  <div class="col-md-12">

    <hr>

    <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>

  </div>

</div>

<?php echo e(Form::close()); ?>

