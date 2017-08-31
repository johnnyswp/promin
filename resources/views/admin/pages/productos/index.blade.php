@extends('admin.layouts.master')
@section('title', 'Productos')
@section('content')
<div class="">
  
  <div class="row">
    <div class="col-md-12">
      <h1><i class="fa fa-cubes"></i> Productos</h1>
      <ul class="lista_radio_inline">
        <li><label class="radio-inline"><input type="radio" name="tipo_producto" value="mx" checked="">Producto MX</label></li> <!-- este lleva a productos-mx-agregar.php -->
        <li><label class="radio-inline"><input type="radio" name="tipo_producto" value="unidades">Producto Unidades</label></li> <!-- este lleva a productos-unidades-agregar.php -->
        <li><button class="btn btn-round btn-success btn-md" id="agregar"><i class="fa fa-plus"></i> Agregar</button></li>
        <li><a class="btn btn-round btn-primary btn-md" role="button" data-toggle="collapse" href="#herramientas" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-filter"></i> <i class="fa fa-search"></i></a></li>
      </ul>
    </div>
  </div><!-- FIN ROW -->
  <form method="GET">
@if(!isset($_GET))
  <div class="collapse" id="herramientas">
@else
  <div class="collapse in" id="herramientas" aria-expanded="true">
@endif
    
    <div class="well" style="overflow: auto">

      <div class="row">

        <div class="col-md-3">
            <label>Categoria</label>
            {{Form::select('category', ['all'=>'Todas','1'=>'MX','0'=>'Unidades'], $input->category, ['class'=>'form-control', 'onChange'=>'this.form.submit()'])}}
        </div>

        <div class="col-md-3">
            <label>Línea de Negocio</label>
            {{Form::select('linea', $lineas, $input->linea, ['class'=>'form-control', 'onChange'=>'this.form.submit()'])}}
        </div>

        <div class="col-md-3">
            <label>Tipo de Producto</label>
            {{Form::select('tipo', $tipos, $input->tipo, ['class'=>'form-control', 'onChange'=>'this.form.submit()'])}}
        </div>

        <div class="col-md-3">
            <label>Status</label>
            {{Form::select('status', ['all'=>'Todos','Activo'=>'Activo','Inactivo'=>'Inactivo','Sin Stock'=>'Sin Stock','Recibido'=>'Recibido','Mecánica'=>'Mecánica','Hojalatería y pintura'=>'Hojalatería y pintura','Eléctrico'=>'Eléctrico'], $input->status, ['class'=>'form-control', 'onChange'=>'this.form.submit()'])}}
        </div>

        <div class="col-md-3">
            <label>Ordenar</label>
            {{Form::select('order', ['asc'=>'Ascendente','desc'=>'Descendente','new'=>'Más reciente','old'=>'Más antigua'], $input->order, ['class'=>'form-control', 'onChange'=>'this.form.submit()'])}}
        </div>
        

        
        <div class="col-md-6">
          <div class="input-group buscador_margin">
             <input type="text" class="form-control" placeholder="Buscar..." name="buscar" value="{{$input->buscar}}">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
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
                        <h2>LISTA DE PRODUCTOS</h2>
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 pull-right">
                        <div class="form-group">
                          <label class="control-label col-md-6 text-right">Mostrar </label>
                          <div class="col-md-6">
                            {{Form::select('numb', ['100'=>'100','50'=>'50','10'=>'10'], $input->numb, ['class'=>'form-control', 'onChange'=>'this.form.submit()'])}}
                          </div>
                        </div>
                      </div>
                      </form>
                      <div class="col-md-3 col-sm-4 col-xs-12">
                        <a href="" class="btn btn-info btn-sm btn_margin"><i class="fa fa-cloud-download"></i> Descargar PDF</a>
                      </div>  

                    </div> <!-- FIN ROW-->
                    
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info">
                      <thead>
                        <tr>
                          <th>Fecha</th>
                          <th>Categoria</th>
                          <th>Imagen</th>
                          <th>Producto</th>
                          <th>Precio</th>
                          <th class="text-center">Status</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($productos as $producto)
                        <tr>
                          <td>{{Carbon\Carbon::parse($producto->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($producto->created_at)->format('m')).'-'.Carbon\Carbon::parse($producto->created_at)->format('Y')}}</td>
                          <td>@if($producto->mx == 1) MX @else Unidades @endif</td>
                          <td>
                            <a id="gal16" class="test-popup-link"><img src="{{$producto->image()}}" width="80" alt=""></a>
                          </td>
                          <td>{{$producto->nombre}}</td>
                          <td>$ {{number_format($producto->priceVenta, 2, '.', ',')}}</td>
                          <td class="text-center">
                            @if($producto->status=="Listo")
                            <span class="sts_activo"><i class="fa fa-check"></i> Activo</span>
                            @esleif($producto->status=="Recibido")
                            <span class="sts_proceso"><i class="fa fa-thumb-tack"></i> Recibido</span>
                            @esleif($producto->status=="Mecánica")
                            <span class="sts_proceso"><i class="fa fa-wrench"></i> Mecánica</span>
                            @esleif($producto->status=="Hojalatería")
                            <span class="sts_proceso"><i class="fa fa-tint"></i> Hojalatería y pintura</span>
                            @esleif($producto->status=="Eléctrico")
                            <span class="sts_proceso"><i class="fa fa-bolt"></i> Eléctrico</span>                            
                            @endif
                          </td>
                          <td>
                            <a href="{{url('admin/productos/'.$producto->id.'/edit')}}" class="btn btn-warning btn-xs" alt="Editar"><i class="fa fa-pencil"></i></a>
                             

                            <a data-toggle="modal" data-target="#myModal{{$producto->id}}" class="btn btn-danger btn-xs" alt="Eliminar"><i class="fa fa-remove"></i></a>
                            <div class="modal fade" id="myModal{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">¿Desea eliminar el producto {{$producto->serie}}?</h4>
                                  </div>
                                 
                                  <div class="modal-footer">
                                    <form id="del-form{{$producto->id}}" action="{{ route('productos.destroy',$producto->id) }}" method="POST" style="display: block;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Eliminar</button>
                                </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      {{$productos->links()}}
                    </div>
                  </div> <!--FIN PAGINACIÓN-->
                

</div> 
</div>
@endsection
@section('script')
<script type="text/javascript">
  $('#agregar').on('click', function(){
     $val = $('Input[name="tipo_producto"]:checked').val();
     if($val == "mx"){
      window.location.href = "{{url('/admin/productos/create')}}";
     }else{
      window.location.href = "{{url('/admin/productos-unidades/create/')}}";
     }
  });
</script>
@stop