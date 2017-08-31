@extends('admin.layouts.master')



@section('title', 'Modelos')





@section('content')

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <h1>Editando Banner</h1>
  </div>
</div>

{{Form::model($banner, ['route' => ['banners.update', $banner->id],'files' => true])}}
  <input type="hidden" name="_method" value="PUT">
  <div class="row bg_blanco">

        <div class="col-md-12">
          <label for="">Tipo de banner </label>
          <ul class="lista_radio_inline">
            <li><label class="radio-inline"><input value="0" type="radio" name="tipo_banner" @if($banner->tipo=="picture") checked="" @endif>Imagen</label></li>
            <li><label class="radio-inline"><input value="1" type="radio" name="tipo_banner" @if($banner->tipo=="video") checked="" @endif>Video</label></li>
          </ul>
        </div>    
        <!--Videos-->
        <div class="row video @if($banner->tipo=="picture") hidden @endif">
          <div class="col-xs-12 col-sm-12 col-md-6">
            <label for="">Título </label>
            {{Form::text('titulo_video', $banner->title, ['class'=>'form-control'])}}
            @if ($errors->has('titulo_video'))
                    <span class="help-block">
                        <strong>{{ $errors->first('titulo_video') }}</strong>
                    </span>
            @endif
          </div>  
        </div>

        <div class="row video @if($banner->tipo=="picture") hidden @endif">
          <div class="col-md-6 col-xs-12">
            <label for=""> Link de Video</label>
            {{Form::text('link_video', $banner->link, ['class'=>'form-control'])}}
            @if ($errors->has('link_video'))
                    <span class="help-block">
                        <strong>{{ $errors->first('link_video') }}</strong>
                    </span>
            @endif
          </div>
        </div>


        <div class="row video @if($banner->tipo=="picture") hidden @endif">
          <div class="col-md-6 col-xs-12">
            <label for="">Url Video</label>
            {{Form::text('url_video', $banner->picture, ['class'=>'form-control'])}}
          </div>
        </div>
        <!--IMG-->
        <div class="col-md-12 img @if($banner->tipo=="video") hidden @endif"  >
          <label for="">Imagen</label>
          <span><br>Tamaño recomendado: ancho 2000px y alto 600px.</span>
          <span><br>Peso sugerido: 350Kb</span>
          <input type="file" id="imagen" class="preview" name="file" >
          <br>
          <img id="preview" src="{{$banner->picture}}" width="200" class="img-thumbnail" style="padding: 10px;">
        </div>

        <div class="row img @if($banner->tipo=="video") hidden @endif">
          <div class="col-xs-12 col-sm-12 col-md-6">
            <label for="">Título </label>
            {{Form::text('titulo_banner', $banner->title, ['class'=>'form-control'])}}
          </div>  
        </div>

        <div class="row img @if($banner->tipo=="video") hidden @endif">
          <div class="col-md-6 col-xs-12">
            <label for="">Link Imagen </label> 
            {{Form::text('link_imagen', $banner->link, ['class'=>'form-control'])}}
          </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
        </div>
  </div> <!-- FIN ROW -->
{{Form::close()}}         

@endsection
@section('js-script')
<script type="text/javascript">
  $('input[name=tipo_banner]').on('click', function() {
     if($(this).val() ==0){
        $('.video').addClass('hidden');
        $('.img').removeClass('hidden');
     }else{
        $('.video').removeClass('hidden');
        $('.img').addClass('hidden');
     }
  });
</script>
@endsection