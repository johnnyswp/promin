@extends('admin.layouts.master')



@section('title', 'Noticias')





@section('content')

 

                

          <div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">

    <h1>Agregando banner</h1>

  </div>

</div>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{{Form::open(['route' => ['banners.store'],'files' => true])}}

  <div class="row bg_blanco">

        

        <div class="col-md-12">

          <label for="">Tipo de banner </label>

          <ul class="lista_radio_inline">

            <li><label class="radio-inline"><input value="0" type="radio" name="tipo_banner" checked="">Imagen</label></li>

            <li><label class="radio-inline"><input value="1" type="radio" name="tipo_banner">Video</label></li>

          </ul>

        </div>    

      

        <div class="col-md-12 img">

          <label for="">Imagen</label>

          <span><br>Tamaño recomendado: ancho 2000px y alto 600px.</span>

          <span><br>Peso sugerido: 350Kb</span>

          <input type="file" id="imagen" class="preview" name="file" >

          <br>

          <img id="preview" src="https://cdn3.iconfinder.com/data/icons/linecons-free-vector-icons-pack/32/camera-256.png" width="200" class="img-thumbnail" style="padding: 10px;">

        </div>



        <div class="row video hidden">

           <div class="col-xs-12 col-sm-12 col-md-6">

             <label for="">Título </label>

             {{Form::text('titulo_video', NULL, ['class'=>'form-control'])}}



           </div>  

         </div>

        <div class="row video hidden">

          <div class="col-md-6 col-xs-12">

            <label for="">Url Video </label>

            {{Form::text('link_video', NULL, ['class'=>'form-control'])}}

            

          </div>

        </div>



        <div class="row video hidden">

          <div class="col-md-6 col-xs-12">

            <label for="">Link de Video</label>

            {{Form::text('url_video', NULL, ['class'=>'form-control'])}}



          </div>

        </div>

         <div class="row img">

           <div class="col-xs-12 col-sm-12 col-md-6">

             <label for="">Título </label>

             {{Form::text('titulo_banner', NULL, ['class'=>'form-control'])}}



           </div>  

         </div>



        <div class="row img">

          <div class="col-md-6 col-xs-12">

            <label for="">Link Imagen </label> 

            {{Form::text('link_imagen', NULL, ['class'=>'form-control'])}}

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