@extends('admin.layouts.master')



@section('title', 'Acessos')





@section('content')

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">

    <h1>Agregando acceso</h1>

  </div>

</div>



<form action="{{route('accesos.store')}}" method="post" enctype="multipart/form-data">

  {{ csrf_field() }}

  <div class="row bg_blanco">

        

        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-3">

            <label>Tipo de Acceso</label>

            <select class="form-control" name="admin">

              <option value="administrator">Administrador</option>

              <option value="ventas">Ventas</option>

              <option value="compras">Compras</option>

              <option value="staff">Staff</option>

              <option value="servicio">Servicio</option> <!-- sólo tiene acceso a tab de control de entrada y tab bitácora -->

            </select>

          </div>

        

          <div class="col-xs-12 col-sm-12 col-md-3">

            <label for="">Usuario </label><input type="text" class="form-control" name="email" placeholder="Ej. example@promin.mx" value="{{ old('email') }}"> <!-- VALIDAR que no se repitan los nombres de usuario -->

            @if ($errors->has('email'))

                <span class="help-block">

                    <strong>{{ $errors->first('email') }}</strong>

                </span>

            @endif

          </div>

        </div>

        

        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-3">

            <label for="">Nombre </label><input type="text" name="name" class="form-control" value="{{ old('name') }}">

            @if ($errors->has('name'))

                <span class="help-block">

                    <strong>{{ $errors->first('name') }}</strong>

                </span>

            @endif 

          </div>

          <div class="col-xs-12 col-sm-12 col-md-3">

            <label for="">Apellido paterno </label><input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}"> 

            @if ($errors->has('last_name'))

                <span class="help-block">

                    <strong>{{ $errors->first('last_name') }}</strong>

                </span>

            @endif

          </div>

          <div class="col-xs-12 col-sm-12 col-md-3">

            <label for="">Apellido materno </label><input type="text" name="parental_name" class="form-control" value="{{ old('parental_name') }}"> 

            @if ($errors->has('parental_name'))

                <span class="help-block">

                    <strong>{{ $errors->first('parental_name') }}</strong>

                </span>

            @endif

          </div>

        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3">

            <label for="">Password </label><input type="password" name="password" class="form-control" value="{{ old('password') }}"> 

            @if ($errors->has('password'))

                <span class="help-block">

                    <strong>{{ $errors->first('password') }}</strong>

                </span>

            @endif

          </div>
          <div class="col-xs-12 col-sm-12 col-md-3">

            <label for="">Repita su password </label><input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}"> 

            @if ($errors->has('password_confirmation'))

                <span class="help-block">

                    <strong>{{ $errors->first('password_confirmation') }}</strong>

                </span>

            @endif

          </div>
        </div>



        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12">

            <label for="">Imagen </label><input type="file" name="picture" class="preview"> 

            @if ($errors->has('picture'))

                <span class="help-block">

                    <strong>{{ $errors->first('picture') }}</strong>

                </span>

            @endif

            <br> 

            <img src="{{url('asset_admin/images/default.jpg')}}" width="200" id="preview" class="img-thumbnail">

          </div>

        </div>





        <div class="col-xs-12 col-sm-12 col-md-12">

          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    

        </div>





    

  </div> <!-- FIN ROW -->

</form>

@endsection