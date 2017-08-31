<div class="row">
  <div class="col-md-12"><h2>Ubicación</h2></div>
</div> <!-- FIN ROW -->

@if(session('error'))
    <div class="alert alert-danger">
        <ul>
           <li>{{ session('error') }}</li>
           {{session()->forget('error')}}
        </ul>
    </div>
@endif

{{Form::model($producto, ['route' => ['productos.update', $producto->id],'files' => true, 'method' => 'put'])}}

<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="type" value="new">
<input type="hidden" name="gastos" value="">


<div class="row">

  <div class="col-md-6">

    <div class="form-group">

      <label class="control-label col-md-4">Línea de negocio</label>

      <div class="col-md-8">
        <select name="linea_negocio_id" class="form-control" id="linea">
          <option value=""  @if(old('linea_negocio_id') == "") selected="selected" @endif>Seleccione una opción</option>
          @foreach($lineas as $linea)
          <option value="{{$linea->id}}" @if(old('linea_negocio_id') == $linea->id) selected="selected" @endif>{{$linea->nombre}}</option>
          @endforeach
        </select>
        @if ($errors->has('linea_negocio_id'))
          <span class="help-block">
              <strong>{{ $errors->first('linea_negocio_id') }}</strong>
          </span>
        @endif
      </div>

    </div>

  </div>


  <div class="col-md-6">
    <div class="form-group">
      <label class="control-label col-md-4">Tipo de Producto</label>
      <div class="col-md-8"  id="tipos-data">
      @if(old('linea_negocio_id')!="")
        <select name="tipo_producto_id" class="form-control" id="tipos">
          <option value=""  @if(old('tipo_producto_id') == "") selected="selected" @endif>Seleccione una opción</option>

          @foreach($tipos as $tipo)
          <option value="{{$tipo->id}}" @if(old('tipo_producto_id') == $tipo->id) selected="selected" @endif>{{$tipo->nombre}}</option>
          @endforeach
        </select>
      @else
        <select name="tipo_producto_id" class="form-control" id="tipos">
          <option value=" " selected="selected">Seleccione una opción</option>
        </select>
      @endif
        @if ($errors->has('tipo_producto_id'))
          <span class="help-block">
              <strong>{{ $errors->first('tipo_producto_id') }}</strong>
          </span>
        @endif

      </div>
    </div>
  </div>
</div> <!-- FIN ROW -->

<div class="row">

  <div class="col-md-6">

    <div class="form-group">

      <label class="control-label col-md-4">Marca</label>

      <div class="col-md-8" id="marcas-data">
        @if(old('tipo_producto_id')!="")
          <select name="marcas_id" class="form-control" id="marcas">
            <option value=""  @if(old('marcas_id') == "") selected="selected" @endif>Seleccione una opción</option>
            @foreach($marcas as $marca)
            <option value="{{$marca->id}}" @if(old('marcas_id') == $marca->id) selected="selected" @endif>{{$marca->nombre}}</option>
            @endforeach
          </select>
        @else
          <select name="marcas_id" class="form-control" id="marcas">
            <option value=" " selected="selected">Seleccione una opción</option>
          </select>
        @endif
        @if ($errors->has('marcas_id'))
          <span class="help-block">
              <strong>{{ $errors->first('marcas_id') }}</strong>
          </span>
        @endif
      </div>

    </div>
      
  </div>



  <div class="col-md-6">

    <div class="form-group">

      <label class="control-label col-md-4">Modelo</label>

      <div class="col-md-8" id="modelos-data">
        @if(old('marcas_id')!="")
          <select name="modelo_id" class="form-control" id="modelos">
            <option value=""  @if(old('modelo_id') == "") selected="selected" @endif>Seleccione una opción</option>
            @foreach($modelos as $modelo)
            <option value="{{$modelo->id}}" @if(old('modelo_id') == $modelo->id) selected="selected" @endif>{{$modelo->nombre}}</option>
            @endforeach
          </select>
        @else
          <select name="modelo_id" class="form-control" id="modelos">
            <option value=" " selected="selected">Seleccione una opción</option>
          </select>
        @endif
        @if ($errors->has('modelo_id'))
          <span class="help-block">
              <strong>{{ $errors->first('modelo_id') }}</strong>
          </span>
        @endif
      </div>
       
    </div>

  </div>



