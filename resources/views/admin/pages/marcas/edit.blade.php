@extends('admin.layouts.master')

@section('title', 'Marcas')


@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <h1>Editando marca</h1>
  </div>
</div>

{{Form::model($marca, ['route' => ['marcas.update', $marca->id],'files' => true])}}
  <input type="hidden" name="_method" value="PUT">
  <div class="row bg_blanco">
    <div class="col-xs-12 col-sm-12 col-md-3">
      <label>Tipo de Producto</label>
      {{Form::select('tipo_producto_id', $tipos, NULL, ['class'=>'form-control'])}}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
      <label for="">Nombre </label>{{Form::text('nombre', NULL, ['class'=>'form-control'])}} <!-- VALIDAR que no se repitan los nombres en una misma línea de negocio. EJ: La línea de negocio Cosben, no puede tener dos tipos de producto con el mismo nombre, ejemplo Brazo, no puede tener dos tipo de producto "Brazo" a menos de que se haya escrito "Braso"-->
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
    </div>
  </div> <!-- FIN ROW -->
{{Form::close()}}
@endsection