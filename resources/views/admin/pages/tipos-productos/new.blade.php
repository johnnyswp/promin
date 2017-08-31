@extends('admin.layouts.master')



@section('title', 'Tipo de Producto')





@section('content')

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">

    <h1>Agregando tipo de producto</h1>

  </div>

</div>



{{Form::open(['route' => ['tipos-productos.store'],'files' => true])}}

  <div class="row bg_blanco">

    <div class="col-xs-12 col-sm-12 col-md-3">

      <label>Línea de Negocio</label>

      {{Form::select('linea_negocio_id', $lineas, NULL, ['class'=>'form-control'])}}
      @if ($errors->has('linea_negocio_id'))

          <span class="help-block">

              <strong>{{ $errors->first('linea_negocio_id') }}</strong>

          </span>

      @endif

    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">

      <label for="">Nombre </label>{{Form::text('nombre', NULL, ['class'=>'form-control'])}} <!-- VALIDAR que no se repitan los nombres en una misma línea de negocio. EJ: La línea de negocio Cosben, no puede tener dos tipos de producto con el mismo nombre, ejemplo Brazo, no puede tener dos tipo de producto "Brazo" a menos de que se haya escrito "Braso"-->
      @if ($errors->has('nombre'))

          <span class="help-block">

              <strong>{{ $errors->first('nombre') }}</strong>

          </span>

      @endif

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

      <label for="">Descripción (SEO) </label>{{Form::textarea('descripcion', NULL, ['class'=>'form-control','rows'=>'3'])}}
      @if ($errors->has('descripcion'))

          <span class="help-block">

              <strong>{{ $errors->first('descripcion') }}</strong>

          </span>

      @endif

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    

    </div>

  </div> <!-- FIN ROW -->

{{Form::close()}}

@endsection