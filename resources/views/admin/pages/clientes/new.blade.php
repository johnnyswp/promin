@extends('admin.layouts.master')

@section('title', 'Clientes')


@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <h1>Agregando Clientes</h1>
  </div>
</div>

<form action="{{route('clientes.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row bg_blanco"> 
        <div class="row">
          <div class="col-md-12">
            <h2>Datos de acceso</h2>
          </div>
        </div>
        
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3">
            <label for="email">Email </label><input value="{{ old('email') }}" name="email" type="text" class="form-control" placeholder="Ej. example@promin.mx"> <!-- VALIDAR que no se repitan los nombres de usuario -->
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="col-xs-12 col-sm-12 col-md-3">
            <label for="linea_negocio">Línea de negocio de interés</label>
            {!! Form::select('linea_negocio', $lineas_negocios,null,['class' => 'form-control']) !!}
          </div>
        </div>

        <div class="row">
          <div class="col-md-12"><hr></div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h2>Datos generales</h2>
          </div>
        </div>
        <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-3">
                <label for="name">Nombre </label><input value="{{ old('name') }}" name="name" type="text" class="form-control">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="col-xs-12 col-sm-12 col-md-3">
                <label for="last_name">Apellido paterno </label><input value="{{ old('last_name') }}" name="last_name" id="last_name" type="text" class="form-control"> 
                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="col-xs-12 col-sm-12 col-md-3">
                <label for="parental_name">Apellido materno </label><input value="{{ old('parental_name') }}" name="parental_name" id="parental_name" type="text" class="form-control">
                @if ($errors->has('parental_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('parental_name') }}</strong>
                    </span>
                @endif 
              </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3">
            <label for="email2">Email </label><input value="{{ old('email2') }}" name="email2" id="email2" type="text" class="form-control"> 
            @if ($errors->has('email2'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email2') }}</strong>
                    </span>
            @endif
          </div>
          <div class="col-xs-12 col-sm-12 col-md-3">
            <label for="web">Página web </label><input value="{{ old('web') }}" name="web" id="web" type="text" class="form-control"> 
            @if ($errors->has('web'))
                    <span class="help-block">
                        <strong>{{ $errors->first('web') }}</strong>
                    </span>
            @endif
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3">
            <label for="vendedor">Vendedor </label>
            {!! Form::select('vendedores', $vendedores,null,['class' => 'form-control','placeholder' => 'Vendedores']) !!}
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <label for="comentarios">Comentarios </label><textarea   name="comentarios" id="comentarios" class="form-control">{{ old('comentarios') }}</textarea>
            @if ($errors->has('comentarios'))
                    <span class="help-block">
                        <strong>{{ $errors->first('comentarios') }}</strong>
                    </span>
            @endif
          </div>
        </div>

        <div class="row">
          <div class="col-md-12"><hr></div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h2>Datos de Facturación</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
            <label for="razon_social">Nombre / Razón Social </label><input value="{{ old('razon_social') }}" name="razon_social" id="razon_social" type="text" class="form-control"> 
             @if ($errors->has('razon_social'))
                    <span class="help-block">
                        <strong>{{ $errors->first('razon_social') }}</strong>
                    </span>
            @endif
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <label for="rfc">R.F.C. </label><input value="{{ old('rfc') }}" name="rfc" id="rfc" type="text" class="form-control"> <!-- VALIDAR el formato del RFC -->
            @if ($errors->has('rfc'))
                    <span class="help-block">
                        <strong>{{ $errors->first('rfc') }}</strong>
                    </span>
            @endif
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <label for="cp">C.P. </label><input value="{{ old('cp') }}" name="cp" id="cp" type="text" class="form-control"> <!-- Al igual que en front, con capturar el C.P. se deberá de llenar la información de Colonia, Delegación/Municipio, Estado y País -por default es México- -->
            @if ($errors->has('cp'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cp') }}</strong>
                    </span>
            @endif
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
            <label for="calle">Calle </label><input value="{{ old('calle') }}" name="calle" id="calle" type="text" class="form-control"> 
            @if ($errors->has('calle'))
                    <span class="help-block">
                        <strong>{{ $errors->first('calle') }}</strong>
                    </span>
            @endif
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <label for="n_ext">No. Ext. </label><input value="{{ old('n_ext') }}" name="n_ext" id="n_ext" type="text" class="form-control">
            @if ($errors->has('n_ext'))
                    <span class="help-block">
                        <strong>{{ $errors->first('n_ext') }}</strong>
                    </span>
            @endif
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <label for="n_int">No. Int. </label><input value="{{ old('n_int') }}" name="n_int" id="n_int" type="text" class="form-control"> 
            @if ($errors->has('n_int'))
                    <span class="help-block">
                        <strong>{{ $errors->first('n_int') }}</strong>
                    </span>
            @endif
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="colonia">Colonia </label><input value="{{ old('colonia') }}" name="colonia" id="colonia" type="text" class="form-control">
            @if ($errors->has('colonia'))
                    <span class="help-block">
                        <strong>{{ $errors->first('colonia') }}</strong>
                    </span>
            @endif 
          </div>
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="municipio">Delegación / Municipio </label><input value="{{ old('municipio') }}" name="municipio" id="municipio" type="text" class="form-control">
            @if ($errors->has('municipio'))
                    <span class="help-block">
                        <strong>{{ $errors->first('municipio') }}</strong>
                    </span>
            @endif
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="estado">Estado </label><input value="{{ old('estado') }}" name="estado" id="estado" type="text" class="form-control"> 
            @if ($errors->has('estado'))
                    <span class="help-block">
                        <strong>{{ $errors->first('estado') }}</strong>
                    </span>
            @endif
          </div>
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="pais">País </label><input value="{{ old('pais') }}" name="pais" id="pais" type="text" class="form-control"> <!-- por default México, a menos que el usuario lo cambie-->
            @if ($errors->has('pais'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pais') }}</strong>
                    </span>
            @endif
          </div>
        </div>

        <div class="row">
          <div class="col-md-12"><hr></div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h2>Datos de Envío</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <ul class="lista_check">
              <li><label for="activo" class="checkbox-inline"><input name="activo" id="activo" type="checkbox" value="1" checked="">Usar domicilio de facturación</label></li>
            </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2">
            <label for="cp_2">C.P. </label><input value="{{ old('cp_2') }}" name="cp_2" id="cp_2" type="text" class="form-control"> <!-- Al igual que en front, con capturar el C.P. se deberá de llenar la información de Colonia, Delegación/Municipio, Estado y País -por default es México- -->
            @if ($errors->has('cp_2'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cp_2') }}</strong>
                    </span>
            @endif
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
            <label for="calle_2">Calle </label><input value="{{ old('calle_2') }}" name="calle_2" id="calle_2" type="text" class="form-control">
            @if ($errors->has('calle_2'))
                    <span class="help-block">
                        <strong>{{ $errors->first('calle_2') }}</strong>
                    </span>
            @endif 
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <label for="n_ext_2">No. Ext. </label><input value="{{ old('n_ext_2') }}" name="n_ext_2" id="n_ext_2" type="text" class="form-control">
            @if ($errors->has('n_ext_2'))
                    <span class="help-block">
                        <strong>{{ $errors->first('n_ext_2') }}</strong>
                    </span>
            @endif
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <label for="n_int_2">No. Int. </label><input value="{{ old('n_int_2') }}" name="n_int_2" id="n_int_2" type="text" class="form-control">
            @if ($errors->has('n_int_2'))
                    <span class="help-block">
                        <strong>{{ $errors->first('n_int_2') }}</strong>
                    </span>
            @endif
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="colonia_2">Colonia </label><input value="{{ old('colonia_2') }}" name="colonia_2" id="colonia_2" type="text" class="form-control">
            @if ($errors->has('colonia_2'))
                    <span class="help-block">
                        <strong>{{$errors->first('colonia_2')}}</strong>
                    </span>
            @endif 
          </div>
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="municipio_2">Delegación / Municipio </label><input value="{{ old('municipio_2') }}" name="municipio_2" id="municipio_2" type="text" class="form-control">
            @if ($errors->has('municipio_2'))
                    <span class="help-block">
                        <strong>{{ $errors->first('municipio_2')}}</strong>
                    </span>
            @endif 
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="estado-2">Estado </label><input value="{{ old('estado_2') }}" name="estado_2" id="estado_2" type="text" class="form-control"> 
            @if ($errors->has('estado_2'))
                    <span class="help-block">
                        <strong>{{ $errors->first('estado_2')}}</strong>
                    </span>
            @endif 
          </div>
          <div class="col-xs-12 col-sm-12 col-md-5">
            <label for="pais_2">País </label><input value="{{ old('pais_2') }}" name="pais_2" id="pais_2" type="text" class="form-control"> <!-- por default México, a menos que el usuario lo cambie-->
            @if ($errors->has('pais_2'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pais_2')}}</strong>
                    </span>
            @endif 
          </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
        </div>
     
 
  </div> <!-- FIN ROW -->
</form>
@endsection