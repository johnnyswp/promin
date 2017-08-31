<div class="row">

   <div class="col-md-12"><br></div>

</div> <!-- FIN ROW-->



<div class="row">

   <div class="col-md-12"><h2>Lista de Documentación</h2></div>

</div> <!-- FIN ROW-->



<div class="row">

	<div class="col-md-12">

		<div class="table-responsive">

  			<table class="table table-striped table-bordered table-hover">

				<thead>

					<tr>

						<th class="text-center" width="10%">Fecha</th>

						<th class="text-center">Documento</th>

						<th class="text-center">Comentarios</th>

						<th class="text-center">Acciones</th>

					</tr>

				</thead>

				<tbody>

                    @foreach($documentos as $documento)

					<tr>

						<td>{{Carbon\Carbon::parse($documento->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($documento->created_at)->format('m')).'-'.Carbon\Carbon::parse($documento->created_at)->format('Y')}}</td>

						<td class="text-center">{{array_reverse(explode('/',$documento->documento))[0]}}</td>

						<td>{{$documento->comentario}}</td>

						<td class="text-center">
               <a href="{{$documento->documento}}" class="btn btn-info btn-xs" alt="Descargar" download="download"><i class="fa fa-cloud-download"></i></a>
               <a data-toggle="modal" data-target="#docModal{{$documento->id}}" class="btn btn-danger btn-xs" alt="Eliminar"><i class="fa fa-remove"></i></a>
               <div class="modal fade" id="docModal{{$documento->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="myModalLabel">¿Desea eliminar este Documento?</h4>
                     </div>
                    
                     <div class="modal-footer">
                       <form id="del-form{{$documento->id}}" action="{{ route('documentos.delete') }}" method="POST" style="display: block;">
                           {{ csrf_field() }}
                           <input type="hidden" name="documento_id" value="{{$documento->id}}">
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

{{Form::open(['route' => ['documentos.create'],'files' => true])}}

<input type="hidden" name="producto_id" value="{{$producto->id}}">

<div class="row">

	<div class="col-md-12"><h2>Agrega un documento</h2></div>

</div> <!-- FIN ROW-->



<div class="row">

	<div class="col-md-6">

     	{{Form::file('documento', NULL)}}
      @if ($errors->has('documento'))
          <span class="help-block">
              <strong>{{ $errors->first('documento') }}</strong>
          </span>
        @endif
    </div>

</div> <!-- FIN ROW-->   



<div class="row">

    <div class="col-md-6">

     	<label for="">Comentario </label>{{Form::textarea('comentario_doc', NULL, ['class'=>'form-control','style'=>"height: 100px;"])}}
      @if ($errors->has('comentario_doc'))
          <span class="help-block">
              <strong>{{ $errors->first('comentario_doc') }}</strong>
          </span>
        @endif

    </div>

</div> <!-- FIN ROW-->

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    

    </div>

</div>

{{Form::close()}}