</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><h2>Identificación</h2></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-3">

    <label for="">Serie </label>{{Form::text('serie', NULL, ['class'=>'form-control serie'])}}
    @if ($errors->has('serie'))
          <span class="help-block">
              <strong>{{ $errors->first('serie') }}</strong>
          </span>
        @endif
  </div>

  <div class="col-md-3">

    <label for="">MX </label>

    <br>

    <p id="mx">MX-{{$producto->id}}</p>

  </div>

  <div class="col-md-6">

    <label for="">SKU </label>

    <br>

    <p id="sku">MX-{{$producto->id}}</p>

  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-3">

    <label for="">No. de Factura de Compra </label>{{Form::text('nFact', NULL, ['class'=>'form-control'])}}
    @if ($errors->has('nFact'))
          <span class="help-block">
              <strong>{{ $errors->first('nFact') }}</strong>
          </span>
        @endif
  </div>

  <div class="col-md-3">

    <label for="">No. de Pedimento </label>{{Form::text('nPedi', NULL, ['class'=>'form-control'])}}
    @if ($errors->has('nPedi'))
          <span class="help-block">
              <strong>{{ $errors->first('nPedi') }}</strong>
          </span>
        @endif
  </div>

  <div class="col-md-3">

    <label for="">Horómetro </label>{{Form::text('horometro', NULL, ['class'=>'form-control'])}} <!-- es forzoso este campo para guardar-->
    @if ($errors->has('horometro'))
      <span class="help-block">
          <strong>{{ $errors->first('horometro') }}</strong>
      </span>
    @endif
  </div>

  <div class="col-md-3">

    <label for="">Asesor </label>

    {{Form::select('asesor_id', $accesos, NULL, ['class'=>'form-control', 'id'=>'ase'])}}
    @if ($errors->has('asesor_id'))
      <span class="help-block">
          <strong>{{ $errors->first('asesor_id') }}</strong>
      </span>
    @endif
  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12">

    <h2>Galería</h2>

    <span>Tamaño recomendado: ancho 800px y alto 533px.</span>

    <span><br>Peso sugerido: 90Kb</span>

    <input id="fileUpload" type="file" name="galeria" multiple>
    
    @if ($errors->has('galeria'))
      <span class="help-block">
          <strong>{{ $errors->first('galeria') }}</strong>
      </span>
    @endif
  </div>

</div> <!-- FIN ROW -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
  <div class="col-md-6">
    <label for="">Link de Video</label>
    {{Form::text('link_video', NULL, ['class'=>'form-control','placeholder'=>'https://www.youtube.com/embed/VIDEO_ID', 'id'=>'link_video'])}}
    @if ($errors->has('link_video'))
      <span class="help-block">
          <strong>{{ $errors->first('link_video') }}</strong>
      </span>
    @endif
    <small>Preview</small>
    <div style="position:relative;height:0;padding-bottom:56.25%; border: 1px solid white;"><iframe id="preview_video" src="" width="640" height="360" frameborder="0" allowfullscreen style="position:absolute;width:100%;height:100%;left:0;"></iframe></div>
  </div>
</div>

<div class="row">

  <div class="col-md-12">

    <div class="drag" id="image-holder">
    @foreach($imgs as $img)
      <img rel="{{$img->id}}" src="{{$img->picture}}" class="img-thumbnail delete" id="{{$img->id}}" width="150">
    @endforeach
    </div>

  </div>

