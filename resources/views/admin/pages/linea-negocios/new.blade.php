@extends('admin.layouts.master')



@section('title', 'Líneas de Negocio')





@section('content')

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">

    <h1>Agregando línea de negocio</h1>

  </div>

</div>



<form action="{{route('linea-negocios.store')}}" method="post" enctype="multipart/form-data">

  {{ csrf_field() }}

  <div class="row bg_blanco">   

    <div class="col-xs-12 col-sm-12 col-md-3">

      <label for="">Tipo</label>

      <ul class="lista_radio_inline">

        <li><label class="radio-inline"><input type="radio" value="mx" name="tipo" @if(old('tipo')=="mx" or old('tipo')=="") checked @endif>MX</label></li>

        <li><label class="radio-inline"><input type="radio" value="unidades" name="tipo" @if(old('tipo')=="unidades") checked @endif>Unidades</label></li>

      </ul>

      @if ($errors->has('tipo'))

          <span class="help-block">

              <strong>{{ $errors->first('tipo') }}</strong>

          </span>

      @endif

    </div>

    

    <div class="col-xs-12 col-sm-12 col-md-6">

      <label for="">Nombre </label><input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">

      @if ($errors->has('nombre'))

          <span class="help-block">

              <strong>{{ $errors->first('nombre') }}</strong>

          </span>

      @endif

    </div>



    <div class="col-xs-12 col-sm-12 col-md-3">

      <label for="">Siglas </label><input type="text" class="form-control" name="siglas" value="{{ old('siglas') }}">

      @if ($errors->has('siglas'))

          <span class="help-block">

              <strong>{{ $errors->first('siglas') }}</strong>

          </span>

      @endif

    </div>



    <div class="col-xs-12 col-sm-12 col-md-12">
      <label for="">Descripción (SEO) </label><textarea class="form-control" name="descripcion">{{ old('descripcion') }}</textarea>
      @if ($errors->has('descripcion'))
          <span class="help-block">
              <strong>{{ $errors->first('descripcion') }}</strong>
          </span>
      @endif
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
      <label for="">Palabras clave (SEO) </label><textarea class="form-control" name="keywork">{{ old('keywork') }}</textarea>
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
      <img src="{{url('asset_admin/images/default.jpg')}}" width="200" id="preview" class="img-thumbnail">
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
    </div>
  </div> <!-- FIN ROW -->
</form>
@endsection