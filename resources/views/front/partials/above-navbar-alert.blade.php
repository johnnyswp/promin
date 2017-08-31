@if(session()->has('noactivate') && auth()->check())
    <div class="modal fade modalito" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" style="opacity: 1; color: white; " class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Alerta</h4>
	      </div>
	      <div class="modal-body">
	       {!! session()->get('noactivate') !!}
	       
	    </div> 
	    </div>
	  </div>
	</div>
	<script>
		$('#mensajeModal').modal(true);
	</script>
@endif

@if(session()->has('noactivate') && !auth()->check())
    <div class="modal fade modalito" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" style="opacity: 1; color: white; " class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
	      </div>
	      <div class="modal-body">
	       {!! session()->get('noactivate') !!}
	       
	       <a href="{{url('sesion/close/')}}/{{session()->get('user_id') }}" class="btn btn-lg btn-warning">Cerrar la sesion anterior</a>
	    </div> 
	    </div>
	  </div>
	</div>
	<script>
		$('#mensajeModal').modal(true);
	</script>
@endif

@if(session()->has('mensaje'))
    <div class="modal fade modalito" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" style="opacity: 1; color: white; " class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
	      </div>
	      <div class="modal-body">
	       {!! session()->get('mensaje') !!}
	       
	    </div> 
	    </div>
	  </div>
	</div>
	<script>
		$('#mensajeModal').modal(true);
	</script>
@endif
 
@if(session()->has('editperfil') && auth()->check())
    <div class="modal fade modalito" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content" style="    height: 300px;    background: rgba(51, 122, 183, 0.74)">
	      <div class="modal-header">
	        <button type="button" style="opacity: 1; color: white; " class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Actualizar Perfil</h4>
	      </div>
	      <div class="modal-body" >
	       {!! Form::open(['url' => url('update_profile'), 'class' => 'form-signin', 'id'=>'form'] ) !!}

	        <?php  	$estados = DB::table('cat_Estados')->orderBy('Estado','Asc')->pluck('Estado','idEstado');  	?>
	
        		@if(session()->has('gender'))
        		<div class="col-md-6 clearfix" style="margin-bottom: 10px; @if(!session()->has('telephone')) margin-right: 50%; @endif">
        			<label for="inputGenero" class="sr-only">Genero</label>
		           {!! Form::select('genero', ['hombre' => 'Hombre', 'mujer' => 'Mujer'], null, array(
		            'class'                         => 'form-control col-md-6 col-sm-6 col-xs-12',
		            'placeholder'                   => 'Genero',
		            'required',
		            'id'                            => 'inputGenero',
		            'data-validetta'                => 'required'
		            )) !!}
				</div>

        		@endif
        		@if(session()->has('telephone'))
        		<div class="col-md-6 clearfix " style="margin-bottom: 10px; @if(!session()->has('gender')) margin-right: 50%; @endif">
        			<label for="inputTelephone" class="sr-only">Teléfono</label>
			        {!! Form::text('telephone', null, [
			            'class'                         => 'form-control col-md-6 col-sm-6 col-xs-12',
			            'placeholder'                   => 'Teléfono',
			            'required',
			            'id'                            => 'inputTelephone',
			            'data-validetta'                => 'required,number'
			        ]) !!}
				</div>
        		@endif
				@if(session()->has('estado'))
				<div class="col-md-6 clearfix">
					<label for="inputEstado" class="sr-only">Estado</label>
		           {!! Form::select('Estado', $estados, null, array(
		            'class'=> 'form-control col-md-4 col-sm-4 col-xs-12',
		            'placeholder'                   => 'Estado',
		            'required',
		            'id'                            => 'inputEstado',
		            'data-validetta'                => 'required'
		            )) !!}
				</div>
				<div class="col-md-6 clearfix">
					<label for="inputMunicipio" class="sr-only">Municipio</label>
		           {!! Form::select('municipio', array('' => 'Municipios'), null, array(
		            'class'=> 'form-control col-md-4 col-sm-4 col-xs-12',
		            'placeholder'                   => 'Municipio',
		            'required',
		            'id'                            => 'inputMunicipio',
		            'data-validetta'                => 'required'
		            )) !!}
		        @endif
				</div>
				<div class="col-md-12 clearfix" style=" margin-top: 30px;">
					<button class="btn btn-lg btn-warning btn-block register-btn" type="submit">Actualizar  Perfil</button>				
				</div>
	        {!! Form::close() !!}
	    </div> 
	    </div>
	  </div>
	</div>
	<script>
	(function($){
    $.fn.validettaLanguage = {};
    $.validettaLanguage = {
        init : function(){
            $.validettaLanguage.messages = {
                required    : 'Campo obligatorio.',
                email       : 'Correo electrónico no válido.',
                number      : 'Este campo sólo acepta valores numéricos.',
                maxLength   : 'Este campo acepta como máximo {count} caracteres.',
                minLength   : 'Este campo requiere como mínimo {count} caracteres.',
                maxChecked  : 'Sólo se puede marcar {count} opciones como máximo.',
                minChecked  : 'Es necesario marcar como mínimo {count} opciones.',
                maxSelected : 'Sólo se puede marcar {count} opciones como máximo.',
                minSelected : 'Es necesario marcar como mínimo {count} opciones.',
                notEqual    : 'Los campos no coinciden.',
                different   : 'Fields cannot be the same as each other',
                creditCard  : 'Tarjeta de crédito no válida.'
            };
        }
    };
    $.validettaLanguage.init();
})(jQuery);
        jQuery(document).ready(function($) {

	var $form = $("form"),
              $successMsg = $(".alert");
            $form.validetta({
              bubblePosition: "right",
              bubbleGapTop: 10,
              bubbleGapLeft: -5,
              realTime : true
            });

            });
		$('#mensajeModal').modal(true);
		var url = "http://promocerealesgf.com.mx/municipios/";
            $('#inputEstado').on('change', function(event) {
                event.preventDefault();
                /* Act on the event */
                var id = $(this).val();            
                $('#inputMunicipio').load(url+id);
            });
	</script>
@endif