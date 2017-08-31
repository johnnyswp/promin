@extends('admin.layouts.master')

@section('title', 'Noticias')


@section('content')

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <h1>Editando noticia</h1>
  </div>
</div>

{{Form::model($noticia, ['route' => ['noticias.update', $noticia->id],'files' => true])}}
  <input type="hidden" name="_method" value="PUT">
  <div class="row bg_blanco">
    
     <div class="col-xs-12 col-sm-12 col-md-6">
          <label for="">Título </label>{{Form::text('title', old('title'), ['class'=>'form-control'])}}
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <label for="">Contenido </label>{{Form::textarea('content', NULL, ['class'=>'form-control'])}}
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">
          <label for="">Tipo de Noticia</label>
          <ul class="lista_radio_inline">
            <li><label class="radio-inline"><input  type="radio" name="type" value="interna" @if($noticia->type=="interna") checked="" @endif >Interna</label></li>
            <li><label class="radio-inline"><input  type="radio" name="type" value="Promin.mx"  @if($noticia->type=="Promin.mx") checked="" @endif>Promin.mx</label></li>
          </ul>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">
          <label for="">Status de Noticia</label>
          <ul class="lista_radio_inline">
            <li><label class="radio-inline"><input type="radio" class="state" name="state" value="normal" @if($noticia->state=="normal") checked="" @endif>Normal</label></li>
            <li><label class="radio-inline"><input @if($noticia->state=="urgente") checked="" @endif type="radio" class="state" name="state" value="urgente">URGENTE</label></li> <!-- sólo si se selecciona esta opción, mostrar el textarea, para que ahí se capturen los emails-->
          </ul>
        </div>

        

        <div class="col-xs-12 col-sm-12 col-md-6" >
          <label for="">Imagen / Video de Noticia</label>
          <ul class="lista_radio_inline">
            <li ><label class="radio-inline"><input @if($noticia->type_link=="imagen") checked="" @endif type="radio" class="video" name="type_link" value="imagen" checked="">Imagen</label></li> <!-- si se selecciona esta opción mostar el input de imagen, el link del video no se verá -->
            <li ><label class="radio-inline"><input @if($noticia->type_link=="video") checked="" @endif type="radio" class="video" name="type_link" value="video">Video</label></li> <!-- si se elige esta opción, sólo mostrar el input para que peguen el link -->
          </ul>

        <div class="col-md-12" id="img" @if($noticia->type_link=="video")  style="display:none"  @endif >
          <label for="">Selecciona la imagen para la noticia</label>
          <span><br>Tamaño recomendado: ancho 2000px y alto 1333px.</span>
          <span><br>Peso sugerido: 350Kb</span>
          <input class="preview" type="file" name="imagen">
          <br>
          <img id="preview" src="{{$noticia->link}}" width="200" class="img-thumbnail">
        </div>
        <div class="col-md-12 col-xs-12" id="video"  @if($noticia->type_link=="imagen") style="display: none" @endif>
          <label for="">Link (video de YouTube)</label>{{Form::text('link', NULL, ['class'=>'form-control'])}}
        </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12" id="mails" style="display: none">
          <label for="">Para: </label> <span>Ingresa los emails separados por coma.</span>
          {{Form::textarea('froms', NULL, ['placeholder'=>'Ejemplo: info@promin.mx, contacto@promin.mx','class'=>'form-control'])}}
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
        </div>
  </div> <!-- FIN ROW -->
{{Form::close()}}
@endsection

@section('js-script')

<script type="text/javascript">

  $('.type').on('change', function() {

    if($(this).val()=='Promin.mx'){
      //$('#status').css('display', 'none');
      $('#mails').css('display', 'none');
      
    }else{
      //$('#status').css('display', 'block');  
      $('#mails').css('display', 'block');      
      
    }

  });

  $('.state').on('change', function() {
    if($(this).val()=='normal'){
      $('#mails').css('display', 'none');
    }else{
      $('#mails').css('display', 'block');      
    }

  });



  $('.video').on('change', function() {

    if($(this).val()=='video'){

      $('#img').css('display', 'none');

      $('#video').css('display', 'block');

    }else{

      $('#img').css('display', 'block');

      $('#video').css('display', 'none');

    }

  });

</script>

@endsection