<?php $__env->startSection('title', 'Dashboard'); ?>





<?php $__env->startSection('content'); ?>

<div class="">
  
  <div class="row">
    <div class="col-md-12">
      <h1><i class="fa fa-list-alt"></i> Pedidos</h1>
      <a class="btn btn-round btn-primary btn-md" role="button" data-toggle="collapse" href="#herramientas" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-filter"></i> <i class="fa fa-search"></i></a>
    </div>
  </div><!-- FIN ROW -->
  
  <div class="collapse" id="herramientas">
    
    <div class="well" style="overflow: auto">
  
      <div class="row">
        
        <div class="col-md-3">
            <label>Categoría</label>
            <select class="form-control">
              <option>Todos</option>
              <option>No. Pedido</option>
              <option>Cliente</option>
              <option>Solicitaron factura</option>
            </select>
        </div>

        <div class="col-md-3">
          <label for="">Línea de negocio</label>
          <select name="" id="" class="form-control">
            <option>Todas</option>
            <option>Brunner &amp; Lay</option>
            <option>Cosben</option>
            <option>Equipo usado</option>
            <option>KCP</option>
            <option>MX</option>
            <option>PROMIN Blast</option>
            <option>PROMIN Drill</option>
          </select>
        </div>

        <div class="col-md-3">
            <label>Status</label>
            <select class="form-control">
              <option>Todos</option>
              <option>Pedidos</option>
              <option>Ventas</option>
              <option>Cancelados</option>
            </select>
        </div>

        <div class="col-md-3">
            <label>Ordenar</label>
            <select class="form-control">
              <option>Ascendente</option>
              <option>Descendente</option>
              <option>Más reciente</option>
              <option>Más antigua</option>
            </select>
        </div>
        
      </div> <!-- FIN ROW -->

      <div class="row">
        
        <div class="col-md-6">
          <div class="input-group buscador_margin">
            <input type="text" class="form-control" placeholder="Buscar...">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </div>
      
      </div><!-- FIN ROW -->

    </div>

  </div>


  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 bg_blanco">
                
                    
                    <div class="row">
                      
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <h2>LISTA DE PEDIDOS</h2>
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 pull-right">
                        <div class="form-group">
                          <label class="control-label col-md-6 text-right">Mostrar </label>
                          <div class="col-md-6">
                            <select class="form-control">
                              <option>100</option>
                              <option>50</option>
                              <option>10</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12">
                        <a href="" class="btn btn-info btn-sm btn_margin"><i class="fa fa-cloud-download"></i> Descargar PDF</a>
                      </div>  

                    </div> <!-- FIN ROW-->
                    
                    <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info">
                      <thead>
                        <tr>
                          <th>Fecha</th>
                          <th>No. Pedido</th>
                          <th width="23%">Detalle</th>
                          <th>Cliente</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Factura / Recibo</th>
                          <th class="text-right">Total</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>22-mar-2017</td>
                          <td>5</td>
                          <td>
                            KCP-16-Bomba de Concreto
                            <br>
                            BN-1-Acero de Barrenación
                            <br>
                            CS-1-Brazo telescópico
                          </td>
                          <td>Mario de la Rosa</td>
                          <td class="text-center">
                            <span class="sts_pedido"><i class="fa fa-circle"></i> Pedido</span>
                          </td>
                          <td class="text-center"><i class="fa fa-check"></i></td>
                          <td class="text-right">$ 8,500.00</td>
                          <td>
                            <a href="pedido-5-ver.php" class="btn btn-info btn-xs" alt="Ver"><i class="fa fa-search"></i></a>
                            <a class="btn btn-success btn-xs" alt="Venta" data-toggle="modal" data-target="#modal_vta"><i class="fa fa-check"></i></a>
                            <a class="btn btn-danger btn-xs" alt="Eliminar" data-toggle="modal" data-target="#modal_cancel"><i class="fa fa-remove"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td>21-mar-2017</td>
                          <td>4</td>
                          <td>
                            KCP-16-Bomba de Concreto
                            <br>
                            BN-1-Acero de Barrenación
                            <br>
                            CS-1-Brazo telescópico
                          </td>
                          <td>Juan Carlos</td>
                          <td class="text-center">
                            <span class="sts_activo"><i class="fa fa-check"></i> Venta</span>
                          </td>
                          <td class="text-center">ze20h099-f4e1-4z5f-8cce-060bg2340fe1</td>
                          <td class="text-right">$ 10,900.00</td>
                          <td>
                            <a href="pedido-4-ver.php" class="btn btn-info btn-xs" alt="Ver"><i class="fa fa-search"></i></a>
                            <a class="btn btn-danger btn-xs" alt="Eliminar" data-toggle="modal" data-target="#modal_cancel"><i class="fa fa-remove"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td>20-mar-2017</td>
                          <td>3</td>
                          <td>
                            KCP-16-Bomba de Concreto
                            <br>
                            BN-1-Acero de Barrenación
                            <br>
                            CS-1-Brazo telescópico
                          </td>
                          <td>Joaquin Santiago</td>
                          <td class="text-center">
                            <span class="sts_pedido"><i class="fa fa-circle"></i> Pedido</span>
                          </td>
                          <td class="text-center">-</td>
                          <td class="text-right">$ 25,500.00</td>
                          <td>
                            <a href="pedido-3-ver.php" class="btn btn-info btn-xs" alt="Ver"><i class="fa fa-search"></i></a>
                            <a class="btn btn-success btn-xs" alt="Venta" data-toggle="modal" data-target="#modal_vta"><i class="fa fa-check"></i></a>
                            <a class="btn btn-danger btn-xs" alt="Eliminar" data-toggle="modal" data-target="#modal_cancel"><i class="fa fa-remove"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td>19-mar-2017</td>
                          <td>2</td>
                          <td>
                            KCP-16-Bomba de Concreto
                            <br>
                            BN-1-Acero de Barrenación
                            <br>
                            CS-1-Brazo telescópico
                          </td>
                          <td>Isaac Morales</td>
                          <td class="text-center">
                            <span class="sts_pedido"><i class="fa fa-circle"></i> Pedido</span>
                          </td>
                          <td class="text-center"><i class="fa fa-check"></i></td>
                          <td class="text-right">$ 12,000.00</td>
                          <td>
                            <a href="pedido-2-ver.php" class="btn btn-info btn-xs" alt="Ver"><i class="fa fa-search"></i></a>
                            <a class="btn btn-success btn-xs" alt="Venta" data-toggle="modal" data-target="#modal_vta"><i class="fa fa-check"></i></a>
                            <a class="btn btn-danger btn-xs" alt="Eliminar" data-toggle="modal" data-target="#modal_cancel"><i class="fa fa-remove"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td>18-mar-2017</td>
                          <td>1</td>
                          <td>
                            KCP-16-Bomba de Concreto
                            <br>
                            BN-1-Acero de Barrenación
                            <br>
                            CS-1-Brazo telescópico
                          </td>
                          <td>Ing. Leonel</td>
                          <td class="text-center">
                            <span class="sts_cancel"><i class="fa fa-remove"></i> Cancelado</span>
                          </td>
                          <td class="text-center"><i class="fa fa-check"></i></td>
                          <td class="text-right">$ 6,800.00</td>
                          <td>
                            <a href="pedido-1-ver.php" class="btn btn-info btn-xs" alt="Ver"><i class="fa fa-search"></i></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <nav aria-label="...">
                        <ul class="pagination">
                          <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-arrow-circle-left"></i></span></a></li> 
                          <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li> 
                          <li><a href="#">2</a></li> 
                          <li><a href="#">3</a></li> 
                          <li><a href="#">4</a></li> 
                          <li><a href="#">5</a></li> 
                          <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="fa fa-arrow-circle-right"></i></span></a></li> 
                        </ul> 
                      </nav>
                    </div>
                  </div> <!--FIN PAGINACIÓN-->
                

