@extends('front.layouts.main')
@if($producto->mx==1)
@section('title', 'MX '.$producto->id.' '.$producto->tipo().' '.$producto->marca().' '.$producto->modelo().' '.$producto->linea())
@else
@section('title', $producto->tipo().' '.$producto->marca().' '.$producto->modelo().' '.$producto->codigo.' '.$producto->linea())
@endif
@section('metadata')
<meta name="description"          content="{{$producto->descripcion}}">
<meta name="keywords"             content="{{$producto->keywork}}">
<meta name="author"               content="promin.mx">
<!-- Twitter Card data -->
<meta name="twitter:card" value="summary">
<!-- Twitter Card data -->
<meta name="twitter:card" content="summary_large_image">
@if($producto->mx==1)
<meta property="twitter:title"         content="{{'MX '.$producto->id.' '.$producto->tipo().' '.$producto->marca().' '.$producto->modelo().' '.$producto->linea()}}" />
@else
<meta property="twitter:title"         content="{{$producto->tipo().' '.$producto->marca().' '.$producto->modelo().' '.$producto->codigo.' '.$producto->linea()}}" />
@endif
<meta name="twitter:description" content="{{$producto->descripcion}}">

<!-- Twitter summary card with large image. Al menos estas medidas 280x150px -->
<meta name="twitter:image:src" content="{{$producto->image()}}">


<meta property="og:url"           content="{{url($_SERVER['REQUEST_URI'])}}" />
<meta property="og:type"          content="website" />
@if($producto->mx==1)
<meta property="og:title"         content="{{'MX '.$producto->id.' '.$producto->tipo().' '.$producto->marca().' '.$producto->modelo().' '.$producto->linea()}}" />
@else
<meta property="og:title"         content="{{$producto->tipo().' '.$producto->marca().' '.$producto->modelo().' '.$producto->codigo.' '.$producto->linea()}}" />
@endif
<meta property="og:description"   content="{{$producto->descripcion}}" />
<meta property="og:image"         content="{{$producto->image()}}" />
@stop
@section('content')
  @include('front.includes.producto_top_banner') 
  @include('front.includes.producto_contenido')   
@stop