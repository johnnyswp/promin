<div class="row">

   <div class="col-md-12"><br></div>

</div> <!-- FIN ROW-->



<div class="row">

    <div class="col-md-12"><h2>Listado de Gastos</h2></div>
    <div class="col-md-12">
   	    @if(session('error'))
        <div class="alert alert-danger">
            <ul>
               <li>{{ session('error') }}</li>
               {{session()->forget('error')}}
            </ul>
        </div>
        @endif
    </div>

</div> <!-- FIN ROW-->



<div class="row">

   <div class="col-md-12">

		<a href="{{url('admin/pdf/gastos/'.$producto->id)}}" class="btn btn-info btn-sm" alt="Descargar"><i class="fa fa-cloud-download"></i> Descargar PDF</a>

   </div>

</div> <!-- FIN ROW-->



<div class="row">

	<div class="col-md-12">

		<div class="table-responsive">

  			<table class="table table-striped table-bordered table-hover">

				<thead>

					<tr>

						<th class="text-center" width="8%">Fecha</th>

						<th class="text-center" width="5%">Usuario</th>

						<th class="text-center" width="5%">Cantidad</th>

						<th class="text-center">Descripción</th>

						<th class="text-right" width="10%">Precio Unit.</th>

						<th class="text-right" width="10%">Subtotal</th>

						<th class="text-center" width="5%">Eliminar</th>

					</tr>

				</thead>

				<tbody>
				    <?php $total = 0; ?>
                    @foreach($gastos as $gasto)
					<tr>

						<td>{{Carbon\Carbon::parse($gasto->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($gasto->created_at)->format('m')).'-'.Carbon\Carbon::parse($gasto->created_at)->format('Y')}}</td>

						<td class="text-center">{{$gasto->user()}}</td>

						<td class="text-center">{{$gasto->cantidad}}</td>

						<td class="text-center">{{$gasto->descripcion}}</td>

						<td class="text-right">$ {{number_format($gasto->precio, 2, '.', ',')}}</td>

						<td class="text-right">$ {{number_format($gasto->cantidad*$gasto->precio, 2, '.', ',')}}</td>

						<td class="text-center">
                            <a data-toggle="modal" data-target="#myModal{{$gasto->id}}" class="btn btn-danger btn-xs" alt="Eliminar"><i class="fa fa-remove"></i></a>
                        </td>
                            <div class="modal fade" id="myModal{{$gasto->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">¿Desea eliminar este gasto?</h4>
                                  </div>
                                 
                                  <div class="modal-footer">
                                    <form id="del-form{{$gasto->id}}" action="{{ route('gastos.delete') }}" method="POST" style="display: block;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="gasto_id" value="{{$gasto->id}}">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
						

					</tr>
					<?php $total = $total+($gasto->cantidad*$gasto->precio); ?>
                    @endforeach
					<tr>

						<td class="text-right" colspan="5"><strong>Total: </strong></td>

						<td class="text-right" id="gastosTotal"><strong>$ {{number_format($total, 2, '.', ',')}}</strong></td>

						<td class="text-center">&nbsp;</td>

					</tr>

				</tbody>

			</table>

		</div>

	</div> <!-- FIN tabla -->

</div> <!-- FIN ROW-->



<div class="row">

   <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW-->



<div class="row">

	<div class="col-md-12"><h2>Agrega un gasto</h2></div>

</div> <!-- FIN ROW-->



<div class="row">
{{Form::open(['route' => ['gastos.create'],'files' => true])}}
    <input type="hidden" name="producto_id" value="{{$producto->id}}">
    <input type="hidden" name="total" value="{{$total}}">
    <input type="hidden" name="pv" value="">
	<div class="col-md-2">

     	<label for="">Cantidad </label>
     	{{Form::text('cantidad', NULL, ['class'=>'form-control'])}}
     	@if ($errors->has('cantidad'))
          <span class="help-block">
              <strong>{{ $errors->first('cantidad') }}</strong>
          </span>
        @endif

    </div>

    <div class="col-md-7">

    	<label for="">Descripción </label>
    	{{Form::text('descripcion', NULL, ['class'=>'form-control'])}}
    	@if ($errors->has('descripcion'))
          <span class="help-block">
              <strong>{{ $errors->first('descripcion') }}</strong>
          </span>
        @endif

    </div>

    <div class="col-md-3">

       <label for="">Precio </label>
       {{Form::text('precio', NULL, ['class'=>'form-control'])}}
       @if ($errors->has('precio'))
          <span class="help-block">
              <strong>{{ $errors->first('precio') }}</strong>
          </span>
        @endif

	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
    </div>
{{Form::close()}}
</div> <!-- FIN ROW-->





