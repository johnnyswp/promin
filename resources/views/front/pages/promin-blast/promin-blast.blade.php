@extends('front.layouts.main')
@section('title', $linea->nombre)
@section('metadata')
<meta name="description" content="{{$linea->descripcion}}">
<meta name="keywords" content="{{$linea->keywork}}">
<meta name="author" content="promin.mx">
@stop
@section('style')
<link href="{{url('assets/css/nav_pb.css')}}" rel="stylesheet">
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
                            <img src="{{url('asset/images/promin-blast.png')}}" alt="Proveedora de Equipos Mineros">
                          </label>

                           <a href="{{url('tipo-producto/ollas-66')}}" class="menu-item ollas" style="background: url('{{url('asset/images/promin_blast_1_ollas.jpg')}}') no-repeat;"><span>Ollas</span></a>
                           <a href="{{url('tipo-producto/combos-67')}}" class="menu-item valvulas" style="background: url('{{url('asset/images/promin_blast_2_compresores.jpg')}}') no-repeat;"><span>Combos</span></a>
                           <a href="{{url('tipo-producto/equipo-de-seguridad-68')}}" class="menu-item seguridad" style="background: url('{{url('asset/images/promin_blast_3_seguridad.jpg')}}') no-repeat;"><span>Equipo de Seguridad</span></a>
                           <a href="{{url('tipo-producto/abrasivos-69')}}" class="menu-item abrasivos" style="background: url('{{url('asset/images/promin_blast_4_abrasivos.jpg')}}') no-repeat;"><span>Abrasivos</span></a>
                           <a href="{{url('tipo-producto/boquillas-70')}}" class="menu-item boquillas" style="background: url('{{url('asset/images/promin_blast_5_boquillas.jpg')}}') no-repeat;"><span>Boquillas</span></a>
                           <a href="{{url('tipo-producto/mangueras-71')}}" class="menu-item mangueras" style="background: url('{{url('asset/images/promin_blast_6_mangueras.jpg')}}') no-repeat;"><span>Mangueras</span></a>
                           <a href="{{url('tipo-producto/conexiones-72')}}" class="menu-item conexiones" style="background: url('{{url('asset/images/promin_blast_7_conexiones.jpg')}}') no-repeat;"><span>Conexiones</span></a>
                           <a href="{{url('tipo-producto/accesorios-73')}}" class="menu-item accesorios" style="background: url('{{url('asset/images/promin_blast_8_valvulas.jpg')}}') no-repeat;"><span>Accesorios</span></a>
                           <a href="{{url('tipo-producto/compresores-74')}}" class="menu-item compresores" style="background: url('{{url('asset/images/promin_blast_9_accesorios.jpg')}}') no-repeat;"><span>Compresores</span></a>
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
