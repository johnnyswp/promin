@extends('front.layouts.main')
@section('title', $linea->nombre)
@section('metadata')
<meta name="description" content="{{$linea->descripcion}}">
<meta name="keywords" content="{{$linea->keywork}}">
<meta name="author" content="promin.mx">
@stop
@section('content')
  @include('front.includes.linea_negocio_top_banner') 
  @include('front.includes.linea_negocio_tipo_contenido')   
@stop