</div>  <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><h2>Oferta</h2></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-3">

    <label for="">Precio Interno<br>$0.00 </label> <!-- Precio Interno es igual a la suma de de todos conceptos en el tab Gastos-->

  </div>

  <div class="col-md-3">

    <label for="">Precio Venta </label>{{Form::text('priceVenta', NULL, ['class'=>'form-control','placeholder'=>'$0.00'])}} <!-- Validar que la cantidad que se capture, jamás sea inferior al precio interno, de lo contrario, no se podrá guardar el registro. Si se eligió publicarlo en la web, el concepto precio venta debe de capturarse forzosamente .-->
    @if ($errors->has('priceVenta'))
      <span class="help-block">
          <strong>{{ $errors->first('priceVenta') }}</strong>
      </span>
    @endif
  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12">

    <label for="">Descripción </label>{{Form::textarea('descripcion', NULL, ['class'=>'form-control','style'=>"height: 100px;", 'maxlength'=>'160'])}}
    @if ($errors->has('descripcion'))
      <span class="help-block">
          <strong>{{ $errors->first('descripcion') }}</strong>
      </span>
    @endif
  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-6">

    <label for="">Link MercadoLibre </label>{{Form::text('linkMercadoLibre', NULL, ['class'=>'form-control'])}}
    @if ($errors->has('linkMercadoLibre'))
      <span class="help-block">
          <strong>{{ $errors->first('linkMercadoLibre') }}</strong>
      </span>
    @endif
  </div>

  <div class="col-md-6">

    <label for="">Link Machinery Trader </label>{{Form::text('LinkMachineryTrader', NULL, ['class'=>'form-control'])}}
    @if ($errors->has('LinkMachineryTrader'))
      <span class="help-block">
          <strong>{{ $errors->first('LinkMachineryTrader') }}</strong>
      </span>
    @endif
  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW -->



<div class="row">

   <div class="col-md-12"><h2>Medidas y peso</h2></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-3">

    <label for="">Alto en cms</label>{{Form::text('alto', NULL, ['class'=>'form-control'])}}
   @if ($errors->has('alto'))
      <span class="help-block">
          <strong>{{ $errors->first('alto') }}</strong>
      </span>
    @endif     
  </div>

  <div class="col-md-3">

    <label for="">Largo en cms</label>{{Form::text('largo', NULL, ['class'=>'form-control'])}}
    @if ($errors->has('largo'))
      <span class="help-block">
          <strong>{{ $errors->first('largo') }}</strong>
      </span>
    @endif
  </div>

  <div class="col-md-3">

    <label for="">Ancho en cms</label>{{Form::text('ancho', NULL, ['class'=>'form-control'])}}
    @if ($errors->has('ancho'))
      <span class="help-block">
          <strong>{{ $errors->first('ancho') }}</strong>
      </span>
    @endif
  </div>

  <div class="col-md-3">

    <label for="">Peso en kgs</label>{{Form::text('peso', NULL, ['class'=>'form-control'])}}
    @if ($errors->has('peso'))
      <span class="help-block">
          <strong>{{ $errors->first('peso') }}</strong>
      </span>
    @endif
  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW -->



<div class="row">

   <div class="col-md-12"><h2>Búsqueda</h2></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12">

    <label for="">Palabras clave. Puedes usar sinónimos o términos relacionados al producto, seperándolos con comas.</label>{{Form::textarea('keywork', NULL, ['class'=>'form-control','placeholder'=>'Ejemplo: excavadora, escabadora, escavadora','style'=>"height: 100px;", 'maxlength'=>'160'])}}
    @if ($errors->has('keywork'))
      <span class="help-block">
          <strong>{{ $errors->first('keywork') }}</strong>
      </span>
    @endif
  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW -->


<div class="row">

  <div class="col-md-6">

    <h2>¿Se publica en PROMIN.mx?</h2>

    <ul class="lista_radio_inline">

      <li><label class="radio-inline">{{Form::radio('state', 'public', true)}} Si</label></li>

      <li><label class="radio-inline">{{Form::radio('state', 'hidden')}} No</label></li>

    </ul>
    @if ($errors->has('state'))
      <span class="help-block">
          <strong>{{ $errors->first('state') }}</strong>
      </span>
    @endif
  </div>

  <div class="col-md-6">
    <h2>¿Es producto destacado?</h2>
    <ul class="lista_radio_inline">
      <li><label class="radio-inline">{{Form::radio('destacado', '1')}} Si</label></li>
      <li><label class="radio-inline">{{Form::radio('destacado', '0', true)}} No</label></li>
    </ul>
    @if ($errors->has('destacado'))
      <span class="help-block">
          <strong>{{ $errors->first('destacado') }}</strong>
      </span>
    @endif
  </div>
</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12">

    <hr>

    <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>

  </div>

</div>

{{Form::close()}}

