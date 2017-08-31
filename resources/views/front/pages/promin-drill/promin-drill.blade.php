@extends('front.layouts.main')
@section('title', $linea->nombre)
@section('metadata')
<meta name="description" content="{{$linea->descripcion}}">
<meta name="keywords" content="{{$linea->keywork}}">
<meta name="author" content="promin.mx">
@stop
@section('style')
<link href="{{url('assets/css/nav_pd.css')}}" rel="stylesheet">
@stop
@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="relative">
                    <div class="absolute">
                        <nav class="menu">
                           <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" checked="checked" />
                           <label class="menu-open-button btn-pal" for="menu-open">
                            <img src="{{url('asset/images/promin-drill.png')}}" alt="Proveedora de Equipos Mineros">
                          </label>

                           <a href="{{url('tipo-producto/wagon-drill-75')}}" class="menu-item wagon" style="background: url('{{url('asset/images/promin_drill_1_wagon.jpg')}}') no-repeat;"><span>Wagon Drill</span></a>
                           <a href="{{url('tipo-producto/motores-76')}}" class="menu-item motores" style="background: url('{{url('asset/images/promin_drill_2_motores.jpg')}}') no-repeat;"><span>Motores</span></a>
                           <a href="{{url('tipo-producto/martillos-de-fondo-77')}}" class="menu-item martillos" style="background: url('{{url('asset/images/promin_drill_3_martillos.jpg')}}') no-repeat;"><span>Martillos de Fondo</span></a>
                           <a href="{{url('tipo-producto/tuberia-api-78')}}" class="menu-item tuberia" style="background: url('{{url('asset/images/promin_drill_4_tuberia.jpg')}}') no-repeat;"><span>Tubería API</span></a>
                           <a href="{{url('tipo-producto/brocas-79')}}" class="menu-item brocas" style="background: url('{{url('asset/images/promin_drill_5_brocas.jpg')}}') no-repeat;"><span>Brocas</span></a>
                           <a href="{{url('tipo-producto/herramienta-80')}}" class="menu-item herramienta" style="background: url('{{url('asset/images/promin_drill_6_herramienta.jpg')}}') no-repeat;"><span>Herramienta</span></a>
                           <a href="{{url('tipo-producto/accesorios-81')}}" class="menu-item accesorios" style="background: url('{{url('asset/images/promin_drill_7_accesorios.jpg')}}') no-repeat;"><span>Accesorios</span></a>
                        </nav>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js-script')
<script>
    $(document).ready(function() {
  $(".trigger").click(function() {
    $(".menu").toggleClass("active"); 
  });
});
</script>
@stop
