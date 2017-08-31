@extends('admin.layouts.master')



@section('title', 'Líneas de Negocio')





@section('content')

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">

    <h1>Editando línea de negocio</h1>

  </div>

</div>



{{Form::model($linea, ['route' => ['linea-negocios.update', $linea->id],'files' => true])}}

  <div class="row bg_blanco">
        <input type="hidden" name="_method" value="PUT">
        <div class="col-xs-12 col-sm-12 col-md-3">
          <label for="">Tipo</label>
          <ul class="lista_radio_inline">
            <li><label class="radio-inline"><input type="radio" value="mx" name="tipo" @if($linea->tipo=="mx") checked @endif>MX</label></li>
            <li><label class="radio-inline"><input type="radio" value="unidades" name="tipo" @if($linea->tipo=="unidades") checked @endif>Unidades</label></li>
          </ul>
          @if ($errors->has('tipo'))
              <span class="help-block">
                  <strong>{{ $errors->first('tipo') }}</strong>
              </span>
          @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
          <label for="">Nombre </label>{{Form::text('nombre', NULL, ['class'=>'form-control'])}}
          @if ($errors->has('nombre'))
              <span class="help-block">
                  <strong>{{ $errors->first('nombre') }}</strong>
              </span>
          @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">
          <label for="">Siglas </label>{{Form::text('siglas', NULL, ['class'=>'form-control'])}}
          @if ($errors->has('siglas'))
              <span class="help-block">
                  <strong>{{ $errors->first('siglas') }}</strong>
              </span>
          @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <label for="">Descripción (SEO) </label>{{Form::textarea('descripcion', NULL, ['class'=>'form-control','rows'=>'3'])}}
          @if ($errors->has('descripcion'))
              <span class="help-block">
                  <strong>{{ $errors->first('decripcion') }}</strong>
              </span>
          @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <label for="">Palabras clave (SEO) </label>{{Form::textarea('keywork', NULL, ['class'=>'form-control','rows'=>'3'])}}
          @if ($errors->has('keywork'))
              <span class="help-block">
                  <strong>{{ $errors->first('keywork') }}</strong>
              </span>
          @endif
        </div>

        <div class="col-md-12">
          <label for="">Imagen</label>
          <span><br>Tamaño recomendado: ancho 2000px y alto 1333px.</span>
          <span><br>Peso sugerido: 350Kb</span>
          <input type="file" name="picture" class="preview">
          @if ($errors->has('picture'))
              <span class="help-block">
                  <strong>{{ $errors->first('picture') }}</strong>
              </span>
          @endif
          <br>
          <img src="{{asset($linea->picture)}}" alt="" class="img-thumbnail" id="preview" width="120">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
        </div>

  </div> <!-- FIN ROW -->

{{Form::close()}}

@endsection