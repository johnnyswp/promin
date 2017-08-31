<!DOCTYPE html>
<html>
<head>
    <title>prueba</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style type="text/css">
    body { font-family: 'Roboto',sans-serif; }
    .page-break { page-break-after: always; }
    .text-right { text-align: right;}
    table { font-size: 12px;
    border-spacing: 5px; }
    .img { width: 35px }
    table {
      border-collapse: collapse;
    }
    .data tr { border-bottom: 1px solid black; border-collapse: collapse; }
    th,td { text-align: center; } 
    .text-left { text-align: left; }
    </style>
<?php use App\Models\Admin\Producto; ?>
</head>
<body>
    <table style="width: 100%;">
        <tr border="1" style="border: 1px solid black;">
            <td style="width: 20%"><img src="{{url('/assets/images/proveedora-equipos-mineros-promin-logo.png')}}" ></td>
            <td class="text-right">
                  <h2>Reporte de Wishlists</h2>
                  <p><strong>Cliente:</strong> {{$cliente}} | 
                  <strong>Línea de Negocio:</strong> {{$linea}} | 
                  <strong>Tipo de Producto:</strong> {{$tipo}} | 
                  <strong>Marca:</strong>{{$marca}} | 
                  <strong>Modelo:</strong>{{$modelo}}</p>
                  <span>Fecha: {{Carbon\Carbon::parse($desde)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($desde)->format('m')).'-'.Carbon\Carbon::parse($desde)->format('Y')}} a {{Carbon\Carbon::parse($hasta)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($hasta)->format('m')).'-'.Carbon\Carbon::parse($hasta)->format('Y')}}</span>
            </td>
        </tr>
    </table>

    <table style="width: 100%;" class="data">
        <thead>
            <tr border="1" style="border: 1px solid black;">
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Email</th>
                <th>Línea de negocio</th>
                <th>Imagen</th>
                <th>Tipo de Producto</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th class="text-right">Precio</th>  
            </tr>
        </thead>
        <tbody>
            @foreach($wishlists as $wish)
              <tr>
                <td>{{Carbon\Carbon::parse($wish->fecha)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($wish->fecha)->format('m')).'-'.Carbon\Carbon::parse($wish->fecha)->format('Y')}}</td>
                <td>{{$wish->nombre}} {{$wish->apellido}} {{$wish->s_apellido}}</td>
                <td><a href="mailto:{{$wish->email}}">{{$wish->email}}</a></td>
                <td>{{$wish->linea}}</td>
                <td><img src="{{url(Producto::find($wish->producto_id)->image())}}" width="80" alt=""></td>
                <td>{{$wish->tipo}}</td>
                <td>{{$wish->marca}}</td>
                <td>{{$wish->modelo}}</td>
                <td class="text-right">$ {{number_format($wish->precio, 2, '.', ',')}}</td>
              </tr>
            @endforeach
        </tbody>
    </table>
</bo
</html>
