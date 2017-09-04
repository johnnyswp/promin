<div class="content highlight no_margin_bot">



        <div class="container cart">

            <div class="row">

                <div class="col-md-12">

                    <h1>¡Bienvenido  <?php echo e(Auth::user()->name); ?>!</h1>
                    <code>
                       
                    </code>
                </div>


                <div class="col-md-12">
                        <?php if(session()->has('envioF')): ?>
                            <?php if(session()->get('envioF')==0): ?>
                             <div class="alert alert-danger">
                                <ul>
                                    <li>Errores en los Datos de Facturación</li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if(session()->has('envioD')): ?>
                            <?php if(session()->get('envioD')==0): ?>
                             <div class="alert alert-danger">
                                <ul>
                                    <li>Errores en los Datos de Envió</li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        <?php endif; ?>
                </div>

            </div>

          

            <div class="row">

                
                <div class="col-md-12">

                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active"><a href="#mi_perfil" aria-controls="mi_perfil" role="tab" data-toggle="tab" class="tabuser"><span><i class="fa fa-user"></i> Mi perfil</span></a></li>
                        <li role="presentation" ><a href="#wishlist" aria-controls="wishlist" role="tab" data-toggle="tab" class="tabuser open"><span><i class="fa fa-heart"></i> Wishlist</span></a></li>
                        <li role="presentation"><a href="#pedidos" aria-controls="pedidos" role="tab" data-toggle="tab" class="tabuser"><span><i class="fa fa-list-alt"></i> Mis pedidos</span></a></li>

                        <li role="presentation"><a href="#compras" aria-controls="compras" role="tab" data-toggle="tab" class="tabuser"><span><i class="fa fa-check"></i> Mis compras</span></a></li>

                    </ul>

                    <div class="tab-content bg_tabs_user">
                            

                        <div role="tabpanel" class="tab-pane fade in active" id="mi_perfil">
                            <form method="post" action="/update/edit_profile">

                            <?php echo e(csrf_field()); ?>


                            <input type="hidden" name="factura_id" value="<?php if(Auth::user()->datoFacturacion): ?><?php echo e(Auth::user()->datoFacturacion->id); ?> <?php else: ?><?php echo e('0'); ?><?php endif; ?>">

                            <input type="hidden" name="envio_id" value="<?php if(Auth::user()->datoEnvio): ?><?php echo e(Auth::user()->datoEnvio->id); ?> <?php else: ?><?php echo e('0'); ?><?php endif; ?>">                
                            <div class="row" style="margin: 0">

                              

                                <div class="col-md-3">

                                    <br>

                                    <h3>Mis datos</h3>

                                    <img id="profileImg" src="<?php echo e(Auth::user()->picture); ?>" class="avatar_login img-circle">

                                    <input type="file"  onchange="promin.readURL(this);">

                                    <br>

                                    <input type="hidden" id="picture" name="picture">
                                    <input type="hidden" id="dEnvio" name="dEnvio" value="0">
                                    <input type="hidden" id="dFacturacion" name="dFacturacion" value="0">


                                    <?php echo e(Form::text('name',Auth::user()->name,['class'=>'form-control custom_in','placeholder'=>'* Nombre'])); ?>




                                    <?php if($errors->has('name')): ?>

                                        <span class="help-block">

                                            <strong><?php echo e($errors->first('name')); ?></strong>

                                        </span>

                                    <?php endif; ?>

                                    <br>

                                    

                                    <?php echo e(Form::text('last_name',Auth::user()->last_name,['class'=>'form-control custom_in','placeholder'=>'* Apellido Paterno'])); ?>


                                    



                                    <?php if($errors->has('last_name')): ?>

                                        <span class="help-block">

                                            <strong><?php echo e($errors->first('last_name')); ?></strong>

                                        </span>

                                    <?php endif; ?>

                                    <br>

                                     

                                    <?php echo e(Form::text('parental_name',Auth::user()->parental_name,['class'=>'form-control custom_in','placeholder'=>'* Apellido Materno'])); ?>




                                    <?php if($errors->has('parental_name')): ?>

                                        <span class="help-block">

                                            <strong><?php echo e($errors->first('parental_name')); ?></strong>

                                        </span>

                                    <?php endif; ?>

                                    <br>

                                    <?php echo e(Form::text('telephone',Auth::user()->telephone,['class'=>'form-control custom_in','placeholder'=>'* Teléfono'])); ?>


                                    <?php if($errors->has('telephone')): ?>

                                        <span class="help-block">

                                            <strong><?php echo e($errors->first('telephone')); ?></strong>

                                        </span>

                                    <?php endif; ?>

                                </div>



                                <div class="col-md-3 col-md-offset-2 <?php if(Auth::user()->tipo_user!='email'): ?> hide <?php endif; ?>" >

                                    <br>

                                    <h3>Actualizar contraseña</h3>

                                    

                                    <?php echo e(Form::password('password',NULL,['class'=>'form-control custom_in','placeholder'=>'* password'])); ?>


                                    <?php if($errors->has('password')): ?>

                                        <span class="help-block">

                                            <strong><?php echo e($errors->first('password')); ?></strong>

                                        </span>

                                    <?php endif; ?>

                                    <br><br>

                                     



                                    <?php echo e(Form::password('password_confirmation',NULL,['class'=>'form-control custom_in','placeholder'=>'* password'])); ?>


                                    <?php if($errors->has('password_confirmation')): ?>

                                        <span class="help-block">

                                            <strong><?php echo e($errors->first('password_confirmation')); ?></strong>

                                        </span>

                                    <?php endif; ?>

                                </div>

                            

                                <div class="col-md-12">

                                    <a role="button" id="btn_dFacturacion" data-toggle="collapse" href="#datos_facturacion" aria-expanded="false" aria-controls="collapseExample" class="btn btn_infoextra2 btn-xs"><i class="fa fa-file-pdf-o"></i> Datos de Facturación</a> <!-- al hacer click en este check, se debe de autocompletar el domicilio con la información antes capturada, con opción a actualizarla y debe de verse en estado "checked"-->

                                    <div class="collapse" id="datos_facturacion">

                                        <div class="well">

                                            <div class="row">

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

                                    </div>

                                    <a id="btn_dEnvio" role="button" data-toggle="collapse" href="#datos_envio" aria-expanded="false" aria-controls="collapseExample" class="btn btn_infoextra2 btn-xs"><i class="fa fa-truck"></i> Datos de Envío</a> <!-- al hacer click en este check, se debe de autocompletar el domicilio con la información antes capturada, con opción a actualizarla y debe de verse en estado "checked"-->

                                        <div class="collapse" id="datos_envio">

                                            <div class="well">                                            

                                                <div class="row">

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

                                        </div>

                                </div>

                            

                                <div class="row">

                                    <div class="col-md-12 text-right">

                                        <br>

                                        <span class="msj_success hide"><i class="fa fa-check"></i> Tu información se ha actualizado</span>

                                        <br><br>

                                        <button type="submit" id="saveFormProfile2" class="btn btn_checkout"><i class="fa fa-floppy-o"></i> Guardar</button>

                                        <br><br>              

                                    </div>

                                </div>

                            </div>
                            </form>
                        </div>
                    
                    <!-- FIN MI PERFIL-->
                    <div role="tabpanel" class="tab-pane fade" id="wishlist">
                        <div class="row">
                        <div class="col-md-12">
                          <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Fecha</th>
                                  <th style="width: 100px">Imagen</th>
                                  <th>Descripción</th>
                                  <th class="text-right">Precio Unitario</th>
                                  <th class="text-center">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                 <?php $__currentLoopData = $whishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id='wish<?php echo e($w->id); ?>'>
                                  <td><?php echo e(Carbon\Carbon::parse($w->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($w->created_at)->format('m')).'-'.Carbon\Carbon::parse($w->created_at)->format('Y')); ?></td>
                                    <?php
                                        $imagen = DB::table('images')
                                                ->join('productos', 'productos.id', '=', 'images.producto_id')
                                                ->where('productos.id',$w->product_id)
                                                ->orderBy('images.order_img','desc')
                                                ->orderBy('images.created_at','desc')
                                                ->select('images.picture as picture')
                                                ->first();
                                        $producto = App\Models\Admin\Producto::find($w->product_id);
                                     ?>
                                  <td><img src="<?php echo e(url($imagen->picture)); ?>" alt="$TipoProducto" class="img-thumbnail"></td>
                                  <td><?php echo e($w->product_name); ?></td>
                                  <td align="right">$<?php echo e(number_format($w->price, 2, '.', ',')); ?></td>

                                  <td class="text-center">
                                    <a class="btn btn-sm btn_tabs_ver" target="_blank" href="<?php echo e(url('linea-negocio/'.str_slug($producto->linea()).'/'.str_slug($producto->serie).'-'.str_slug($producto->marca()).'-'.str_slug($producto->modelo()).'-'.$producto->id)); ?>"  title="<?php echo e($producto->linea().' '.$producto->serie.' '.$producto->marca().' '.$producto->modelo()); ?>">
                                    <i class="fa fa-search"></i>
                                    </a>                                    
                                    <a data-toggle="modal" data-target="#myModal<?php echo e($w->id); ?>" class="btn btn-sm btn_tabs_eliminar open" alt="Eliminar"><i class="fa fa-remove"></i></a>
                                    <div class="modal fade" id="myModal<?php echo e($w->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">¿Desea eliminar este producto de tu wishlist?</h4>
                                          </div>
                                         
                                          <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary del" producto='<?php echo e($producto->id); ?>'  wishlist='<?php echo e($w->id); ?>'>Eliminar</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div role="tabpanel" class="tab-pane fade in" id="pedidos">

                        <div class="row">

                        <div class="col-md-12">

                          <div class="table-responsive">

                            <table class="table table-hover">

                              <thead>

                                <tr>

                                  <th>Fecha</th>

                                  <th>No. Pedido</th>

                                  <th class="text-right">Total</th>

                                  <th class="text-center">Acciones</th>

                                </tr>

                              </thead>

                              <tbody>

                                <tr>

                                  <td>17-mar-2017</td>

                                  <td>3</td>

                                  <td align="right">$40,000.00</td>



                                  <td class="text-center">

                                    <a role="button" data-toggle="collapse" href="#pedido3" aria-expanded="false" aria-controls="pedido3" class="btn btn-sm btn_tabs_ver collapsed"><i class="fa fa-search"></i></a>

                                    <a data-toggle="modal" data-target="#myModal" class="btn btn-sm btn_tabs_eliminar"><i class="fa fa-remove"></i></a>

                                  </td>

                                </tr>

                                

                                <!-- Detalle Pedido -->

                                <tr>

                                  <td colspan="4">

                                    <div class="collapse" id="pedido3" aria-expanded="false" style="height: 0px;">

                                      <div class="well">

                                        <h3>Detalle de Pedido 3</h3>

                                         <div class="table-responsive">

                                            <table class="table table-hover">

                                              <thead>

                                                <tr>

                                                  <th>Cantidad</th>

                                                  <th>Imagen</th>

                                                  <th>Descripción</th>

                                                  <th>Precio Unit.</th>

                                                  <th class="text-right">Sub Total</th>

                                                </tr>

                                              </thead>

                                              <tbody>

                                                <tr>

                                                  <td>1</td>

                                                  <td><img src="/assets/images/bomba_contreto_kcp_2_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1KCP-545 Bomba de Concreto</td>

                                                  <td align="right">$2,200.00</td>

                                                  <td align="right">$2,200.00</td>

                                                </tr>

                                                <tr>

                                                  <td>2</td>

                                                  <td><img src="/assets/images/cargador_john_deere_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1JD-3KF Cargador</td>

                                                  <td align="right">$9,000.00</td>

                                                  <td align="right">$18,000.00</td>

                                                </tr>

                                                <tr>

                                                  <td>1</td>

                                                  <td><img src="/assets/images/minicargador-caterpillar-216b_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1CA-216B Mini Cargador</td>

                                                  <td align="right">$2,800.00</td>

                                                  <td align="right">$2,800.00</td>

                                                </tr>

                                                <tr>

                                                  <td colspan="4" align="right" valign="bottom"><h4><strong>Total:</strong></h4></td>

                                                  <td align="right"><h3><strong>$23,000.00</strong></h3></td>

                                                </tr>

                                              </tbody>

                                            </table>

                                          </div>

                                      </div>

                                    </div>

                                  </td>

                                </tr>

                                

                                <tr>

                                  <td>15-mar-2017</td>

                                  <td>2</td>

                                  <td align="right">$40,000.00</td>



                                  <td class="text-center">

                                    <a role="button" data-toggle="collapse" href="#pedido2" aria-expanded="false" aria-controls="pedido2" class="btn btn-sm btn_tabs_ver collapsed"><i class="fa fa-search"></i></a>

                                    <a data-toggle="modal" data-target="#myModal" class="btn btn-sm btn_tabs_eliminar"><i class="fa fa-remove"></i></a>

                                  </td>

                                </tr>



                                <!-- Detalle Pedido -->

                                <tr>

                                  <td colspan="4">

                                    <div class="collapse" id="pedido2" aria-expanded="false" style="height: 0px;">

                                      <div class="well">

                                        <h3>Detalle de Pedido 2</h3>

                                         <div class="table-responsive">

                                            <table class="table table-hover">

                                              <thead>

                                                <tr>

                                                  <th>Cantidad</th>

                                                  <th>Imagen</th>

                                                  <th>Descripción</th>

                                                  <th>Precio Unit.</th>

                                                  <th class="text-right">Sub Total</th>

                                                </tr>

                                              </thead>

                                              <tbody>

                                                <tr>

                                                  <td>1</td>

                                                  <td><img src="/assets/images/bomba_contreto_kcp_2_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1KCP-545 Bomba de Concreto</td>

                                                  <td align="right">$2,200.00</td>

                                                  <td align="right">$2,200.00</td>

                                                </tr>

                                                <tr>

                                                  <td>2</td>

                                                  <td><img src="/assets/images/cargador_john_deere_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1JD-3KF Cargador</td>

                                                  <td align="right">$9,000.00</td>

                                                  <td align="right">$18,000.00</td>

                                                </tr>

                                                <tr>

                                                  <td>1</td>

                                                  <td><img src="/assets/images/minicargador-caterpillar-216b_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1CA-216B Mini Cargador</td>

                                                  <td align="right">$2,800.00</td>

                                                  <td align="right">$2,800.00</td>

                                                </tr>

                                                <tr>

                                                  <td colspan="4" align="right" valign="bottom"><h4><strong>Total:</strong></h4></td>

                                                  <td align="right"><h3><strong>$23,000.00</strong></h3></td>

                                                </tr>

                                              </tbody>

                                            </table>

                                          </div>

                                      </div>

                                    </div>

                                  </td>

                                </tr>



                                <tr>

                                  <td>12-feb-2017</td>

                                  <td>1</td>

                                  <td align="right">$40,000.00</td>



                                  <td class="text-center">

                                    <a role="button" data-toggle="collapse" href="#pedido1" aria-expanded="false" aria-controls="pedido1" class="btn btn-sm btn_tabs_ver collapsed"><i class="fa fa-search"></i></a>

                                    <a data-toggle="modal" data-target="#myModal" class="btn btn-sm btn_tabs_eliminar"><i class="fa fa-remove"></i></a>

                                  </td>

                                </tr>



                                <!-- Detalle Pedido -->

                                <tr>

                                  <td colspan="4">

                                    <div class="collapse" id="pedido1" aria-expanded="false" style="height: 0px;">

                                      <div class="well">

                                        <h3>Detalle de Pedido 1</h3>

                                         <div class="table-responsive">

                                            <table class="table table-hover">

                                              <thead>

                                                <tr>

                                                  <th>Cantidad</th>

                                                  <th>Imagen</th>

                                                  <th>Descripción</th>

                                                  <th>Precio Unit.</th>

                                                  <th class="text-right">Sub Total</th>

                                                </tr>

                                              </thead>

                                              <tbody>

                                                <tr>

                                                  <td>1</td>

                                                  <td><img src="/assets/images/bomba_contreto_kcp_2_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1KCP-545 Bomba de Concreto</td>

                                                  <td align="right">$2,200.00</td>

                                                  <td align="right">$2,200.00</td>

                                                </tr>

                                                <tr>

                                                  <td>2</td>

                                                  <td><img src="/assets/images/cargador_john_deere_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1JD-3KF Cargador</td>

                                                  <td align="right">$9,000.00</td>

                                                  <td align="right">$18,000.00</td>

                                                </tr>

                                                <tr>

                                                  <td>1</td>

                                                  <td><img src="/assets/images/minicargador-caterpillar-216b_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1CA-216B Mini Cargador</td>

                                                  <td align="right">$2,800.00</td>

                                                  <td align="right">$2,800.00</td>

                                                </tr>

                                                <tr>

                                                  <td colspan="4" align="right" valign="bottom"><h4><strong>Total:</strong></h4></td>

                                                  <td align="right"><h3><strong>$23,000.00</strong></h3></td>

                                                </tr>

                                              </tbody>

                                            </table>

                                          </div>

                                      </div>

                                    </div>

                                  </td>

                                </tr>


                              </tbody>

                            </table>

                          </div>

                        </div>

                      </div>

                    </div>

                    <!-- FIN MI PEDIDOS-->





                    <div role="tabpanel" class="tab-pane fade in" id="compras">

                        <div class="row">

                        <div class="col-md-12">

                          <div class="table-responsive">

                            <table class="table table-hover">

                              <thead>

                                <tr>

                                  <th>Fecha</th>

                                  <th>No. Pedido</th>

                                  <th class="text-right">Total</th>

                                  <th class="text-center">Acciones</th>

                                </tr>

                              </thead>

                              <tbody>

                                <tr>

                                  <td>2-mar-2017</td>

                                  <td>13</td>

                                  <td align="right">$40,000.00</td>



                                  <td class="text-center">

                                    <a role="button" data-toggle="collapse" href="#pedido13" aria-expanded="false" aria-controls="pedido13" class="btn btn-sm btn_tabs_ver collapsed"><i class="fa fa-search"></i></a>

                                  </td>

                                </tr>

                                

                                <!-- Detalle Pedido -->

                                <tr>

                                  <td colspan="4">

                                    <div class="collapse" id="pedido13" aria-expanded="false" style="height: 0px;">

                                      <div class="well">

                                        <h3>Detalle de Pedido 13</h3>

                                         <div class="table-responsive">

                                            <table class="table table-hover">

                                              <thead>

                                                <tr>

                                                  <th>Cantidad</th>

                                                  <th>Imagen</th>

                                                  <th>Descripción</th>

                                                  <th>Precio Unit.</th>

                                                  <th class="text-right">Sub Total</th>

                                                </tr>

                                              </thead>

                                              <tbody>

                                                <tr>

                                                  <td>1</td>

                                                  <td><img src="/assets/images/bomba_contreto_kcp_2_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1KCP-545 Bomba de Concreto</td>

                                                  <td align="right">$2,200.00</td>

                                                  <td align="right">$2,200.00</td>

                                                </tr>

                                                <tr>

                                                  <td>2</td>

                                                  <td><img src="/assets/images/cargador_john_deere_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1JD-3KF Cargador</td>

                                                  <td align="right">$9,000.00</td>

                                                  <td align="right">$18,000.00</td>

                                                </tr>

                                                <tr>

                                                  <td>1</td>

                                                  <td><img src="/assets/images/minicargador-caterpillar-216b_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1CA-216B Mini Cargador</td>

                                                  <td align="right">$2,800.00</td>

                                                  <td align="right">$2,800.00</td>

                                                </tr>

                                                <tr>

                                                  <td colspan="4" align="right" valign="bottom"><h4><strong>Total:</strong></h4></td>

                                                  <td align="right"><h3><strong>$23,000.00</strong></h3></td>

                                                </tr>

                                              </tbody>

                                            </table>

                                          </div>

                                      </div>

                                    </div>

                                  </td>

                                </tr>

                                

                                <tr>

                                  <td>28-feb-2017</td>

                                  <td>12</td>

                                  <td align="right">$40,000.00</td>



                                  <td class="text-center">

                                    <a role="button" data-toggle="collapse" href="#pedido12" aria-expanded="false" aria-controls="pedido12" class="btn btn-sm btn_tabs_ver collapsed"><i class="fa fa-search"></i></a>

                                  </td>

                                </tr>



                                <!-- Detalle Pedido -->

                                <tr>

                                  <td colspan="4">

                                    <div class="collapse" id="pedido12" aria-expanded="false" style="height: 0px;">

                                      <div class="well">

                                        <h3>Detalle de Pedido 12</h3>

                                         <div class="table-responsive">

                                            <table class="table table-hover">

                                              <thead>

                                                <tr>

                                                  <th>Cantidad</th>

                                                  <th>Imagen</th>

                                                  <th>Descripción</th>

                                                  <th>Precio Unit.</th>

                                                  <th class="text-right">Sub Total</th>

                                                </tr>

                                              </thead>

                                              <tbody>

                                                <tr>

                                                  <td>1</td>

                                                  <td><img src="/assets/images/bomba_contreto_kcp_2_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1KCP-545 Bomba de Concreto</td>

                                                  <td align="right">$2,200.00</td>

                                                  <td align="right">$2,200.00</td>

                                                </tr>

                                                <tr>

                                                  <td>2</td>

                                                  <td><img src="/assets/images/cargador_john_deere_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1JD-3KF Cargador</td>

                                                  <td align="right">$9,000.00</td>

                                                  <td align="right">$18,000.00</td>

                                                </tr>

                                                <tr>

                                                  <td>1</td>

                                                  <td><img src="/assets/images/minicargador-caterpillar-216b_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1CA-216B Mini Cargador</td>

                                                  <td align="right">$2,800.00</td>

                                                  <td align="right">$2,800.00</td>

                                                </tr>

                                                <tr>

                                                  <td colspan="4" align="right" valign="bottom"><h4><strong>Total:</strong></h4></td>

                                                  <td align="right"><h3><strong>$23,000.00</strong></h3></td>

                                                </tr>

                                              </tbody>

                                            </table>

                                          </div>

                                      </div>

                                    </div>

                                  </td>

                                </tr>



                                <tr>

                                  <td>12-mar-2017</td>

                                  <td>10</td>

                                  <td align="right">$40,000.00</td>



                                  <td class="text-center">

                                    <a role="button" data-toggle="collapse" href="#pedido10" aria-expanded="false" aria-controls="pedido10" class="btn btn-sm btn_tabs_ver collapsed"><i class="fa fa-search"></i></a>

                                  </td>

                                </tr>



                                <!-- Detalle Pedido -->

                                <tr>

                                  <td colspan="4">

                                    <div class="collapse" id="pedido10" aria-expanded="false" style="height: 0px;">

                                      <div class="well">

                                        <h3>Detalle de Pedido 10</h3>

                                         <div class="table-responsive">

                                            <table class="table table-hover">

                                              <thead>

                                                <tr>

                                                  <th>Cantidad</th>

                                                  <th>Imagen</th>

                                                  <th>Descripción</th>

                                                  <th>Precio Unit.</th>

                                                  <th class="text-right">Sub Total</th>

                                                </tr>

                                              </thead>

                                              <tbody>

                                                <tr>

                                                  <td>1</td>

                                                  <td><img src="/assets/images/bomba_contreto_kcp_2_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1KCP-545 Bomba de Concreto</td>

                                                  <td align="right">$2,200.00</td>

                                                  <td align="right">$2,200.00</td>

                                                </tr>

                                                <tr>

                                                  <td>2</td>

                                                  <td><img src="/assets/images/cargador_john_deere_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1JD-3KF Cargador</td>

                                                  <td align="right">$9,000.00</td>

                                                  <td align="right">$18,000.00</td>

                                                </tr>

                                                <tr>

                                                  <td>1</td>

                                                  <td><img src="/assets/images/minicargador-caterpillar-216b_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>

                                                  <td>1CA-216B Mini Cargador</td>

                                                  <td align="right">$2,800.00</td>

                                                  <td align="right">$2,800.00</td>

                                                </tr>

                                                <tr>

                                                  <td colspan="4" align="right" valign="bottom"><h4><strong>Total:</strong></h4></td>

                                                  <td align="right"><h3><strong>$23,000.00</strong></h3></td>

                                                </tr>

                                              </tbody>

                                            </table>

                                          </div>

                                      </div>

                                    </div>

                                  </td>

                                </tr>

                              </tbody>

                            </table>

                          </div>

                        </div>

                      </div>

                    </div>

                    <!-- FIN MI COMPRAS -->



                    </div>

                </div>


        </div>

        </div>

        <!-- /.container -->

    </div>

