<div class="row">

   <div class="col-md-12"><br></div>

</div> <!-- FIN ROW-->



<div class="row">

   <div class="col-md-12"><h2>Bitácora de seguimiento</h2></div>

</div> <!-- FIN ROW-->



<div class="row">

   <div class="col-md-12">

		<a href="{{url('admin/pdf/bitacoras/'.$producto->id)}}" class="btn btn-info btn-sm" alt="Descargar"><i class="fa fa-cloud-download"></i> Descargar PDF</a>

   </div>

</div> <!-- FIN ROW-->



<div class="row">

	<div class="col-md-12">

		<div class="table-responsive">

  			<table class="table table-striped table-bordered table-hover">

				<thead>

					<tr>

						<th class="text-center" width="5%">Fecha</th>

						<th class="text-center" width="3%">Usuario</th>

						<th class="text-center" width="80%">Comentarios</th>

						<th class="text-center" width="3%">Responsable</th>

						<th class="text-center" width="3%">Eliminar</th>

					</tr>

				</thead>

				<tbody>

					@foreach($bitacoras as $bitacora)
					<tr>

						<td>{{Carbon\Carbon::parse($bitacora->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($bitacora->created_at)->format('m')).'-'.Carbon\Carbon::parse($bitacora->created_at)->format('Y')}}</td>

						<td class="text-center">{{$bitacora->responsable}}</td>

						<td class="text-left">{{$bitacora->comentario}}</td>

						<td class="text-center">{{App\Models\Admin\Bitacora::responsable($bitacora->responsable)}}</td>

						<td class="text-center">
              <a data-toggle="modal" data-target="#bitacoraModal{{$bitacora->id}}" class="btn btn-danger btn-xs" alt="Eliminar"><i class="fa fa-remove"></i></a>
              <div class="modal fade" id="bitacoraModal{{$bitacora->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">¿Desea eliminar este bitacora?</h4>
                    </div>
                   
                    <div class="modal-footer">
                      <form id="del-form{{$bitacora->id}}" action="{{ route('bitacoras.delete') }}" method="POST" style="display: block;">
                          {{ csrf_field() }}
                          <input type="hidden" name="bitacora_id" value="{{$bitacora->id}}">
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

	</div> <!-- FIN tabla -->

</div> <!-- FIN ROW-->



<div class="row">

   <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW-->



<div class="row">

	<div class="col-md-12"><h2>Agrega un seguimiento</h2></div>

</div> <!-- FIN ROW-->



<div class="row">
{{Form::open(['route' => ['bitacoras.create'],'files' => true])}}
    <input type="hidden" name="producto_id" value="{{$producto->id}}">
	<div class="col-md-12">

     	<label for="">Comentario </label>
      {{Form::textarea('comentario', NULL, ['class'=>'form-control','style'=>"height: 100px;"])}}
      @if ($errors->has('comentario'))
          <span class="help-block">
              <strong>{{ $errors->first('comentario') }}</strong>
          </span>
        @endif
       
    </div>

    <div class="col-md-4">

    	<label for="">Responsable </label>
      {{Form::select('responsable', $accesos, 0, ['class'=>'form-control'])}} <!--mostrar los usuarios que se han agregado al sistema-->
      @if ($errors->has('responsable'))
          <span class="help-block">
              <strong>{{ $errors->first('responsable') }}</strong>
          </span>
        @endif

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
    </div>
{{Form::close()}}
</div> <!-- FIN ROW-->





