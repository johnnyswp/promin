<?php $__env->startSection('content'); ?>
<div class="content highlight no_margin_bot">

    <div class="container cart">
        <div class="row text-center">
            <div class="col-md-12">
                <h1 class="tipo_naranja"><i class="fa fa-check"></i> Confirma tu pedido</h1>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-4 col-md-offset-2">
                <input type="text" class="form-control custom_in" placeholder="* Nombre">
                <br>
                <input type="text" class="form-control custom_in" placeholder="* Teléfono">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control custom_in" placeholder="* Apellidos">
                <br>
                <input type="text" class="form-control custom_in" placeholder="* Email">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <label class="checkbox-inline tipo_sm skin-yellow">
                      <input type="checkbox" id="crear_cuenta" value="crear_cuenta" checked=""> Quiero crear mi cuenta y acepto el <a href="aviso-privacidad.php">Aviso de Privacidad</a> y los <a href="terminos-condiciones-uso.php">Términos y Condiciones de Uso</a>
                    </label>
                </div>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-12">
                  <a role="button" data-toggle="collapse" href="#datos_facturacion" aria-expanded="false" aria-controls="collapseExample" class="btn btn_infoextra btn-xs"><i class="fa fa-file-pdf-o"></i> Requiero factura</a> <!-- al hacer click en este check, se debe de autocompletar el domicilio con la información antes capturada, con opción a actualizarla y debe de verse en estado "checked"-->
                    <div class="collapse" id="datos_facturacion">
                        <div class="well">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Datos de Facturación</h3>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control custom_in" placeholder="* Nombre o Razón Social">
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control custom_in" placeholder="* R.F.C.">
                                    <br>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control custom_in" placeholder="* C.P.">
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom_in" placeholder="* Calle">
                                    <br>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control custom_in" placeholder="* No. Ext">
                                    <br>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control custom_in" placeholder="No. Int">
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom_in" placeholder="* Colonia">
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom_in" placeholder="* Delegación / Municipio">
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom_in" placeholder="* Estado">
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom_in" placeholder="* País"> <!-- por default México-->
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control custom_in" required="" placeholder="0"><!-- si llenan los datos de facturación se debe de capturar este campo, sólo aceptar números-->
                                    <p class="tipo_sm">Capture los 4 últimos dígitos de su tarjeta o los 18 dígitos de su CLABE.</p>
                                    <br>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                  <a role="button" data-toggle="collapse" href="#datos_envio" aria-expanded="false" aria-controls="collapseExample" class="btn btn_infoextra btn-xs"><i class="fa fa-truck"></i> Cotizar envío</a> <!-- al hacer click en este check, se debe de autocompletar el domicilio con la información antes capturada, con opción a actualizarla y debe de verse en estado "checked"-->
                    <div class="collapse" id="datos_envio">
                        <div class="well">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Domicilio de Envío</h3>
                                </div>
                                <div class="col-md-12">
                                    <label class="checkbox-inline">
                                      <input type="checkbox" id="dom_factura" value="dom_factura" checked=""> Usar domicilio de factura
                                    </label>
                                    <br><br>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control custom_in" placeholder="* C.P.">
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom_in" placeholder="* Calle">
                                    <br>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control custom_in" placeholder="* No. Ext">
                                    <br>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control custom_in" placeholder="No. Int">
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom_in" placeholder="* Colonia">
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom_in" placeholder="* Delegación / Municipio">
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom_in" placeholder="* Estado">
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom_in" placeholder="* País"> <!-- por default México-->
                                    <br>
                                </div>
                             </div>
                         </div>
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
                                <input type="text" value="1">
                                <a href="" class="a-more">+</a>
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="tipo_negra">$ <?php echo e(number_format($cart->total, 2, '.', ',')); ?></div>
                        </td>
                        <td class="text-center">
                            <a href="" class="pclose small tr-remove"><i class="custom-icon custom-icon-close-s"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td colspan="5" class="text-right"><div class="tipo_negra"><strong>Total: $ <?php echo e(Cart::total()); ?></strong></div></td>
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
                    <div class="cost">$ 2,000.00</div>
                </div>
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Total: $23,000.00</h3>
                <h2 class="tipo_naranja"><strong>Forma de Pago</strong></h2>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="forma_pago1" value="forma_pago" checked=""> Pago en Sucursal PROMIN
                </label>
                <br>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="forma_pago1" value="forma_pago"> Cheque bancario
                </label>
                <br>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="forma_pago1" value="forma_pago"> Transferencia electrónica
                </label>
                <br>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="forma_pago" value="forma_pago"> <img src="images/icono_paypal.png" alt="PayPal" width="119" height="31" class="m_pago">
                </label>
                <br>
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="forma_pago" value="forma_pago"> <img src="images/icono_conekta.png" alt="Conekta" width="119" height="25" class="m_pago">
                </label>
                <br><br>
                <a href="#" class="btn btn_checkout"><i class="fa fa-check"></i> <strong>Pagar</strong></a>
            </div>
        </div>

    
        
        
    </div>
    <!-- /.container -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>