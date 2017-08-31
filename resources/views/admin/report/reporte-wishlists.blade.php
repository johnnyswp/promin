@extends('admin.layouts.master')
@section('title', 'Productos')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1><i class="fa fa-heart"></i> Reporte de Wishlists</h1>
    </div>
  </div><!-- FIN ROW -->
  
  
  <div class="row">
    <form method="POST" id="form">
    {{ csrf_field() }}
    <div class="well" style="overflow: auto">
        
        <div class="row">
          
          <div class="col-md-3">
            <label for="">Cliente</label>
            <select name="cliente" id="cliente" class="form-control">
              <option value="all">Todos</option>
              @foreach($clientes as $clientee)
              <option value="{{$clientee->id}}">{{$clientee->nombre}} {{$clientee->apellido}} {{$clientee->s_apellido}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-4">
            <strong>Seleccione el periodo</strong> <!-- El periodo por defaul es del mes en curso-->
            <form class="form-horizontal">
              <fieldset>
                <div class="control-group daterange_margin">
                  <div class="controls">
                    <div class="input-prepend input-group">
                      <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                      <input type="text" style="width: 200px" id="reservation" class="form-control" value="" />
                      <input type="hidden" name="desde" id="desde" value="">
                      <input type="hidden" name="hasta" id="hasta" value="">
                    </div>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <label for="">Mostrar línea de negocio:</label>
            <select name="linea" id="lineas" class="form-control">
              <option value="all">Todas</option>
              @foreach($lineas as $lineaa)
              <option value="{{$lineaa->id}}">{{$lineaa->nombre}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-3">
            <label for="">Mostrar tipo de producto:</label>
            <select name="tipo" id="tipo" class="form-control">
              <option class="visible" value="all">Todos</option>
            </select>
          </div>

          <div class="col-md-3">
            <label for="">Mostrar marca:</label>
            <select name="marcas" id="marcas" class="form-control">
              <option class="visible" value="all">Todas</option>
            </select>
          </div>

          <div class="col-md-3">
            <label for="">Mostrar modelo:</label>
            <select name="modelos" id="modelos" class="form-control">
              <option class="visible" value="all">Todos</option>
            </select>
          </div>


          <div class="col-md-3">
            <label for="">Ordenar línea de negocio:</label>
            {{Form::select('order_linea', ['asc'=>'A-Z','desc'=>'Z-A','new'=>'Más reciente','old'=>'Más antigua'], NULL, ['class'=>'form-control'])}}
          </div>

          <div class="col-md-3">
            <label for="">Ordenar tipo de producto:</label>
            {{Form::select('order_tipo', ['asc'=>'A-Z','desc'=>'Z-A','new'=>'Más reciente','old'=>'Más antigua'], NULL, ['class'=>'form-control'])}}
          </div>

          <div class="col-md-3">
            <label for="">Ordenar marca:</label>
            {{Form::select('order_marca', ['asc'=>'A-Z','desc'=>'Z-A','new'=>'Más reciente','old'=>'Más antigua'], NULL, ['class'=>'form-control'])}}
          </div>

          <div class="col-md-3">
            <label for="">Ordenar modelo:</label>
            {{Form::select('order_modelo', ['asc'=>'A-Z','desc'=>'Z-A','new'=>'Más reciente','old'=>'Más antigua'], NULL, ['class'=>'form-control'])}}
          </div>
        
        </div>
        

        <div class="col-md-4">
          <button type="button" class="btn btn-round btn-success btn-md btn_reportes_margin" id="generar"><i class="fa fa-check"></i> Generar reporte</button>
        </div>

      
    </div>
    </form>
    <div class="col-md-12 bg_blanco" id="data-wishlists">

    </div><!-- FIN ROW -->

  
</div>
@endsection
@section('script')
<script src="{{url('asset_admin/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{url('asset_admin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript">
$(document).on('ready',function(){       
    $('#generar').click(function(){
        $.ajax({                        
           type: "POST",                 
           url: "{{url('admin/reporte-wishlist')}}",
           data: $("#form").serialize(), 
           dataType: 'html',
           success: function(data)             
           {
             $('#data-wishlists').html(data);               
           }
       });
    });
});
$(document).ready(function() {
  //default data
  $('#desde').val(moment().subtract(30, 'days').format('YYYY-MM-DD'));
  $('#hasta').val(moment().format('YYYY-MM-DD'));

  $('#reservation').daterangepicker({
      locale: {
        format: 'DD-MM-YYYY'
      },
      startDate: moment().subtract(30, 'days').format('DD-MM-YYYY'),
      endDate: moment().format('DD-MM-YYYY'),
      maxDate: moment().format('DD-MM-YYYY'),
  }, 
  function(start, end, label) {
      $('#desde').val(start.format('YYYY-MM-DD'));
      $('#hasta').val(end.format('YYYY-MM-DD'));
  });
});
</script>
<script type="text/javascript">
$("#lineas").change(function() {

  $id = $(this).val();
  if($id==""){
    return false;
  }
  $('#modelos > option[value="all"]').prop('selected', true);
  $('#tipo > option[value="all"]').prop('selected', true);
  $('#marcas > option[value="all"]').prop('selected', true);
  $('#marcas, #modelos').prop('disabled', true);
  $.ajax({
    method: "GET",
    url: "{{url('admin/productos-filter/tipo')}}/"+$id,
    dataType: "html"
  })
  .done(function(msg) {
    $('#tipo .visible').remove();
    $('#tipo').html(msg);
    $("#tipo").change(function(){
      $id = $(this).val();
      if($id==""){
        $('#modelos > option[value="all"]').prop('selected', true);
        $('#tipo > option[value="all"]').prop('selected', true);
        $('#marcas > option[value="all"]').prop('selected', true);
        $('#marcas, #modelos').prop('disabled', true);
        return false;
      }
      $('#marcas > option[value="all"]').prop('selected', true);
      $('#marcas').prop('disabled', false);
      $('#modelos > option[value="0"]').prop('selected', true);
      $('#modelos').prop('disabled', true);
      $.ajax({
        method: "GET",
        url: "{{url('admin/productos-filter/marcas')}}/"+$id,
        dataType: "html"
      })

      .done(function(msg) {
        $('#marcas .visible').remove();
        $('#marcas').html(msg);
        $("#marcas").change(function() {
          $id = $(this).val();
          if($id==""){
            $('#marcas > option[value="all"]').prop('selected', true);
            $('#marcas').prop('disabled', false);
            $('#modelos > option[value="all"]').prop('selected', true);
            $('#modelos').prop('disabled', true);
            return false;
          }
          $.ajax({
            method: "GET",
            url: "{{url('admin/productos-filter/modelos')}}/"+$id,
            dataType: "html"
          })
          .done(function( msg ) {
            $('#modelos .visible').remove();
            $('#modelos').html(msg);
            $('#modelos').prop('disabled', false);
          });
        });
      });
    });
  });

});
</script>
@endsection
