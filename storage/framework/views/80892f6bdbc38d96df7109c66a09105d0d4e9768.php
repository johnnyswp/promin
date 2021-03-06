<?php $__env->startSection('content'); ?>
<style type="text/css" media="screen">
    .help-block {
    color: red!important;
    font-size: 10px;
    text-align: left;
    padding: 0;
    margin: 0;
}
</style>
<div class="content highlight no_margin_bot">
    <form action="/pago-seguro" id="pago" method="post" accept-charset="utf-8">
        
   <?php echo e(csrf_field()); ?>  
    <div class="container cart">
        <div class="row text-center">
            <div class="col-md-12">
                <h1 class="tipo_naranja"><i class="fa fa-check"></i> Confirma tu pedido</h1>
            </div>
        </div>
         <?php if(!Auth::check()): ?>
        <div class="row text-center">
            <div class="col-md-4 col-md-offset-2">
                <input name="nombre" type="text" class="form-control custom_in" placeholder="* Nombre">
                <?php if($errors->has('nombre')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('nombre')); ?></strong>
                    </span>
                <?php endif; ?>
                <br>
                <input name="telefono" type="text" class="form-control custom_in" placeholder="* Teléfono">
                <?php if($errors->has('telefono')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('telefono')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <input name="apellido" type="text" class="form-control custom_in" placeholder="* Apellidos">
                <?php if($errors->has('apellido')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('apellido')); ?></strong>
                    </span>
                <?php endif; ?>
                <br>
                <input name="email" type="text" class="form-control custom_in" placeholder="* Email">
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <label class="checkbox-inline tipo_sm skin-yellow">
                      <input type="checkbox"  name="crear_cuenta" value="1" checked="checked"> Quiero crear mi cuenta y acepto el <a href="/aviso-privacidad">Aviso de Privacidad</a> y los <a href="/terminos-condiciones-uso">Términos y Condiciones de Uso</a>
                    </label>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="row text-center">
            <div class="col-md-4 col-md-offset-2">
                <input type="text" name="nombre" value="<?php echo e(Auth::user()->name); ?>" class="form-control custom_in" placeholder="* Nombre">
                <?php if($errors->has('nombre')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('nombre')); ?></strong>
                    </span>
                <?php endif; ?>
                <br>
                <input type="text" name="telefono" value="<?php echo e(Auth::user()->telephone); ?>" class="form-control custom_in" placeholder="* Teléfono">
                <?php if($errors->has('telefono')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('telefono')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <input type="text" name="apellido" value="<?php echo e(Auth::user()->parental_name); ?>"  class="form-control custom_in" placeholder="* Apellidos">
                <?php if($errors->has('apellido')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('apellido')); ?></strong>
                    </span>
                <?php endif; ?>
                <br>
                <input type="text" name="email" value="<?php echo e(Auth::user()->email); ?>"  class="form-control custom_in" placeholder="* Email">
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="row text-center">
            <div class="col-md-12">
                    <a id="envio_" role="button" data-toggle="collapse" href="#datos_facturacion" aria-expanded="false" aria-controls="collapseExample" class="btn btn_infoextra btn-xs"><i class="fa fa-file-pdf-o"></i> Requiero factura</a> <!-- al hacer click en este check, se debe de autocompletar el domicilio con la información antes capturada, con opción a actualizarla y debe de verse en estado "checked"-->
                    <div class="collapse" id="datos_facturacion">
                        <?php if(!Auth::check()): ?>
                            <div class="well">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Datos de Facturación</h3>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="razon_social" class="form-control custom_in" placeholder="* Nombre o Razón Social">
                                    <?php if($errors->has('razon_social')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('razon_social')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="rfc" class="form-control custom_in" value="VECJ880326XXXX" placeholder="* R.F.C.">
                                    <?php if($errors->has('rfc')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('rfc')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="cp" class="form-control custom_in" placeholder="* C.P.">
                                    <?php if($errors->has('cp')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('cp')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="calle" class="form-control custom_in" placeholder="* Calle">
                                    <?php if($errors->has('calle')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('calle')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="n_ext" class="form-control custom_in" placeholder="* No. Ext">
                                    <?php if($errors->has('n_ext')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('n_ext')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="n_int" class="form-control custom_in" placeholder="No. Int">
                                    <?php if($errors->has('n_int')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('n_int')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="colonia" class="form-control custom_in" placeholder="* Colonia">
                                    <?php if($errors->has('colonia')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('colonia')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="municipio" class="form-control custom_in" placeholder="* Delegación / Municipio">
                                    <?php if($errors->has('municipio')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('municipio')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="estado" class="form-control custom_in" placeholder="* Estado">
                                    <?php if($errors->has('estado')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('estado')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="pais" class="form-control custom_in" placeholder="* País"> <!-- por default México-->
                                    <?php if($errors->has('pais')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('pais')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="last_num" class="form-control custom_in" required="" placeholder="0"><!-- si llenan los datos de facturación se debe de capturar este campo, sólo aceptar números-->
                                    <p class="tipo_sm">Capture los 4 últimos dígitos de su tarjeta o los 18 dígitos de su CLAVE.</p>
                                    <?php if($errors->has('last_num')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('last_num')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                             </div>
                         </div>
                        <?php else: ?>
                        <div class="well">
            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3>Datos de Facturación</h3>
                                                    <br>
                                                </div>
                                                <div class="col-md-4">

                                                    <?php echo e(Form::text('razon_social',Auth::user()->datoFacturacion->razon_social,['class'=>'form-control custom_in','placeholder'=>'* Nombre o Razón Social'])); ?>


                                                    <?php if($errors->has('razon_social')): ?>

                                                        <span class="help-block">

                                                            <strong><?php echo e($errors->first('razon_social')); ?></strong>

                                                        </span>

                                                    <?php endif; ?>

                                                    <br>

                                                </div>

                                                <div  class="col-md-4">

                                                    <?php echo e(Form::text('rfc',Auth::user()->datoFacturacion->rfc,['class'=>'form-control custom_in','placeholder'=>'* R.F.C'])); ?>


                                                    <?php if($errors->has('rfc')): ?>

                                                        <span class="help-block">

                                                            <strong><?php echo e($errors->first('rfc')); ?></strong>

                                                        </span>

                                                    <?php endif; ?>

                                                    <br>

                                                </div>

                                                <div class="col-md-2">

                                                    <?php echo e(Form::text('cp',Auth::user()->datoFacturacion->cp,['class'=>'form-control custom_in','placeholder'=>'* C.P.'])); ?>


 

                                                    <?php if($errors->has('cp')): ?>

                                                        <span class="help-block">

                                                            <strong><?php echo e($errors->first('cp')); ?></strong>

                                                        </span>

                                                    <?php endif; ?>

                                                    <br>

                                                </div>

                                                <div class="col-md-6">

                                                    <?php echo e(Form::text('calle',Auth::user()->datoFacturacion->calle,['class'=>'form-control custom_in','placeholder'=>'* Calle'])); ?>


                                                    <?php if($errors->has('calle')): ?>

                                                        <span class="help-block">

                                                            <strong><?php echo e($errors->first('calle')); ?></strong>

                                                        </span>

                                                    <?php endif; ?>

                                                    <br>

                                                </div>

                                                <div class="col-md-2">

                                                     

                                                    <?php echo e(Form::text('n_ext',Auth::user()->datoFacturacion->n_ext,['class'=>'form-control custom_in','placeholder'=>'*  No. Ext'])); ?>


                                                    <?php if($errors->has('n_ext')): ?>

                                                        <span class="help-block">

                                                            <strong><?php echo e($errors->first('n_ext')); ?></strong>

                                                        </span>

                                                    <?php endif; ?>

                                                    <br>

                                                </div>

                                                <div class="col-md-2">



                                                    <?php echo e(Form::text('n_int',Auth::user()->datoFacturacion->n_int,['class'=>'form-control custom_in','placeholder'=>'No. Int'])); ?>


                                                    <?php if($errors->has('n_int')): ?>

                                                        <span class="help-block">

                                                            <strong><?php echo e($errors->first('n_int')); ?></strong>

                                                        </span>

                                                    <?php endif; ?>

                                                    <br>

                                                </div>

                                                <div class="col-md-6">

                                                     <?php echo e(Form::text('colonia',Auth::user()->datoFacturacion->colonia,['class'=>'form-control custom_in','placeholder'=>'*  Colonia'])); ?>




                                                    <?php if($errors->has('colonia')): ?>

                                                        <span class="help-block">

                                                            <strong><?php echo e($errors->first('colonia')); ?></strong>

                                                        </span>

                                                    <?php endif; ?>

                                                    <br>

                                                </div>

                                                <div class="col-md-6">



                                                     <?php echo e(Form::text('municipio',Auth::user()->datoFacturacion->municipio,['class'=>'form-control custom_in','placeholder'=>'*  Delegación / Municipio'])); ?>




                                                    <?php if($errors->has('municipio')): ?>

                                                        <span class="help-block">

                                                            <strong><?php echo e($errors->first('municipio')); ?></strong>

                                                        </span>

                                                    <?php endif; ?>

                                                    <br>

                                                </div>

                                                <div class="col-md-6">

                                                    <?php echo e(Form::text('estado',Auth::user()->datoFacturacion->estado,['class'=>'form-control custom_in','placeholder'=>'*  Estado'])); ?>


                                                    <?php if($errors->has('estado')): ?>

                                                        <span class="help-block">

                                                            <strong><?php echo e($errors->first('estado')); ?></strong>

                                                        </span>

                                                    <?php endif; ?>

                                                    <br>

                                                </div>

                                                <div class="col-md-6">

                                                    <?php echo e(Form::text('pais',Auth::user()->datoFacturacion->pais,['class'=>'form-control custom_in','placeholder'=>'*  País'])); ?>


                                                    <!-- por default México-->



                                                    <?php if($errors->has('pais')): ?>

                                                        <span class="help-block">

                                                            <strong><?php echo e($errors->first('pais')); ?></strong>

                                                        </span>

                                                    <?php endif; ?>

                                                    <br>

                                                </div>

                                             </div>

                                         </div>
                        <?php endif; ?>
                    </div>
            </div>
            <div class="row">
                <hr>
            </div>
            <div class="col-md-12">
                    <br>
                    <h1 class="tipo_naranja"><i class="fa fa-truck"></i> Envío</h1>
                    <br>
                    <label for=""><input type="radio" value="Redpack" checked=""> <img src="/assets/images/redpack.png" alt="" width="150" height="61" class="img_redpack"></label>
                    <br>
                    <br>
                    <a id="factura_" role="button" data-toggle="collapse" href="#datos_envio" aria-expanded="false" aria-controls="collapseExample" class="btn btn_infoextra btn-xs"><i class="fa fa-truck"></i> Cotizar envío</a> <!-- al hacer click en este check, se debe de autocompletar el domicilio con la información antes capturada, con opción a actualizarla y debe de verse en estado "checked"-->
                    <div class="collapse" id="datos_envio">
                        <?php if(!Auth::check()): ?>
                            <div class="well">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Domicilio de Envío</h3>
                                </div>
                                <div class="col-md-12">
                                    <label class="checkbox-inline">
                                      <input type="checkbox" id="dom_factura" value="dom_factura"> Usar domicilio de factura
                                    </label>
                                    <br><br>
                                </div>
                                <div class="col-md-2">
                                    <input name="cp_2"  type="text" class="form-control custom_in" placeholder="* C.P.">
                                    <?php if($errors->has('cp_2')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('cp_2')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input name="calle_2"  type="text" class="form-control custom_in" placeholder="* Calle">
                                    <?php if($errors->has('calle_2')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('calle_2')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-2">
                                    <input name="n_ext_2"  type="text" class="form-control custom_in" placeholder="* No. Ext">
                                    <?php if($errors->has('n_ext_2')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('n_ext_2')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-2">
                                    <input name="n_int_2"  type="text" class="form-control custom_in" placeholder="No. Int">
                                    <?php if($errors->has('n_int_2')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('n_int_2')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input name="colonia_2"  type="text" class="form-control custom_in" placeholder="* Colonia">
                                    <?php if($errors->has('colonia_2')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('colonia_2')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input name="municipio_2"  type="text" class="form-control custom_in" placeholder="* Delegación / Municipio">
                                    <?php if($errors->has('municipio_2')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('municipio_2')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input name="estado_2"  type="text" class="form-control custom_in" placeholder="* Estado">
                                    <?php if($errors->has('estado_2')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('estado_2')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input name="pais_2"  type="text" class="form-control custom_in" placeholder="* País"> <!-- por default México-->
                                    <?php if($errors->has('pais_2')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('pais_2')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                    <br>
                                </div>
                             </div>
                         </div> 
                        <?php else: ?>
                         <div class="well">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3>Domicilio de Envío</h3>
                                                    </div>
                                                    <div class="col-md-12">

                                                        <label class="checkbox-inline">
                                                    <?php if(Auth::user()->datoEnvio->activo==1): ?>
                                                    <?php echo e(Form::checkbox('activo', '1', true,['id'=>'dom_factura'])); ?>

                                                    <?php else: ?>
                                                    <?php echo e(Form::checkbox('activo', '1', false,['id'=>'dom_factura'])); ?>

                                                    <?php endif; ?>
                                                           Usar domicilio de factura

                                                        </label>

                                                        <br><br>

                                                    </div>

                                                    <div class="col-md-2">

                                                        <?php echo e(Form::text('cp_2',Auth::user()->datoEnvio->cp,['class'=>'form-control custom_in','placeholder'=>'*  C.P.'])); ?>




                                                        <?php if($errors->has('cp_2')): ?>

                                                            <span class="help-block">

                                                                <strong><?php echo e($errors->first('cp_2')); ?></strong>

                                                            </span>

                                                        <?php endif; ?>

                                                        <br>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <?php echo e(Form::text('calle_2',Auth::user()->datoEnvio->calle,['class'=>'form-control custom_in','placeholder'=>'*  Calle'])); ?>




                                                        <?php if($errors->has('calle_2')): ?>

                                                            <span class="help-block">

                                                                <strong><?php echo e($errors->first('calle_2')); ?></strong>

                                                            </span>

                                                        <?php endif; ?>

                                                        <br>

                                                    </div>

                                                    <div class="col-md-2">

                                                        <?php echo e(Form::text('n_ext_2',Auth::user()->datoEnvio->n_ext,['class'=>'form-control custom_in','placeholder'=>'*  No. Ext'])); ?>




                                                        <?php if($errors->has('n_ext_2')): ?>

                                                            <span class="help-block">

                                                                <strong><?php echo e($errors->first('n_ext_2')); ?></strong>

                                                            </span>

                                                        <?php endif; ?>

                                                        <br>

                                                    </div>

                                                    <div class="col-md-2">

                                                        <?php echo e(Form::text('n_int_2',Auth::user()->datoEnvio->n_int,['class'=>'form-control custom_in','placeholder'=>'No. Int'])); ?>




                                                        <?php if($errors->has('n_int_2')): ?>

                                                            <span class="help-block">

                                                                <strong><?php echo e($errors->first('n_int_2')); ?></strong>

                                                            </span>

                                                        <?php endif; ?>

                                                        <br>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <?php echo e(Form::text('colonia_2',Auth::user()->datoEnvio->colonia,['class'=>'form-control custom_in','placeholder'=>'*  Colonia'])); ?>




                                                        <?php if($errors->has('colonia_2')): ?>

                                                            <span class="help-block">

                                                                <strong><?php echo e($errors->first('colonia_2')); ?></strong>

                                                            </span>

                                                        <?php endif; ?>

                                                        <br>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <?php echo e(Form::text('municipio_2',Auth::user()->datoEnvio->municipio,['class'=>'form-control custom_in','placeholder'=>'*  Delegación / Municipio'])); ?>




                                                        <?php if($errors->has('municipio_2')): ?>

                                                            <span class="help-block">

                                                                <strong><?php echo e($errors->first('municipio_2')); ?></strong>

                                                            </span>

                                                        <?php endif; ?>

                                                        <br>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <?php echo e(Form::text('estado_2',Auth::user()->datoEnvio->estado,['class'=>'form-control custom_in','placeholder'=>'*  Estado'])); ?>




                                                        <?php if($errors->has('estado_2')): ?>

                                                            <span class="help-block">

                                                                <strong><?php echo e($errors->first('estado_2')); ?></strong>

                                                            </span>

                                                        <?php endif; ?>

                                                        <br>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <?php echo e(Form::text('pais_2',Auth::user()->datoEnvio->pais,['class'=>'form-control custom_in','placeholder'=>'*  País'])); ?>




                                                        <?php if($errors->has('pais_2')): ?>

                                                            <span class="help-block">

                                                                <strong><?php echo e($errors->first('pais_2')); ?></strong>

                                                            </span>

                                                        <?php endif; ?>

                                                        <br>

                                                    </div>

                                                 </div>

                                             </div>
                        <?php endif; ?>                        
                    </div>
            </div>
        </div>
 
        <div class="row">
            <hr>
        </div>

        <div class="row text-center">
            <div class="col-md-12">
                <h1 class="tipo_naranja">Resumen de Pedido</h1>
                <br>
            </div>
        </div>

        <div class="table-responsive">
            <table class="cart-table border-bottom">
                <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center">
                            <img src="<?php echo e($cart->options->img); ?>" alt="<?php echo e($cart->name); ?>" class="img-responsive" width="120">
                        </td>
                        <td class="td-descr tipo_negra">
                            <?php echo e($cart->name); ?>

                        </td>
                        <td class="text-right">
                            <div class="tipo_negra">$ <?php echo e(number_format($cart->price, 2, '.', ',')); ?></div>
                        </td>
                        <td>
                            <div class="counting inline-block">
                                <a href="" class="a-less disabled">-</a>
                                <input type="text" value="<?php echo e($cart->qty); ?>">
                                <a href="" class="a-more">+</a>
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="tipo_negra">$ <?php echo e(number_format($cart->subtotal, 2, '.', ',')); ?></div>
                        </td>
                        <td class="text-center">
                            <a href="" class="pclose small tr-remove"><i class="custom-icon custom-icon-close-s"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td colspan="5" class="text-right"><div class="tipo_negra"><strong>Total: $ <?php echo e(Cart::subtotal()); ?></strong></div></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right"><div class="tipo_azul"><strong><i class="fa fa-truck"></i> Costo de Envío: $500.00</strong></div></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right"><div class="tipo_naranja"><strong>Total: $<?php echo e(Cart::total()); ?></strong></div></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /table -->
        
        <!-- Productos Relacionados -->
        <div class="container slider related text-center" id="slider-0">
            <div class="row">
                <div class="page-header col-sm-8 col-sm-offset-2">
                    <h2>Productos Relacionados</h2>
                </div>
            </div>
            <div class="row text-center">
            
                <div class="col-md-3 col-sm-6 citem">
                    <div class="cimg">
                        <a href="producto.php" class="aimg" title="$NombreProducto $Modelo $Marca"><img src="/assets/images/img_producto_demo_4.jpg" alt="$NombreProducto $Marca $Modelo"></a>
                        <a href="" class="btn btn-primary add-cart"><i class="fa fa-shopping-cart"></i> Agregar</a>
                        <a href="" class="btn btn2"><i class="fa fa-heart corazon"></i></a>
                    </div>
                    <h5>
                        <a href="producto.php" class="black" title="$NombreProducto $Modelo $Marca">Bomba de Concreto</a>
                        <small>KCP37ZX5170</small>
                    </h5>
                    <div class="cost">$ <?php echo e(Cart::total()); ?></div>
                </div>
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Total: $<?php echo e(Cart::total()); ?></h3>
                <h2 class="tipo_naranja"><strong>Forma de Pago</strong></h2>
                <label class="radio-inline">
                    <input type="radio" id="forma_pago1" value="pago_sucursal" name="forma_pago" checked=""> Pago en Sucursal PROMIN
                </label>
                <br>
                <label class="radio-inline">
                    <input type="radio" id="forma_pago1" value="pago_cheque" name="forma_pago"> Cheque bancario
                </label>
                <br>
                <label class="radio-inline">
                    <input type="radio" id="forma_pago1" value="pago_transferencia" name="forma_pago"> Transferencia electrónica
                </label>
                <br>
                <label class="radio-inline">
                    <input type="radio" id="forma_pago" value="pago_paypal" name="forma_pago"> <img src="/assets/images/icono_paypal.png" alt="PayPal" width="119" height="31" class="m_pago">
                </label>
                <br>
                <label class="radio-inline">
                    <input type="radio" id="forma_pago" value="pago_conekta" name="forma_pago"> <img src="/assets/images/icono_conekta.png" alt="Conekta" width="119" height="25" class="m_pago">
                </label>
                <br><br>

                <button type="submit" name="enviar" id="btn-pago" class="btn btn_checkout">
                    <i class="fa fa-check"></i> <strong>Pagar</strong>

                </button>
            </div>
        </div>
    </div>
    </form>
    <!-- /.container -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-script'); ?>
<script>
    $(document).ready(function() {
        $("#btn-pago").click(function() {
            var pago = $('input:radio:checked').val();            
            if(pago=="")
            $('#pago').submit();
        });

        $('#dom_factura').on('click', function(){
            if($(this).prop('checked')){
                $('input[name=cp_2]').val($('input[name=cp]').val());
                $('input[name=calle_2]').val($('input[name=calle]').val());
                $('input[name=n_ext_2]').val($('input[name=n_ext]').val());
                $('input[name=n_int_2]').val($('input[name=n_int]').val());
                $('input[name=colonia_2]').val($('input[name=colonia]').val());
                $('input[name=municipio_2]').val($('input[name=municipio]').val());
                $('input[name=estado_2]').val($('input[name=estado]').val());
                $('input[name=pais_2]').val($('input[name=pais]').val());
            }else{
                $('input[name=cp_2]').val('');
                $('input[name=calle_2]').val('');
                $('input[name=n_ext_2]').val('');
                $('input[name=n_int_2]').val('');
                $('input[name=colonia_2]').val('');
                $('input[name=municipio_2]').val('');
                $('input[name=estado_2]').val('');
                $('input[name=pais_2]').val('');
            }
        });

        <?php if($message = Session::get('open')): ?>
            $('#envio_').click();
            $('#factura_').click();
             <?php Session::forget('open'); ?>
        <?php endif; ?>

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>