</div> 
</div>

    <!-- Modal Venta -->
    <div class="modal fade" id="modal_vta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Para confirmar la venta, llene el siguiente formulario:</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <ul class="lista_radio_inline">
                  <label class="radio-inline"><input type="radio" name="t_comprobante" checked="">Recibo</label>
                  <label class="radio-inline"><input type="radio" name="t_comprobante">Factura</label>
                </ul>
                <input type="text" class="form-control" placeholder="0" required="">
              </div>
        
            </div> <!-- FIN ROW -->

            <div class="row">
              
              <div class="col-md-4">
                  <label>Vendió</label>
                  <select class="form-control">
                    <option value="">Promin.mx</option>
                    <option value="">Guillermo Yllescas</option>
                    <option value="">Rafael Domínguez</option>
                    <option value="">Mauricio Santana</option>            
                    <option value="">Michelle Espinosa</option>
                    <option value="">Gabriela Pérez</option>
                    <option value="">Alejandra Juárez</option>
                    <option value="">Pamela</option>
                  </select>
              </div>

              <div class="col-md-4">
                  <label>Comisión</label>
                  <input type="text" class="form-control" placeholder="$ 0.00"> <!-- cero por default -->
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
            <button type="button" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal Cancelación -->
    <div class="modal fade" id="modal_cancel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Para confirmar la cancelación, llene el siguiente formulario:</h4>
          </div>
          <div class="modal-body">

            <div class="row">
              
              <div class="col-md-12">
                  <label>Motivo de cancelación</label>
                  <textarea class="form-control" required=""></textarea>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
            <button type="button" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>