<?php $__env->startSection('js-script'); ?>
<script type="text/javascript">
$('#btn_dEnvio').on('click', function(){
    if($('#dEnvio').val()=='0'){
        $('#dEnvio').val('1');
    }else{
        $('#dEnvio').val('0');
    }
});
$('#btn_dFacturacion').on('click', function(){
    if($('#dFacturacion').val()=='0'){
        $('#dFacturacion').val('1');
    }else{
        $('#dFacturacion').val('0');
    }
});
$('.del').on('click', function(){
        
        var producto_id =  $(this).attr('producto');
        
        var wishlist_id =  $(this).attr('wishlist');
        
        $.ajax({
            method: "GET",
            type:'json',
            url: "/wishlist-delete/"+wishlist_id,            
            success: function(data) {
                console.log("success.wishlist");
                if(data.success){
                    $('.modal-backdrop').remove();
                    $(this).addClass('disabled');
                    $('#wish'+wishlist_id).hide(500).remove();
                }
            },
            error: function(data) {
                console.log("error.wishlist");
            }
            });
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

<?php if(session()->has('envioF')): ?>
    <?php if(session()->get('envioF')==0): ?>
        $('#btn_dFacturacion').click();
    <?php endif; ?>
<?php endif; ?>

<?php if(session()->has('envioD')): ?>
    <?php if(session()->get('envioD')==0): ?>
        $('#btn_dEnvio').click();
    <?php endif; ?>
<?php endif; ?>
<?php if(session()->has('mgs')): ?>
    promin.showMgs();
<?php endif; ?>

</script>
<?php $__env->stopSection(); ?>